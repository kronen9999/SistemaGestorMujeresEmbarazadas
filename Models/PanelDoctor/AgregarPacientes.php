<?php
class Doctores_Agregar_Paciente
{

    public function AgregarPacientes($conexionDB,$curp,$nombre,$apellidoP,$apellidoM,$fechaNacimiento,$contraseña,$correo,$telefono,$tipoSangre,$fechaUM,$ocupacion
    ,$direccion,$factorRiesgo,$cedula)
    {

        $consultaAgregarPacientes=$conexionDB->prepare("INSERT INTO PACIENTES  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $consultaAgregarPacientes->bind_param("ssssssssssssss",$curp,$nombre,$apellidoP,$apellidoM,$fechaNacimiento,$contraseña,$correo,$telefono,$tipoSangre,$fechaUM,$ocupacion,$direccion,$factorRiesgo,$cedula);
     
        $consultaAgregarPacientes->execute();
     
        if ($consultaAgregarPacientes->affected_rows > 0) {
            return true ;
        } else {
            return false; 
        }
    }

}


?>