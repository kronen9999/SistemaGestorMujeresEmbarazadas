<?php
include ("../../../../config.php");
include ("../../../../Models/PanelDoctor/MostrarCitas.php");
include ("../../../../Models/PanelDoctor/EliminarCita.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    $idCedula=isset($_SESSION["Cedula"])?$_SESSION["Cedula"]:null;
    session_write_close();
    
    $fecha = $_POST['fecha']; 
    $idCita = $_POST['idCita']; 
    $objEliminarCita= new Doctores_Eliminar_Cita_Expedientes();

    $objResultadoEliminar=$objEliminarCita->EliminarCita($conexiondb,$idCita);
    
    

    if ($objResultadoEliminar==false)
    {
        echo "false";
    }
    else{
        $objCitas = new MostrarCitasCalendario();

    echo $objCitas->RecpererarCitas($conexiondb,$fecha,$idCedula);
    }
}
?>
