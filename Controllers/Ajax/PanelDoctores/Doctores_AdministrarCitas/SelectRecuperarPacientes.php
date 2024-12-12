<?php
include ("../../../../config.php");
include ("../../../../Models/PanelDoctor/SelectRecuperarPacientes.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    $idCedula=isset($_SESSION["Cedula"])?$_SESSION["Cedula"]:null;
    session_write_close();
    
    
    $objPacientesSelect= new SelectRecuperarPacientesRetorno();

    $opcionesAgregar=$objPacientesSelect->recuperarPacientesSelect($conexiondb,$idCedula);

    echo $opcionesAgregar;
}
?>
