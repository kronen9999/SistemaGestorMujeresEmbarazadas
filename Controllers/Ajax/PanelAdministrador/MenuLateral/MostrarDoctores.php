<?php
include("../../../../config.php");
include("../../../../Models/PanelAdministrador/MostrarDoctores.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    session_start();
    $idSesion=isset($_SESSION["IdResponsable"])?$_SESSION["IdResponsable"]:null;
    session_write_close();

$objDoctores= new MostrarDoctores();

$htmlObtener=$objDoctores->MuestreoDoctores($conexiondb,$idSesion);

echo $htmlObtener;


}



?>