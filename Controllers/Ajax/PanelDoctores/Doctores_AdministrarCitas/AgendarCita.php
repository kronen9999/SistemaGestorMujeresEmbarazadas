<?php
include ("../../../../config.php");
include ("../../../../Models/PanelDoctor/MostrarCitas.php");
include ("../../../../Models/PanelDoctor/AgendarCita.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    $idCedula=isset($_SESSION["Cedula"])?$_SESSION["Cedula"]:null;
    session_write_close();
    $fechaCita = $_POST['fechaCita']; 
    $horaCita = $_POST['horaCita']; 
    $curpP = $_POST['curpPaciente']; 

    $objAgregarCita= new AgendarCitaPaciente();
    
    $objResultado=$objAgregarCita->AgendarCita($conexiondb,$fechaCita,$horaCita,"0","Ninguna",$idCedula,$curpP);

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
