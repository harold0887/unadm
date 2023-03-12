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
    <div class="container">
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