<?php
include("../../../../config.php");
include("../../../../Models/PanelDoctor/MuestraMenuPacientes.php");
 

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    session_start();
    $idCedula=isset($_SESSION["Cedula"])?$_SESSION["Cedula"]:null;
    session_write_close();
    $curpP=$_POST["curpPaciente"];
  
      $objMostrar = new MuestraMenuPacientes();

      echo $objMostrar->recuperarMenu($conexiondb,$curpP,$idCedula);


      



}


?>