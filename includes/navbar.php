<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid ">
        <a class="navbar-brand" href="./index.php">Tu prepa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a id="index" class="nav-link " aria-current="page" href="./index.php">Home</a>
                </li>
                <?php if ($_SESSION) { ?>
                    <li class="nav-item">
                        <a id="welcome" class="nav-link " aria-current="page" href="./welcome.php">Bienvenido</a>
                    </li>
                    <li class="nav-item">
                        <a id="preinscribir" class="nav-link " aria-current="page" href="preinscribir.php">Preinscribir asignatura</a>
                    </li>
                    <li class="nav-item">
                        <a id="consulta" class="nav-link " aria-current="page" href="./consulta.php">Consultar inscripción</a>
                    </li>


                <?php } else { ?>

                    <li class="nav-item">
                        <a id="register" class="nav-link " aria-current="page" href="./register.php">Registrarse</a>
                    </li>

                    <li class="nav-item">
                        <a id="login" class="nav-link " aria-current="page" href="./login.php">Login</a>
                    </li>
                <?php }  ?>

                <?php if ($_SESSION) { ?>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['nombre'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./logout.php">Salir</a></li>




                        </ul>
                    </li>


                <?php }  ?>


            </ul>

        </div>
    </div>
</nav>