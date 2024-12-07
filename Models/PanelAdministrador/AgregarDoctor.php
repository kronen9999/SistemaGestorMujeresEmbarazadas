<?php


class AgregarDoctores{

    public function AgregacionDoctores ($conexionDb,$cedula,$nombre,$apellidoP,$apellidoM,$telefonoM,$telefonoO,$contraseña,$correoE,$Especialidad,$genero,$idClinica)
    {
    $consultaSQl= $conexionDb->prepare("INSERT INTO MEDICOS VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $consultaSQl->bind_param("ssssssssssi",$cedula,$nombre,$apellidoP,$apellidoM,$telefonoM,$telefonoO,$contraseña,$correoE,$Especialidad,$genero,$idClinica);
    $consultaSQl->execute();


    if ($consultaSQl->affected_rows > 0) {
        return true ;
    } else {
        return false; 
    }


}

}


?>