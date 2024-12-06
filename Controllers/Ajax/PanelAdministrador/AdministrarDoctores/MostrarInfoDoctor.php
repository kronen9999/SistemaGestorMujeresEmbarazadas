<?php

include("../../../../config.php");
include("../../../../Models/PanelAdministrador/MostrarInfoDoctor.php");

if ($_SERVER["REQUEST_METHOD"]==="POST")
{
    session_start();
    $idResponsable=isset($_SESSION["IdResponsable"])?$_SESSION["IdResponsable"]:null;
    session_write_close();

    $cedulaDoc=isset($_POST["cedulaDoctor"])?$_POST["cedulaDoctor"]:null;

    $objDevolver= new mostrarInfoDoctor();


    $resultadohtml=$objDevolver->devolverInfo($conexiondb,$cedulaDoc,$idResponsable);

    echo $resultadohtml;



}


?>