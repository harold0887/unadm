<!DOCTYPE html>

<html lang="es">
<?php session_start();
?>

<head>
    <?php
    include('./includes/head.php')
    ?>
</head>

<body>
    <div class="container">
        <?php
        include('./includes/navbar.php')
        ?>
        <?php
        if (isset($_SESSION) && $_SESSION['tipo_usuario'] == "AL") {

            include('./includes/consultaAlumno.php');
        } else {
            include('./includes/consultaServicios.php');
        }
        ?>
    </div>


    <?php
    include('./includes/footer.php')
    ?>
</body>

</html>