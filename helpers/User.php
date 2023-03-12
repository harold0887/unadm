<?php


class User
{
    protected $pdo;
    protected $conexion;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=dpw2_u2_a2_arac', 'root', '');
    }



    public  function login($matricula, $password)
    {

        $consulta = $this->pdo->prepare("SELECT * FROM usuarios WHERE Matricula = :matricula");
        $consulta->bindParam(':matricula', $matricula);


        $consulta->execute();

        $count = $consulta->rowCount();
        $data = $consulta->fetch(PDO::FETCH_ASSOC);
        if ($count) {
            if (password_verify($password, $data['Password'])) {
                $_SESSION['nombre'] = $data["Nombre"] . " " . $data["ApellidoPaterno"] . " " . $data["ApellidoMaterno"];
                $_SESSION['matricula'] = $data["Matricula"];
                $_SESSION['tipo_usuario'] = $data["TipoUsuario"];
                return true;
            } else {
                return false;
            }
        }
    }



    public function close(){
        $this->pdo =null;
    }
}
