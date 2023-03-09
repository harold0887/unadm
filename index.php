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
    <?php
    include('./includes/navbar.php')
    ?>
    <div class="container">


        <div class="row">
            <div class="col-12 col-lg-4">

            </div>
            <div class="col-12 col-lg-4 text-center">
                <img src="./img/logo.png" alt="" class="logo" width="200" />
                <h3 class="mt-3">BIENVENIDOS A</h3>
                <h1 class="mt-3">Tu Prepa Cancún</h1>
                <h2 class="my-5">Nuestro Bachillerato</h2>
                <p>
                    El Sistema se creó para ofrecer servicios educativos, para quienes
                    desean iniciar, continuar o concluir sus estudios de educación media
                    superior.
                </p>
                <p>
                    El sistema mejora las estrategias pedagógicas y su forma de atención
                    con la incorporación de recursos tecnológicos, permitiéndo al
                    estudiante reorientar y consolidar su práctica educativa a través de
                    la diversificación de los servicios presenciales y por Internet.
                </p>
            </div>
            <div class="col-12 col-lg-4">

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