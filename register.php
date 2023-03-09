<!DOCTYPE html>
<html lang="en">
<?php session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu prepa Cáncun</title>
    <link rel="stylesheet" href="./css/app.css" />
</head>


<body>

    <div class="wrapper">
        <?php
        include('./includes/navbar.php')
        ?>
        <div class="box-content">


        </div>

        <div class="box-content">
            <h1 class="title">Registro</h1>

            <form action="register.php" method="post">
                <label for="matricula">Matricula</label>
                <input type="number" name="matricula" placeholder="Matricula...">
                <label for="name">Nombre</label>
                <input type="text" name="name" placeholder="Nombre...">
                <label for="email">Primer apellido</label>
                <input type="text" name="primerApellido" placeholder="Primer Apellido...">
                <label for="email">Segundo apellido</label>
                <input type="text" name="segundoApellido" placeholder="Segundo Apellido...">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password">
                <label for="email">Confirmar Password</label>
                <input type="password" name="passwordConfirm" placeholder="Password">
                <button type="submit" class="btn">Enviar</button>
            </form>

        </div>
        <div class="box-content">
            <?php
            // Arrays para guardar errores:
            $aErrores = array();

            // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
            $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
            $patron_numeros = "/^[0-9]+$/";
            $patron_contraseña = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";

            // Comprobar si se ha enviado el formulario:
            if (!empty($_POST)) {


                //validar matricula
                if (
                    isset($_POST['matricula']) && isset($_POST['name']) && isset($_POST['primerApellido']) && isset($_POST['segundoApellido'])
                    && isset($_POST['password']) && isset($_POST['passwordConfirm'])
                ) {
                    // Matricula:
                    if (empty($_POST['matricula']))
                        $aErrores[] = "El numero de matricula es obligatorio.";
                    else {
                        // Comprobar mediante una expresión regular, que sólo contiene lnumeros:
                        if (!preg_match($patron_numeros, $_POST['matricula'])) {
                            $aErrores[] = "La matricula solo acepta números.";
                        }
                    }

                    // Nombre:
                    if (empty($_POST['name']))
                        $aErrores[] = "El nombre es obligatorio";
                    else {
                        // Comprobar mediante una expresión regular, que sólo contiene letras y espacios:
                        if (!preg_match($patron_texto, $_POST['name']))
                            $aErrores[] = "El nombre sólo puede contener letras y espacios";
                    }


                    // Primer apellido:
                    if (empty($_POST['primerApellido']))
                        $aErrores[] = "El primer apellido es obligatorio";
                    else {
                        // Comprobar mediante una expresión regular, que sólo contiene letras y espacios:
                        if (!preg_match($patron_texto, $_POST['primerApellido']))
                            $aErrores[] = "El primer apellido sólo puede contener letras y espacios";
                    }


                    // Segundo apellido:
                    if (empty($_POST['segundoApellido']))
                        $aErrores[] = "El segundo apellido es obligatorio";
                    else {
                        // Comprobar mediante una expresión regular, que sólo contiene letras y espacios:
                        if (!preg_match($patron_texto, $_POST['segundoApellido']))
                            $aErrores[] = "El segundo apellido sólo puede contener letras y espacios";
                    }


                    // Contraseña:
                    if (empty($_POST['password']) || empty($_POST['passwordConfirm']))
                        $aErrores[] = "El campo Password y Confirmar Password es obligatorio";
                    else {
                        // Comprobar mediante una expresión regular:
                        if (!preg_match($patron_contraseña, $_POST['password']))
                            $aErrores[] = "La contraseña tener una letra minúscula, una letra mayúscula, un número, un carácter especial y mínimo 8 dígitos";

                        if ($_POST['password'] !=  $_POST['passwordConfirm']) {
                            $aErrores[] = "El campo Password y Confirmar Password no coinciden.";
                        }
                    }
                } else {
                    echo "<p>Todos los campos son obligatorios.</p>";
                }



                // Si no se encontraron errores, se registra en la base de datos
                if (!count($aErrores) > 0) {

                    try {
                        $pdo = new PDO('mysql:host=localhost;dbname=dpw2_u2_a2_arac', 'root', '');
                    } catch (\Throwable $th) {
                        echo "Error al conectar a la base de datos: ".$th->getMessage();
                    }

                    
                    $matricula = $_POST['matricula'];
                    $name = $_POST['name'];
                    $primerApellido = $_POST['primerApellido'];
                    $segundoApellido = $_POST['segundoApellido'];
                    $turno = "Matutino";
                    $usuario = "AL";
                    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);


                    $consulta = $pdo->prepare("INSERT INTO usuarios(Matricula,Nombre, ApellidoPaterno, ApellidoMaterno, Turno, TipoUsuario, Password) 
                    VALUES(:Matricula,:Nombre,:ApellidoPaterno,:ApellidoMaterno,:Turno,:TipoUsuario,:Password)");


                    $consulta->bindParam(':Matricula', $matricula);
                    $consulta->bindParam(':Nombre', $name);
                    $consulta->bindParam(':ApellidoPaterno', $primerApellido);
                    $consulta->bindParam(':ApellidoMaterno', $segundoApellido);
                    $consulta->bindParam(':Turno', $turno);
                    $consulta->bindParam(':TipoUsuario', $usuario);
                    $consulta->bindParam(':Password', $password);



                    try {
                        if ($consulta->execute()) {
                            echo "<p style='text-align: left; color:green'>Registro existoso</p>";
                        } else {
                            echo "<p>Error al guardar los datos:</p>";
                            if ($consulta->errorInfo()[0] == 23000) {
                                echo "<br><ul><li style='text-align: left; color:red'>La matricula ya existe</li></ul>";
                            } else {
                                print_r($consulta->errorInfo());
                            }
                        }
                    } catch (Exception $e) {
                        echo 'Error al guardar los datos: ',  $e->getMessage(), "\n";
                    } finally {
                        // cualquera que sea el rexultado, cerramos la concexion
                        $pdo = null;
                    }
                }
            }

            ?>





            <!-- mostrar lista de errores del formulario -->
            <?php if (count($aErrores) > 0) { ?>
                <p>Revise la siguiente informacion:</p>
                <ul>
                    <?php foreach ($aErrores as $error) { ?>

                        <li style="text-align: left; color:red"><?php echo $error ?></li>

                    <?php }  ?>
                </ul>

            <?php }  ?>








        </div>









    </div>
    </div>



    <?php
    include('./includes/footer.php')
    ?>

</body>

</html>