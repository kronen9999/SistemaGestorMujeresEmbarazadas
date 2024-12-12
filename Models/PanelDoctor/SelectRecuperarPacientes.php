<?php

class SelectRecuperarPacientesRetorno{

    public function recuperarPacientesSelect($conexiondb,$cedula)
    {

        $objConsultaRecuperarPacientes= $conexiondb->prepare("SELECT * FROM PACIENTES WHERE Cedula=?");

        $objConsultaRecuperarPacientes->bind_param("s",$cedula);

        $objConsultaRecuperarPacientes->execute();

        $resultadoConsulta=$objConsultaRecuperarPacientes->get_result();

        $selectOption="<option>Seleccione un paciente</option>";
        while ($fila=$resultadoConsulta->fetch_assoc())
        {
         $nombreP=$fila["Nombre"];
         $apellidoPP=$fila["ApellidoPaterno"];
         $apellidoMP=$fila["ApellidoMaterno"];
         $curpP=$fila["CurpPaciente"];

         $selectOption.="<option value='$curpP'> Curp del paciente:$curpP Nombre:$nombreP $apellidoPP $apellidoMP</option>";
        }

        return $selectOption;
    }
}





?>