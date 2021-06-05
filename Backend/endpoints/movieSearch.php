<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../clases/BD.php';
include_once '../clases/pelicula.php';

$database = new BD();
$db = $database->getConnection();
$pelicula = new pelicula($db);
$data = json_decode(file_get_contents("php://input"));
$singleMovie = $pelicula->returnOneMovie($data->idPelicula);
if ($singleMovie != null) {
    http_response_code(200);
    echo json_encode($singleMovie);
} else {
    http_response_code(200);
    echo json_encode("No record under id '$data->idPelicula'");
}
