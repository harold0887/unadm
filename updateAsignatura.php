<?php
session_start();


if ($_SESSION['tipo_usuario'] == "SE" && isset($_POST)) {

    $id = $_POST['id'];
    $matricula = $_POST['matricula'];
    $asignatura = $_POST['asignatura'];
    $grupo = $_POST['grupo'];
    $profesor = $_POST['profesor'];
    $turno = $_POST['turno'];
    $semestre = $_POST['semestre'];
    $estatus = $_POST['estatus'];


    $pdo = new PDO('mysql:host=localhost;dbname=dpw2_u2_a2_arac', 'root', '');

    $consulta = $pdo->prepare(" UPDATE inscripcion SET Matricula=:Matricula,Asignatura=:Asignatura, Grupo=:Grupo, Profesor=:Profesor, Turno=:Turno, Semestre=:Semestre, Estatus=:Estatus  WHERE id= $id");

    $consulta->bindParam(':Matricula', $matricula);
    $consulta->bindParam(':Asignatura', $asignatura);
    $consulta->bindParam(':Grupo', $grupo);
    $consulta->bindParam(':Profesor', $profesor);
    $consulta->bindParam(':Turno', $turno);
    $consulta->bindParam(':Semestre', $semestre);
    $consulta->bindParam(':Estatus', $estatus);

    $consulta->execute();

    $count = $consulta->rowCount();

    $pdo = null;
    if ($count) {
        $_SESSION['update_success'] = "Registro actualizado";
        header("location:editAsignatura.php?id=$id&matricula=$matricula");
    } else {
        $_SESSION['update_error'] = "Error al actualizar el registro";
        header("location:editAsignatura.php?id=$id&matricula=$matricula");
    }
}
