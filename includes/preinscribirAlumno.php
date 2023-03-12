<div class="row">
    <div class="col-12 col-lg-6">
        <h1 class="title">Preinscribir asignatura</h1>

        <form action="preinscribir.php" method="post">
            <select class="form-control" name="asignatura" id="">
                <option value="" selected disabled>Seleccione una asignatura...</option>
                <option value="Desarrollo web 1">Desarrollo web 1</option>
                <option value="Desarrollo web 2">Desarrollo web 2</option>
                <option value="POO 1">POO 1</option>
                <option value="POO 2">POO 2</option>
                <option value="POO 3">POO 3</option>
            </select>
            <button type="submit" class="btn btn-primary mt-3">Enviar</button>
        </form>
    </div>
    <div class="col-12 col-lg-6">
        <?php
        // Arrays para guardar errores:
        $aErrores = array();


        // Comprobar si se ha enviado el formulario:
        if (!empty($_POST)) {


            //validar matricula
            if (isset($_POST['asignatura']) && !empty($_POST['asignatura'])) {


                try {
                    $pdo = new PDO('mysql:host=localhost;dbname=dpw2_u2_a2_arac', 'root', '');
                } catch (\Throwable $th) {
                    echo "Error al conectar a la base de datos: " . $th->getMessage();
                }


                $matricula = $_SESSION['matricula'];
                $asignatura = $_POST['asignatura'];
                $grupo = "pendiente";
                $profesor = "pendiente";
                $turno = "pendiente";
                $semeste = 3;
                $estatus = "preinscrita";




                $consulta = $pdo->prepare("INSERT INTO inscripcion(Matricula,Asignatura,Grupo,Profesor,Turno,Semestre,Estatus) 
            VALUES(:Matricula,:Asignatura,:Grupo,:Profesor,:Turno,:Semestre,:Estatus)");


                $consulta->bindParam(':Matricula', $matricula);
                $consulta->bindParam(':Asignatura', $asignatura);
                $consulta->bindParam(':Grupo', $grupo);
                $consulta->bindParam(':Profesor', $profesor);
                $consulta->bindParam(':Turno', $turno);
                $consulta->bindParam(':Semestre', $semeste);
                $consulta->bindParam(':Estatus', $estatus);



                try {
                    if ($consulta->execute()) {
                        echo "<p style='text-align: left; color:green'>Registro existoso</p>";
                    } else {
                        echo "<p>Error al guardar los datos:</p>";

                        print_r($consulta->errorInfo());
                    }
                } catch (Exception $e) {
                    echo 'Error al guardar los datos: ',  $e->getMessage(), "\n";
                } finally {
                    // cualquera que sea el rexultado, cerramos la concexion
                    $pdo = null;
                }
            } else {
                echo "<p style='text-align: left; color:red'>Seleccione una opcion valida</p>";
            }
        }

        ?>

    </div>
</div>