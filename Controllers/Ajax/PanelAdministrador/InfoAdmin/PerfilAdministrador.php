<?php
include ("../../../../config.php");
include ("../../../../Models/PanelAdministrador/ActualizarPerfil.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$nombre=isset($_POST["nombre"])?$_POST["nombre"]:null;    
$apellidoP=isset($_POST["nombre"])?$_POST["apellidoP"]:null;    
$apellidoM=isset($_POST["nombre"])?$_POST["apellidoM"]:null;    
$noTrabajador=isset($_POST["nombre"])?$_POST["noTrabajador"]:null;    
$telefono=isset($_POST["nombre"])?$_POST["telefono"]:null;    
$correoE=isset($_POST["nombre"])?$_POST["correo"]:null;    

$objActualizar = new ActualizarPerfilAdmin();
session_start();
$idResponsable=isset($_SESSION["IdResponsable"])?$_SESSION["IdResponsable"]:null;
session_write_close();

$resultadoOperacion=$objActualizar->ActualizarPerfil($conexiondb,$idResponsable,
$nombre,$apellidoP,$apellidoM,$noTrabajador,$telefono,$correoE);

if ($resultadoOperacion=="true")
{
echo json_encode(['estado'=>'realizado','mensaje'=>'Datos actualizados correctamente']);
}
else if ($resultadoOperacion=="false")
{
    echo json_encode(['estado'=>'noRealizado','mensaje'=>'No se detectaron cambios en los campos']);
}

    
    
}


?>