<?php
include ("../../../../config.php");
include ("../../../../Models/PanelDoctor/MostrarCitas.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    $idCedula=isset($_SESSION["Cedula"])?$_SESSION["Cedula"]:null;
    session_write_close();
    $fecha = $_POST['fecha']; 
    
    $objCitas = new MostrarCitasCalendario();

    echo $objCitas->RecpererarCitas($conexiondb,$fecha,$idCedula);
}
?>
