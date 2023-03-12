<!DOCTYPE html>

<html lang="en">
<?php session_start();
?>

<head>
    <?php
    include('./includes/head.php')
    ?>
</head>


<body>
    <?php
    include('./includes/navbar.php')
    ?>
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12 col-lg-8 " style="height:80vh">
                <h3>BIENVENIDO</h3>


                <h1 class="title">
                    <?php
                    echo (isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "Usuario no registrado");
                    ?>
                </h1>
                <h3>¡Has ingresado como
                    <?php
                    echo (isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : "Desconocido");
                    ?>
                    !


                </h3>
            </div>


        </div>
    </div>

    <?php
    include('./includes/footer.php')
    ?>

</body>

</html>