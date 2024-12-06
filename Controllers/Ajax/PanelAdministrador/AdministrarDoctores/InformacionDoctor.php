<?php
include("../../../../config.php");
include("../../../../Models/PanelAdministrador/InformacionDoctorEditar.php");

if ($_SERVER["REQUEST_METHOD"]==="POST")
{
    session_start();
$idResponsable=isset($_SESSION["IdResponsable"])?$_SESSION["IdResponsable"]:null;
session_write_close();

$nombreDoctor=isset($_POST[""])?$_POST[""]:null;
$apellidoPaterno=isset($_POST[""])?$_POST[""]:null;
$apellidoMaterno=isset($_POST[""])?$_POST[""]:null;
$cedula=isset($_POST[""])?$_POST[""]:null;
$telefonoMovil=isset($_POST[""])?$_POST[""]:null;
$correoElectronico=isset($_POST[""])?$_POST[""]:null;
$genero=isset($_POST[""])?$_POST[""]:null;
$telefonoOficina=isset($_POST[""])?$_POST[""]:null;

$objDoctorEditar=new InformacionDoctor();

$resultadoEditarDoctor=$objDoctorEditar->recuperarInformacionDoctor($conexiondb,$cedula,$idResponsable,$nombreDoctor
,$apellidoPaterno,$apellidoMaterno,$telefonoMovil,$telefonoOficina,$correoElectronico,$genero);

if ($resultadoEditarDoctor=="true")
{

}
else if ($resultadoEditarDoctor=="false")
{
    
}



}


?>