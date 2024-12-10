<?php
include("../../../../config.php");
include("../../../../Models/PanelDoctor/AgregarPacientes.php");
include("../../../../Models/PanelDoctor/MostrarPacientes.php");
 

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
    $contraseñaP=$_POST["contraseñaPaciente"];
      $objAgregar=new Doctores_Agregar_Paciente();

      $resultadoConsultaAgregar=$objAgregar->AgregarPacientes($conexiondb,$curpP,$nombreP,$apellidoPP
    ,$apellidoMP,$fechaNP,$contraseñaP,$correoP,$telefonoP,$tipoSP,$fechaUMP,$ocupacionP,
$direccionP,"Sin registro",$idCedula);

if ($resultadoConsultaAgregar==false)
{
echo "false";
}
else  {
$objHtmlMostrar= new Doctor_MostrarPacientes();

echo $objHtmlMostrar->doctorRecuperarpacientes($conexiondb,$idCedula);;
}

}


?>