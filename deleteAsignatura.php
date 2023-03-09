<?php
session_start();


if ($_SESSION['tipo_usuario'] == "SE") {

    $id = $_GET['id'];
    $matricula=$_GET['matricula'];


    $pdo = new PDO('mysql:host=localhost;dbname=dpw2_u2_a2_arac', 'root', '');

    $consulta = $pdo->prepare("DELETE FROM inscripcion WHERE id= :id");

    $consulta->bindParam(':id', $id);
    $consulta->execute();

    $count = $consulta->rowCount();
    $pdo = null;
    if ($count) {
        $_SESSION['delete_success'] = "Registro eliminado";
        header("location:consulta.php?matricula=$matricula
        ");

    } else {
        $_SESSION['delete_error'] = "Error al eliminar el registro";
        header("location:consulta.php?matricula= $matricula");
    }
}
