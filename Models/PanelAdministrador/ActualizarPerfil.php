<?php
class ActualizarPerfilAdmin {
    public function ActualizarPerfil($conexiondb, $idResponsable, $nombre, $apellidoP, $apellidoM, $noTrabajador, $telefono, $correo) {
        
        $consultaActualizar = $conexiondb->prepare("UPDATE JURISDICCION SET Nombre=?, ApellidoPaterno=?, ApellidoMaterno=?, NoTrabajador=?, Telefono=?, CorreoElectronico=? WHERE IdResponsable=?");

       
        $consultaActualizar->bind_param("ssssssi", $nombre, $apellidoP, $apellidoM, $noTrabajador, $telefono, $correo, $idResponsable);

        $consultaActualizar->execute();
     
            
            if ($consultaActualizar->affected_rows > 0) {
                return "true"; 
            } else {
                return "false"; 
            }
        
    }
}
?>
