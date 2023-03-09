


<!DOCTYPE html>
<html lang="en">
<?php session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu prepa Cáncun</title>

    <!-- CDN Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/app.css" />
</head>


<body>
    <div class="container">

        <?php
        include('./includes/navbar.php')
        ?>
        <div class="row">
            <div class="col-12 col-lg-4"></div>
            <div class="col-12 col-lg-4">
                <h1 class="title">Login</h1>

                <form action="login.php" method="post">


                    <form>
                        <div class="mb-3">
                            <label for="matricula" class="form-label">Matricula</label>
                            <input type="number" class="form-control" name="matricula" placeholder="Matricula...">

                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-primary">Ingresar</button>



                    </form>
            </div>
            <div class="col-12 col-lg-4">

                <?php if ($_POST) { ?>

                    <?php
                    $matricula = $_POST["matricula"];
                    $password = $_POST["password"];

                    $pdo = new PDO('mysql:host=localhost;dbname=dpw2_u2_a2_arac', 'root', '');

                    $consulta = $pdo->prepare("SELECT * FROM usuarios WHERE Matricula = :matricula");
                    $consulta->bindParam(':matricula', $matricula);


                    $consulta->execute();

                    $count = $consulta->rowCount();
                    $data = $consulta->fetch(PDO::FETCH_ASSOC);
                    $pdo = null;

                    ?>

                    <?php if ($count) { ?>
                        <?php if (password_verify($password, $data['Password'])) { ?>

                            <?php
                            $_SESSION['nombre'] = $data["Nombre"] . " " . $data["ApellidoPaterno"] . " " . $data["ApellidoMaterno"];
                            $_SESSION['matricula'] = $data["Matricula"];
                            $_SESSION['tipo_usuario'] = $data["TipoUsuario"];
                            header("location:welcome.php");
                            ?>

                        <?php } else { ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                                Usuario o contraseña incorrectos
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php }  ?>



                    <?php }  ?>
                <?php }  ?>

            </div>
        </div>
    </div>






    <?php
    include('./includes/footer.php')
    ?>

    <!-- CDN Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>






</html>