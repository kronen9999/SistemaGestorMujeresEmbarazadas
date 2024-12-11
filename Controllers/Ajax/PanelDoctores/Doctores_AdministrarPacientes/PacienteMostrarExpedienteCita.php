<?php
include("../../../../config.php");
include("../../../../Models/PanelDoctor/PacienteMostrarExpedienteCita.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

    $idCita=$_POST["idCita"];
$objCitaExpediente= new Doctores_Pacientes_Citas_MostrarExpediente();



echo $objCitaExpediente->citas_MostrarExpedientes($conexiondb,$idCita);


}


?>