<?php
include("../../../../config.php");
include("../../../../Models/PanelDoctor/ActualizarPaciente.php");
include("../../../../Models/PanelDoctor/MuestraMenuPacientes.php");
 

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    session_start();
    $idCedula=isset($_SESSION["Cedula"])?$_SESSION["Cedula"]:null;
    session_write_close();
    $curpP=$_POST["curpPaciente"];
    $nombreP=$_POST["nombrePaciente"];
    $apellidoPP=$_POST["apellidoPPaciente"];
    $apellidoMP=$_POST["apellidoMPaciente"];
    $fechaNP=$_POST["fechaNPaciente"];
    $correoP=$_POST["correoPaciente"];
    $telefonoP=$_POST["telefonoPaciente"];
    $tipoSP=$_POST["tipoSangrePaciente"];
    $fechaUMP=$_POST["fechaUmPaciente"];
    $ocupacionP=$_POST["ocupacionPaciente"];
    $direccionP=$_POST["direccionPaciente"];

      
    $objActualizarPaciente=new Doctores_Actualizar_Paciente();

    $resultadoConsultaModificar=$objActualizarPaciente->ActualizarPaciente($conexiondb,$curpP,$nombreP,$apellidoPP
,$apellidoMP,$fechaNP,$correoP,$telefonoP,$tipoSP,$fechaUMP,$ocupacionP,$direccionP);

if ($resultadoConsultaModificar==false)
{
echo "false";
}
else  {
$objHtmlMostrar= new MuestraMenuPacientes();

echo $objHtmlMostrar->recuperarMenu($conexiondb,$curpP,$idCedula);
}

}


?>