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
            <h1 class="title">Editar registro</h1>
            <?php

            if ($_SESSION['tipo_usuario'] == "SE") {

                $id = $_GET['id'];
                $matricula = $_GET['matricula'];


                $pdo = new PDO('mysql:host=localhost;dbname=dpw2_u2_a2_arac', 'root', '');

                $consulta = $pdo->prepare("SELECT * FROM inscripcion WHERE id= :id");
                $consulta->bindParam(':id', $id);
                $consulta->execute();

                $count = $consulta->rowCount();
                $data = $consulta->fetch(PDO::FETCH_ASSOC);
                $pdo = null;
            }
            ?>
            <?php if ($count) { ?>

                <form action="updateAsignatura.php" method="post">
                    <label for="">Matricula del alumno</label>
                    <input type="number" name="id" value="<?= $data["id"]; ?>" hidden>
                    <input type="number" name="matricula" placeholder="Matricula..." value="<?= $data["Matricula"]; ?>">
                    <label for="">Asignatura</label>
                    <input type="text" name="asignatura" placeholder="Asignatura..." value="<?= $data["Asignatura"]; ?>">
                    <label for="">Grupo</label>
                    <input type="text" name="grupo" placeholder="Grupo..." value="<?= $data["Grupo"]; ?>">
                    <label for="">Profesor</label>
                    <input type="text" name="profesor" placeholder="Profesor..." value="<?= $data["Profesor"]; ?>">
                    <label for="">Turno</label>
                    <input type="text" name="turno" placeholder="Turno..." value="<?= $data["Turno"]; ?>">
                    <label for="">Semestre</label>
                    <input type="number" name="semestre" placeholder="Semestre..." value="<?= $data["Semestre"]; ?>">
                    <label for="">Estatus</label>
                    <input type="text" name="estatus" placeholder="Estatus..." value="<?= $data["Estatus"]; ?>">

                    <button type="submit" class="btn">Actualizar registro</button>
                    <a href="consulta.php?matricula=<?php echo $_GET['matricula'] ?>">Regresar</a>

                </form>


            <?php } else {

                $_SESSION['delete_error'] = "Error al consultar la matricula";
                header("location:consulta.php?matricula= $matricula");
            }  ?>


        </div>

        <div class="box-content">
            <?php if (isset($_SESSION['update_error'])) { ?>
                <p style="text-align: left; color:red"><?php echo $_SESSION['update_error'] ?></p>

                <?php
                $_SESSION['update_error'] = "";
                ?>

            <?php }  ?>


            <?php if (isset($_SESSION['update_success'])) { ?>
                <p style="text-align: left; color:green"><?php echo $_SESSION['update_success'] ?></p>
                <?php
                $_SESSION['update_success'] = "";
                ?>

            <?php }  ?>

        </div>






    </div>




    <?php
    include('./includes/footer.php')
    ?>

</body>

</html>