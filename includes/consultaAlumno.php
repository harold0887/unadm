<h2 class="title">Alumno:
    <?php
    echo isset($_SESSION['matricula']) ?  $_SESSION['matricula'] : header("location:login.php");
    ?>
</h2>

<h3>Nombre:
    <?php
    echo isset($_SESSION['nombre']) ?  $_SESSION['nombre'] : header("location:login.php");
    ?>
</h3>



<p>
    Estatus de inscripción
</p>




<?php if (isset($_SESSION['matricula'])) { ?>

<?php 
$matricula = $_SESSION['matricula'];


$pdo = new PDO('mysql:host=localhost;dbname=dpw2_u2_a2_arac', 'root', '');

$consulta = $pdo->prepare("SELECT * FROM inscripcion WHERE Matricula = :matricula");

$consulta->bindParam(':matricula', $matricula);



$consulta->execute();
$results = $consulta->fetchAll(PDO::FETCH_OBJ);

$pdo = null;
?>

<!-- mostrar tabla con resultados -->
<?php if (isset ($consulta) && $consulta->rowCount() > 0) { ?>
<table border style="width: 100%">

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
        </tr>

    <?php endforeach; ?>

</table>

<?php }else{
echo "<h4 style='text-align: left; color:red'> No se encontraron resultados con la matricula: ".$_SESSION['matricula']."  </h4> "  ;
}  ?>







<?php }?>


