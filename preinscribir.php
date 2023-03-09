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


        <?php

        if (isset($_SESSION) && $_SESSION['tipo_usuario'] == "AL") {

            include('./includes/preinscribirAlumno.php');
        } else {
            include('./includes/preinscribirSE.php');
        }

        ?>









    </div>




    <?php
    include('./includes/footer.php')
    ?>

</body>

</html>