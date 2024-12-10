<?php

class MuestraMenuPacientes{

    public function recuperarMenu($conexionDB,$curp,$cedula)
    {
        $consultaInfoPaciente=$conexionDB->prepare("SELECT Nombre,ApellidoPaterno,ApellidoMaterno,CurpPaciente FROM PACIENTES WHERE CurpPaciente =? and Cedula=?");

        $consultaInfoPaciente->bind_param("ss",$curp,$cedula);
     
        $consultaInfoPaciente->execute();
     
        $resultadoConsulta=$consultaInfoPaciente->get_result();

        $html="";
        while ($fila=$resultadoConsulta->fetch_assoc())
        {
            $nombreP=$fila["Nombre"];
            $apellidoP=$fila["ApellidoPaterno"];
            $apellidoM=$fila["ApellidoMaterno"];
            $curpP=$fila["CurpPaciente"];

        $html.="<p class='Doctores_MenuPaciente_Paciente' curpId_TituloP='$curpP'>Paciente : $nombreP  $apellidoP  $apellidoM</p>
    <div class='Doctores_MenuPaciente'>
    <div class='Doctores_MenuPaciente_Opcion' opcion='EditarPaciente'>
    <img src='../Public/Assets/IconoEditarInfoPaciente.png'>
    <p>Editar informacion del paciente</p>
    </div>
    <div class='Doctores_MenuPaciente_Opcion' opcion='VerCitas'>
    <img src='../Public/Assets/IconoCitas.png'>
    <p>Citas registradas</p>
    </div>
    <div class='Doctores_MenuPaciente_Opcion' opcion='VerRecetas'>
    <img src='../Public/Assets/IconoRecetas.png'>
    <p>Recetas del paciente</p>
    </div>
    </div>";
        }

        return $html;
    }

}


?>