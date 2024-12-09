<?php

class Doctor_MostrarPacientes{

    public function doctorRecuperarpacientes ($conexionDB,$cedula){

        $consultaPacientes=$conexionDB->prepare("SELECT * FROM PACIENTES WHERE Cedula=?");

        $consultaPacientes->bind_param("s",$cedula);
     
        $consultaPacientes->execute();
     
        $resultadoConsultaPacientes=$consultaPacientes->get_result();
        $htmlAgregar="";

        while ($fila=$resultadoConsultaPacientes->fetch_assoc())
        {
        $nombre=$fila["Nombre"];
        $apellidoP=$fila["ApellidoPaterno"];
        $apellidoM=$fila["ApellidoMaterno"];
        $Curp=$fila["CurpPaciente"];
        $riesgo=$fila["FactorRiesgo"];

        if ($riesgo=="Sin registro")
        {
        $htmlAgregar.="<div class='Doctores_AdministrarPacientes_2_Paciente' tipodiv='Doctores_Paciente' Estado='Sin registro'>";
        }
        
       else  if ($riesgo=="Sin riesgo")
        {
        $htmlAgregar.="<div class='Doctores_AdministrarPacientes_2_Paciente' tipodiv='Doctores_Paciente' Estado='Sin riesgo'>";
        }
        
       else  if ($riesgo=="En riesgo")
        {
        $htmlAgregar.="<div class='Doctores_AdministrarPacientes_2_Paciente' tipodiv='Doctores_Paciente' Estado='En riesgo'>";
        }
        $htmlAgregar.=" <img src='../Public/Assets/Icono_Administrador_Paciente.png' alt='imgPaciente'>
    <div class='Doctores_AdministrarPacientes_2_Paciente_SubApartado'>
    <p>Nombre:</p>
    <p>$nombre</p>
    </div>
    <div class='Doctores_AdministrarPacientes_2_Paciente_SubApartado'>
    <p>Apellido Paterno:</p>
    <p>$apellidoP</p>
    </div>
    <div class='Doctores_AdministrarPacientes_2_Paciente_SubApartado'>
    <p>Apellido Materno:</p>
    <p>$apellidoM</p>
    </div>
    <div class='Doctores_AdministrarPacientes_2_Paciente_SubApartado'>
    <p>Curp:</p>
    <p>$Curp</p>
    </div>
    <div class='Doctores_AdministrarPacientes_2_Paciente_SubApartado'>
    <p>Estado:</p>
    <p>$riesgo</p>
    </div>
    </div>";

        }

        $html="<div class='Doctores_AdministrarPacientes_1'>
    <p>Lista de Pacientes</p>
    <div class='Doctores_AdministrarPacientes_1_Acotacion'></div>
    <p>Sin registro</p>
    <div class='Doctores_AdministrarPacientes_1_Acotacion'></div>
    <p>Sin riesgo detectado</p>
    <div class='Doctores_AdministrarPacientes_1_Acotacion'></div>
    <p>Riesgo detectado</p>
    <div class='Doctores_AdcministrarPacientes_1_InputBusqueda'>
    <input type='text' class='Doctores_AdministrarPacientes_1_inputtext' placeholder='Buscar doctor'>
    <img src='../Public/Assets/IconoBusqueda.png'>
    </div>
    </div>
    <div class='Doctores_AdministrarPacientes_2'>
    <div class='Doctores_AdministrarPacientes_2_AgregarPaciente' tipodiv='Doctores_AgregarPaciente'>
    <img src='../Public/Assets/IconoAgregar.png' alt='imgAgregar'>
    <p>Agregar Paciente</p>
    </div>";


    $html.=$htmlAgregar."</div>";

    return $html;
    }

}


?>