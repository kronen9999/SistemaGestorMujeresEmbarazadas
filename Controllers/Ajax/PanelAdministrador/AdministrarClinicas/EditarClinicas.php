<?php
include ("../../../../config.php");
include("../../../../Models/PanelAdministrador/EditarClinicas.php");
include("../../../../Models/PanelAdministrador/MostrarClinicas.php");
if ($_SERVER["REQUEST_METHOD"]==="POST")
{
    session_start();
    $idSesion=isset($_SESSION["IdResponsable"])?$_SESSION["IdResponsable"]:null;
    session_write_close();

    $idClinica=isset($_POST["idClinica"])?$_POST["idClinica"]:null;
    $nombreClinica=isset($_POST["nombreClinica"])?$_POST["nombreClinica"]:null;
    $localidadClinica=isset($_POST["localidadClinica"])?$_POST["localidadClinica"]:null;
    $direccionClinica=isset($_POST["direccionClinica"])?$_POST["direccionClinica"]:null;

    $objConsultaEditar=new EdicionClinicas();

    $ejecucionConsulta=$objConsultaEditar->editarclinicas($conexiondb,$idSesion,$idClinica,$nombreClinica,$localidadClinica,$direccionClinica);

    if ($ejecucionConsulta=="true")
    {
   $objMostrarClinicas=new MostrarClinicas();
   $devolverHtml=$objMostrarClinicas->RecibirClinicas($conexiondb,$idSesion);
   echo $devolverHtml;

    }
    else if ($ejecucionConsulta=="false")
    {
   echo "false";
    }



}


?>