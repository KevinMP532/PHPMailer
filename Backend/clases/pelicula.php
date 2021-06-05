<?php
class pelicula
{
    public $nombre;
   // public $idPelicula;
    public $img;
    public $activo = 1;
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function returnMovies()
    {

        $query = "SELECT
                 *
            FROM
                pelicula
           ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_CLASS);

        return $row;
    }

    function returnOneMovie($ID)
    {

        $query = "SELECT
                 *
            FROM
                pelicula
           WHERE idPelicula = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $ID);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_CLASS);

        return $row;
    }

    function crearDatos()
    {
        $sql =  "INSERT INTO pelicula (nombre, img, activo) VALUES(?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->nombre);
        $stmt->bindParam(2, $this->img);
        $stmt->bindParam(3, $this->activo);
        $stmt->execute();
    }
}