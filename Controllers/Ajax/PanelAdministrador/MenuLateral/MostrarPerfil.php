<?php
include("../../../../config.php");
include("../../../../Models/PanelAdministrador/InfoPerfil.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    session_start();
    $idSesion=isset($_SESSION["IdResponsable"])?$_SESSION["IdResponsable"]:null;
    session_write_close();

$objInfo= new InformacionPerfil();

$htmlObtener=$objInfo->ObtenerInfoPerfil($conexiondb,$idSesion);

echo $htmlObtener;


}



?>