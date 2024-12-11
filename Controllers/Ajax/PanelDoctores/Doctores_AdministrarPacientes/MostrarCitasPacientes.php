<?php
include("../../../../config.php");
include("../../../../Models/PanelDoctor/MostrarCitasPacientes.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

    $curpP=$_POST["curpPaciente"];

$objMostrarCitasPacientes= new  Doctores_Mostrar_Citas_Paciente();

$htmlRetorno=$objMostrarCitasPacientes->MostrarCitasPaciente($conexiondb,$curpP);


echo $htmlRetorno;


}


?>