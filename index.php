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
        <div class="row">
            <div class="col-12">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" style="height: 500px;">
                        <div class="carousel-item active justify-content-center">
                            <img src="./img/campus1.jpg" class=" w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/campus2.jpg" class=" w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/campus3.jpg" class=" w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <section>
            <h2 class="text-center my-4">Tipos de bachillerato</h2>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="cardBox card shadow shadow-lg">
                        <div class="card-body text-center">
                            <img class="bg-secondary  rounded-circle" width="120" height="120" src="./img/avisos.png" alt="">
                            <h2 class="card-title  text-muted"> General </h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="cardBox card shadow shadow-lg">
                        <div class="card-body text-center">
                            <img class="bg-secondary  rounded-circle" width="120" height="120" src="./img/aviso1.png" alt="">
                            <h2 class="card-title  text-muted"> Tecnológico </h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="cardBox card shadow shadow-lg">
                        <div class="card-body text-center">
                            <img class="bg-secondary  rounded-circle" width="120" height="120" src="./img/aviso2.png" alt="">
                            <h2 class="card-title  text-muted"> Propedéutico </h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="cardBox card shadow shadow-lg">
                        <div class="card-body text-center">
                            <img class="bg-secondary  rounded-circle" width="120" height="120" src="./img/aviso3.png" alt="">
                            <h2 class="card-title  text-muted"> Profesional técnico </h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="cardBox card shadow shadow-lg">
                        <div class="card-body text-center">
                            <img class="bg-secondary  rounded-circle" width="120" height="120" src="./img/aviso4.png" alt="">
                            <h2 class="card-title  text-muted"> Sistema abierto </h2>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="cardBox card shadow shadow-lg">
                        <div class="card-body text-center">
                            <img class="bg-secondary  rounded-circle" width="120" height="120" src="./img/aviso5.png" alt="">
                            <h2 class="card-title  text-muted"> En línea </h2>
                        </div>
                    </div>
                </div>

            </div>



        </section>
        <section>

            <h2 class="text-center my-4">Actividades complementarias </h2>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 text-center">
                    <div class="card shadow" style="height: 325px;">
                        <div class="card-body">
                            <h5 class="card-title text-success">Artísticas</h5>
                            <p class="card-text" style="text-align:justify !important;">La participación en actividades artísticas se define como la realización actividades artísticas y creativas, como danza, teatro, música, pintura y escultura. Estas actividades pueden impartirse como parte del currículo o como actividad extraescolar.</p>

                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-6 col-lg-4 text-center">
                    <div class="card shadow" style="height: 325px;">
                        <div class="card-body">
                            <h5 class="card-title text-success">Culturales</h5>
                            <p class="card-text" style="text-align:justify !important;">El Servicio Cultural facilita la posibilidad de acceder a clases especializadas en artes, que retan al estudiante a nivel físico e intelectual, fortaleciendo su inteligencia emocional, ejercitando en el pensamiento crítico, las soluciones creativas a nivel personal y profesional. Para esto dispone de 48 actividades culturales entre niveles recreativo, formativo y elencos artísticos, a los cuales se puede acceder mediante inscripción, al inicio del semestre.</p>

                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-6 col-lg-4 text-center">
                    <div class="card shadow" style="height: 325px;">
                        <div class="card-body">
                            <h5 class="card-title text-success">Deportivas</h5>
                            <p class="card-text" style="text-align:justify !important;">Actividades que fortalecen el desarrollo físico y psicosocial, mediante el movimiento y la adquisición de destrezas y capacidades con el fin de mejorar el rendimiento físico de las personas; desenvolverse a nivel competitivo en diferentes eventos, pero sobre todo promover un estilo de vida saludable para la prevención de enfermedades relacionadas con la inactividad física.</p>

                        </div>
                    </div>



                </div>

            </div>
        </section>





    </div>




    <?php
    include('./includes/footer.php')
    ?>

</body>

</html>