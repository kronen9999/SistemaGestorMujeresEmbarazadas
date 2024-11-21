<?php
include("../../../Models/Index/ValidacionLogin.php");
include("../../../config.php");

$objValidar =new  ValidacionUsuario();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $tipoLogin=$_POST['tipoLogin'];

$resultado=$objValidar->ConsultaDb($tipoLogin,$usuario,$usuario,$contraseña,$conexiondb);



    
    echo "$resultado";
}
?>