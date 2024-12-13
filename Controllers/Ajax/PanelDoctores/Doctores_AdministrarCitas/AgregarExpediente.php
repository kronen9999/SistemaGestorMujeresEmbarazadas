<?php
include ("../../../../config.php");
include ("../../../../Models/PanelDoctor/MostrarCitas.php");
include ("../../../../Models/PanelDoctor/AgregarExprediente.php");
include ("../../../../Models/PanelDoctor/ActualizarPacienteCitas.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    $idCedula=isset($_SESSION["Cedula"])?$_SESSION["Cedula"]:null;
    session_write_close();
    $pesoMaterno = $_POST['pesoMaterno']; 
$presion = $_POST['presion']; 
$fCFetal = $_POST['fCFetal']; 
$alturaUterina = $_POST['alturaUterina']; 
$movimientosFetales = $_POST['movimientosFetales']; 
$posicionFetal = $_POST['posicionFetal']; 
$evaulacionEdemas = $_POST['evaulacionEdemas']; 
$riesgoPaciente = $_POST['riesgoPaciente']; 
$idCita = $_POST['idCita']; 
$curpPaciente = $_POST['curpPaciente'];

    $objExpedienteCita= new Doctores_Agregar_Cita_Expediente();
    
    $objResultado=$objExpedienteCita->AgregarExpediente($conexiondb,$pesoMaterno,$presion,$fCFetal,$alturaUterina
,$movimientosFetales,$posicionFetal,$evaulacionEdemas,$riesgoPaciente,$idCita);

$objactualizarPaciente= new Doctores_Actualizar_Cita_Paciente_Desenlace ();

$objactualizarPaciente->ActualizarUsuario($conexiondb,$riesgoPaciente,$curpPaciente);

    if ($objAgregarCita==false)
    {
        echo "false";
    }
    else{
        $objCitas = new MostrarCitasCalendario();

    echo $objCitas->RecpererarCitas($conexiondb,$fechaCita,$idCedula);
    }
}
?>
