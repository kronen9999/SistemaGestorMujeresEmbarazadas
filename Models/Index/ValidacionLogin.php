<?php


 class ValidacionUsuario {
    public function ConsultaDb($tipoLogin, $usuarioop1, $usuarioop2, $contraseña,$consultadb) {
        
        if ($tipoLogin == "Administrador") {
            $consultaString = "SELECT * FROM ADMINISTRADORES WHERE NoTrabajador = ? OR CorreoElectronico = ? AND Contraseña = ?";
        } else if ($tipoLogin == "Doctor") {
            $consultaString = "SELECT * FROM DOCTORES WHERE Cedula = ? OR CorreoElectronico = ? AND Contraseña = ?";
        } else if ($tipoLogin == "Paciente") {
            $consultaString = "SELECT * FROM PACIENTES WHERE CurpPaciente = ? OR CorreoElectronico = ? AND Contraseña = ?";
        }

       
        if ($consultaValidacion = $consultadb->prepare($consultaString)) {

            
            $consultaValidacion->bind_param("sss", $usuarioop1, $usuarioop2, $contraseña);

            
            $consultaValidacion->execute();

            
            $resultado = $consultaValidacion->get_result();

            
            if ($resultado->num_rows > 0) {
             return "Se encontro el registro";
            } else {
                
                return "No se encontraron registros";
            }
        } else {
            
        return "No se encontraron registros";
        }
    }
}


?>
