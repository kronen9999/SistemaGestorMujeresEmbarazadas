<?php
include("../../../../config.php");
include("../../../../Models/PanelAdministrador/MostrarDoctores.php");
include("../../../../Models/PanelAdministrador/AgregarDoctor.php.php");

if ($_SERVER["REQUEST_METHOD"]==="POST")
{
    session_start();
    $idResponsable=isset($_SESSION["IdResponsable"])?$_SESSION["IdResponsable"]:null;
    session_write_close();
    

$nombreDoctor=isset($_POST["docNombre"])?$_POST["docNombre"]:null;
$apellidoPaterno=isset($_POST["docApellidoP"])?$_POST["docApellidoP"]:null;
$apellidoMaterno=isset($_POST["docApellidoM"])?$_POST["docApellidoM"]:null;
$cedula=isset($_POST["docCedula"])?$_POST["docCedula"]:null;
$telefonoMovil=isset($_POST["docTelefonoM"])?$_POST["docTelefonoM"]:null;
$correoElectronico=isset($_POST["docCorreo"])?$_POST["docCorreo"]:null;
$genero=isset($_POST["docGenero"])?$_POST["docGenero"]:null;
$clinica=isset($_POST["docIdClinica"])?$_POST["docIdClinica"]:null;
$telefonoO=isset($_POST["docTelefonoO"])?$_POST["docTelefonoO"]:null;
$contraseña=isset($_POST["docContraseña"])?$_POST["docContraseña"]:null;



$objDoctorAgregar= new AgregarDoctores();

$resultadoAgregarDoctor=$objDoctorAgregar->AgregacionDoctores($conexiondb,$cedula,$nombreDoctor,$apellidoPaterno
,$apellidoMaterno,$telefonoMovil,$telefonoO,$contraseña,$correoElectronico,"Medico General",$genero,$clinica);

if ($resultadoAgregarDoctor==true)
{
$objMostrarDoctores= new MostrarDoctores();
echo $objMostrarDoctores->MuestreoDoctores($conexiondb,$idResponsable);
}
else if ($resultadoAgregarDoctor==false)
{
echo "false";
}


}
?>