<div class="row">
    <div class="col-12 col-lg-6">
        <h2 class="title">Servicios escolares</h2>

        <h3>Nombre:
            <?php
            echo isset($_SESSION['nombre']) ?  $_SESSION['nombre'] : header("location:login.php");
            ?>
        </h3>



        <p>
            Consultar una matricula.
        </p>

        <form class="form-small" action="consulta.php" method="get">
            <input class="form-control" type="number" name="matricula" placeholder="Matricula...">

            <button type="submit" class="btn btn-primary mt-2">Buscar</button>
        </form>



    </div>
    <div class="col-12">
        <?php if (isset($_GET["matricula"])) { ?>

            <?php
            $matricula = $_GET["matricula"];


            $pdo = new PDO('mysql:host=localhost;dbname=dpw2_u2_a2_arac', 'root', '');

            $consulta = $pdo->prepare("SELECT * FROM inscripcion WHERE Matricula = :matricula");

            $consulta->bindParam(':matricula', $matricula);



            $consulta->execute();
            $results = $consulta->fetchAll(PDO::FETCH_OBJ);

            $pdo = null;
            ?>

            <!-- mostrar tabla con resultados -->
            <?php if (isset($consulta) && $consulta->rowCount() > 0) { ?>
                <table class="table table-striped mt-5">

                    <th>
                        Asignatura
                    </th>
                    <th>
                        Grupo
                    </th>
                    <th>
                        Profesor
                    </th>
                    <th>
                        Turno
                        </td>
                    <th>
                        Semestre
                    </th>

                    <th>
                        Estatus
                    </th>
                    <th colspan="2">
                        Acciones
                    </th>

                    <?php foreach ($results as $result) : ?>
                        <tr>
                            <td>
                                <?= $result->Asignatura; ?>
                            </td>
                            <td>
                                <?= $result->Grupo; ?>
                            </td>
                            <td>
                                <?= $result->Profesor; ?>
                            </td>
                            <td>
                                <?= $result->Turno; ?>
                            </td>
                            <td>
                                <?= $result->Semestre; ?>
                            </td>
                            <td>
                                <?= $result->Estatus; ?>
                            </td>
                            <td>
                                <a href="editAsignatura.php?id=<?= $result->id; ?>&matricula=<?= $matricula; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="deleteAsignatura.php?id=<?= $result->id; ?>&matricula=<?= $matricula; ?>">Eliminar</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </table>

            <?php } else {
                echo "<h4 style='text-align: left; color:red'> No se encontraron resultados con la matricula: " . $_GET["matricula"] . "  </h4> ";
            }  ?>







        <?php } ?>
    </div>
    <div>
    <?php if (isset($_SESSION['delete_error'])) { ?>
        <p style="text-align: left; color:red"><?php echo $_SESSION['delete_error'] ?></p>

        <?php
        $_SESSION['delete_error'] = "";
        ?>

    <?php }  ?>


    <?php if (isset($_SESSION['delete_success'])) { ?>
        <p style="text-align: left; color:green"><?php echo $_SESSION['delete_success'] ?></p>
        <?php
        $_SESSION['delete_success'] = "";
        ?>

    <?php }  ?>
</div>
</div>











