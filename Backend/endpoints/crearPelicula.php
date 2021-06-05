<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once '../clases/BD.php';
include_once '../clases/pelicula.php';

$database = new BD();
$db = $database->getConnection();
$pelicula = new pelicula($db);
$data = json_decode(file_get_contents("php://input"));
//$pelicula->idPelicula = $data->idpelicula;
$pelicula->nombre = $data->Nombre;
$pelicula->img = $data->Img;
$pepe = $pelicula->crearDatos();
$content = "La pelicula $pelicula->nombre ha sido agregada.";
function sendEmail($content)
{

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = "true";
    $mail->SMTPSecure = "tls";
    $mail->Port = "587";
    $mail->Username = "cuentadescartablekevinm@gmail.com";
    $mail->Password = "contraMuySegura9902";
    $mail->Subject = "Peliculas Kevin Mora";
    $mail->setFrom("kevin.mora@anima.edu.uy");
    $mail->Body = "$content";
    $mail->addAddress("kevin.mora@anima.edu.uy");
    if ($mail->Send()) {
        echo "True";
    } else {
        echo "False";
    };
    $mail->smtpClose();
};
sendEmail($content);

http_response_code(200);
echo json_encode($pepe);
