<?php


class AgregarClinicas{

    public function AgregacionClinicas ($conexionDb,$idResponsable,$idClinica,$nombreClinica,$localidadClinica,$direccionClinica)
    {
    $consultaSQl= $conexionDb->prepare("INSERT INTO CLINICAS VALUES (?,?,?,?,?)");
    $consultaSQl->bind_param("isssi",$idClinica,$nombreClinica,$localidadClinica,$direccionClinica,$idResponsable);
    $consultaSQl->execute();


    if ($consultaSQl->affected_rows > 0) {
        return "true"; 
    } else {
        return "false"; 
    }


}

}


?>