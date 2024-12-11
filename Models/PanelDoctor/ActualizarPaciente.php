<?php
class Doctores_Actualizar_Paciente
{

    public function ActualizarPaciente($conexionDB,$curp,$nombre,$apellidoP,$apellidoM,$fechaNacimiento,$correo,$telefono,$tipoSangre,$fechaUM,$ocupacion
    ,$direccion)
    {

        $consultaActualizarPacientes=$conexionDB->prepare("UPDATE PACIENTES SET Nombre=?,ApellidoPaterno=?,ApellidoMaterno=?,
        FechaNacimiento=?,CorreoElectronico=?,Telefono=?,TipoSangre=?,FechaUltimaMenstruacion=?,Ocupacion=?,Direccion=? WHERE CurpPaciente=?");

        $consultaActualizarPacientes->bind_param("sssssssssss",$nombre,$apellidoP,$apellidoM,$fechaNacimiento,$correo,$telefono,$tipoSangre,$fechaUM,$ocupacion,$direccion,$curp);
     
        $consultaActualizarPacientes->execute();
     
        if ($consultaActualizarPacientes->affected_rows > 0) {
            return true ;
        } else {
            return false; 
        }
    }

}


?>