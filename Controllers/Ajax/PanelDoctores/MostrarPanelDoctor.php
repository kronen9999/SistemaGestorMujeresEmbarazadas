<?php
include("../../../config.php");
include("../../../Models/PanelDoctor/MostrarPanelPrincipal.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    session_start();
    $idCedula=isset($_SESSION["Cedula"])?$_SESSION["Cedula"]:null;
    session_write_close();

$objMostrar= new  PanelPrincipalDoctor();
$fechaHoy = date('Y-m-d');



$htmlObtener=$objMostrar->retornarPanelPrincipal($conexiondb,$idCedula,$fechaHoy);

echo $htmlObtener;


}


?>