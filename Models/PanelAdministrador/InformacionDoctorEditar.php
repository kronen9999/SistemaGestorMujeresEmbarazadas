<?php
   
   class InformacionDoctor{

    public function recuperarInformacionDoctor($conexionDB,$CedulaDoctor,$idResponsable,$nombreDoctor,$apellidoPDoctor,
    $apellidoMDoctor,$TelefonoMovil,$TelefonoOficina,$CorreoElectronico,$Generodoctor)
    {

        $consulta=$conexionDB->prepare("Update select_Administrador_Doctores set Nombre=? ,ApellidoPaterno=? ,ApellidoMaterno=? ,
TelefonoMovil=? ,TelefonoOficina=? , CorreoElectronico=? ,Genero=?where Cedula=? and IdResponsable=?;");

$consulta->bind_param("ssssssssi",$nombreDoctor,$apellidoPDoctor,$apellidoMDoctor,$TelefonoMovil,$TelefonoOficina,$CorreoElectronico,$Generodoctor,$CedulaDoctor,$idResponsable);
    
$consulta->execute();

if ($consulta->affected_rows > 0) {
    return "true"; 
} else {
    return "false"; 
}

}

   }


?>