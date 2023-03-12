<?php


class Conexion
{

    protected $pdo;

    public  function connect()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=dpw2_u2_a2_arac', 'root', '');
    }

    public  function close()
    {
        $this->pdo = null;
    }
}
