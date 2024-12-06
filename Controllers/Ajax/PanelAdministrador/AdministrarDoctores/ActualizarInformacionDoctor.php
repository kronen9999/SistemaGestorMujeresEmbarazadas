<?php
include("../../../../config.php");
include("../../../../Models/PanelAdministrador/InformacionDoctorEditar.php");
include("../../../../Models/PanelAdministrador/MostrarDoctores.php");

if ($_SERVER["REQUEST_METHOD"]==="POST")
{
    session_start();
$idResponsable=isset($_SESSION["IdResponsable"])?$_SESSION["IdResponsable"]:null;
session_write_close();

$nombreDoctor=isset($_POST["nombreDoctor"])?$_POST["nombreDoctor"]:null;
$apellidoPaterno=isset($_POST["apellidoPDoctor"])?$_POST["apellidoPDoctor"]:null;
$apellidoMaterno=isset($_POST["apellidoMDoctor"])?$_POST["apellidoMDoctor"]:null;
$cedula=isset($_POST["cedulaDoctor"])?$_POST["cedulaDoctor"]:null;
$telefonoMovil=isset($_POST["telefonoMDoctor"])?$_POST["telefonoMDoctor"]:null;
$correoElectronico=isset($_POST["correoDoctor"])?$_POST["correoDoctor"]:null;
$genero=isset($_POST["generoDoctor"])?$_POST["generoDoctor"]:null;
$telefonoOficinaEditar=isset($_POST["telefonoEditarDoctor"])?$_POST["telefonoEditarDoctor"]:null;



$objDoctorEditar=new InformacionDoctor();

$resultadoEditarDoctor=$objDoctorEditar->recuperarInformacionDoctor($conexiondb,$cedula,$idResponsable,$nombreDoctor
,$apellidoPaterno,$apellidoMaterno,$telefonoMovil,$telefonoOficinaEditar,$correoElectronico,$genero);

if ($resultadoEditarDoctor==true)
{
$objMostrarDoctores= new MostrarDoctores();
echo $objMostrarDoctores->MuestreoDoctores($conexiondb,$idResponsable);
}
else if ($resultadoEditarDoctor==false)
{
echo "false";
}


}
?>