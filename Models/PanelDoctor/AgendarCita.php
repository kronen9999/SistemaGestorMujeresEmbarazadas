<?php

class AgendarCitaPaciente{

    public function AgendarCita($conexiondb,$fechaCita,$horaCita,$asistencia,$observacion,$cedula,$curp) 
    {
    $consultaAgregar= $conexiondb->prepare("INSERT INTO CITAS (FechaCita,HoraCita,Asistencia,Observacion,Cedula,CurpPaciente) VALUES (?,?,?,?,?,?)");
      
    $consultaAgregar->bind_Param("ssisss",$fechaCita,$horaCita,$asistencia,$observacion,$cedula,$curp);

    $consultaAgregar->execute();

    if ($consultaAgregar->affected_rows > 0) {
        return true ;
    } else {
        return false; 
    }
    }
}


?>