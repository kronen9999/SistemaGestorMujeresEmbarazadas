<?php

class EdicionClinicas{

    public function editarclinicas ($conexionDb,$idResponsable,$idClinica,$nombreClinica,$localidadClinica,$direccionClinica)
    {
    $consultaSQl= $conexionDb->prepare("UPDATE CLINICAS SET NombreClinica=?, Localidad=?, Direccion=? Where IdResponsable=? and IdClinica=?");
    $consultaSQl->bind_param("sssii",$nombreClinica,$localidadClinica,$direccionClinica,$idResponsable,$idClinica);
    $consultaSQl->execute();


    if ($consultaSQl->affected_rows > 0) {
        return "true"; 
    } else {
        return "false"; 
    }


}

}


?>