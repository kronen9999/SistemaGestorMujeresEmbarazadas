<?php
include ("../../../../config.php");
include("../../../../Models/PanelAdministrador/MostrarClinicas.php");

if ($_SERVER['REQUEST_METHOD']==='POST')
{
  $objMostrar=new MostrarClinicas();
session_start();
$idResponsable=isset($_SESSION["IdResponsable"])?$_SESSION["IdResponsable"]:null;
session_write_close();

$htmlRecibido=$objMostrar->RecibirClinicas($conexiondb,$idResponsable);

echo $htmlRecibido;  
}




?>