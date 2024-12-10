<?php
include("../../../../config.php");
include("../../../../Models/PanelDoctor/MostrarApartadoActualizar.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
   $idCurp=$_POST["curpPaciente"];

$objMostrarPacientes= new  Doctor_MostrarPacientesActualizar();

$htmlRetorno=$objMostrarPacientes->doctorRecuperarActpacientes($conexiondb,$idCurp);


echo $htmlRetorno;


}


?>