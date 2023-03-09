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

    <!-- CDN Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>