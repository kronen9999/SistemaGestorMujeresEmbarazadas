<?php
include ("../../../../config.php");
include("../../../../Models/PanelAdministrador/AgregarClinicas.php");
include("../../../../Models/PanelAdministrador/MostrarClinicas.php");

if ($_SERVER["REQUEST_METHOD"]==="POST")
{
    session_start();
    $idSesion=isset($_SESSION["IdResponsable"])?$_SESSION["IdResponsable"]:null;
    session_write_close();

    $idClinica=$_POST["idClinica"]?$_POST["idClinica"]:null;
    $nombreClinica=$_POST["nomnbreClinica"]?$_POST["nomnbreClinica"]:null;
    $localidadClinica=$_POST["localidadClinica"]?$_POST["localidadClinica"]:null;
    $direccionClinica=$_POST["direccionClinica"]?$_POST["direccionClinica"]:null;

    $objAgregarClinica= new AgregarClinicas();

    $resultadoOperacion=$objAgregarClinica->AgregacionClinicas($conexiondb,$idSesion,$idClinica,$nombreClinica,
$localidadClinica,$direccionClinica);

if ($resultadoOperacion=="true")
{
$objMostrarClinicas=new MostrarClinicas();
$htmlObtener=$objMostrarClinicas->RecibirClinicas($conexiondb,$idSesion);
echo $htmlObtener;
}
else if ($resultadoOperacion=="false")
{
echo "false";
}




}
    




?>