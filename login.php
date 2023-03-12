<!DOCTYPE html>
<html lang="en">
<?php session_start();
include_once("helpers/user.php");

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

                <?php
                if ($_POST) {

                    $matricula = $_POST["matricula"];
                    $password = $_POST["password"];

                    $user = new User;
                }
                ?>
                <?php if (isset($user)) { ?>
                    <?php if ($user->login($matricula, $password)) { ?>
                        <?php
                        return header("location:welcome.php");
                        $user->close();
                        ?>
                    <?php } else { ?>
                        <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                            Usuario o contraseña incorrectos
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php }  ?>



                <?php }  ?>
            </div>
        </div>
    </div>
    <?php
    include('./includes/footer.php')
    ?>
</body>

</html>