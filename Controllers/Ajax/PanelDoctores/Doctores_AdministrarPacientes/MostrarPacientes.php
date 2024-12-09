<?php
include("../../../../config.php");
include("../../../../Models/PanelDoctor/MostrarPacientes.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    session_start();
    $idCedula=isset($_SESSION["Cedula"])?$_SESSION["Cedula"]:null;
    session_write_close();

$objMostrarPacientes= new  Doctor_MostrarPacientes();

$htmlRetorno=$objMostrarPacientes->doctorRecuperarpacientes($conexiondb,$idCedula);


echo $htmlRetorno;


}


?>