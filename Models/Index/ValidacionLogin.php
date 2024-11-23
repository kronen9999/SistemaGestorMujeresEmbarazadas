<?php


 class ValidacionUsuario {
    public function ConsultaDb($tipoLogin, $usuarioop1, $usuarioop2, $contraseña,$consultadb) {
        
        if ($tipoLogin == "Administrador") {
            $consultaString = "SELECT * FROM JURISDICCION WHERE (NoTrabajador = ? OR CorreoElectronico = ?) AND Contraseña = ?";
        } else if ($tipoLogin == "Doctor") {
            $consultaString = "SELECT * FROM MEDICOS WHERE (Cedula = ? OR CorreoElectronico = ?) AND Contraseña = ?";
        } else if ($tipoLogin == "Paciente") {
            $consultaString = "SELECT * FROM PACIENTES WHERE (CurpPaciente = ? OR CorreoElectronico = ?) AND Contraseña = ?";
        }

       
        if ($consultaValidacion = $consultadb->prepare($consultaString)) {

            
            $consultaValidacion->bind_param("sss", $usuarioop1, $usuarioop2, $contraseña);

            
            $consultaValidacion->execute();

            
            $resultado = $consultaValidacion->get_result();

            
            if ($resultado->num_rows > 0) {
             return "true";
            } else {
                
                return "false";
            }
        } else {
            
        return "false";
        }
    }
}


?>
