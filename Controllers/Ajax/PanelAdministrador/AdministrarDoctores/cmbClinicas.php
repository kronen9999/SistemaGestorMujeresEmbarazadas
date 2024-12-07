<?php
include("../../../../config.php");
include("../../../../Models/PanelAdministrador/cmbClinicas.php");
if ($_SERVER['REQUEST_METHOD']==="POST")
{
   session_start();
$idResponsable=isset($_SESSION["IdResponsable"])?$_SESSION["IdResponsable"]:null;
session_write_close();

$objCmb=new cmbClinicasRegresar();

$cmbRedibuj=$objCmb->datosCmbClinicas($conexiondb,$idResponsable);

echo $cmbRedibuj;
}





?>