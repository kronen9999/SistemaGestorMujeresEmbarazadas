<?php

class InformacionPerfil
{

public function ObtenerInfoPerfil($conexiondb,$idResponsable)
{

    $consultaSQl=$conexiondb->prepare("SELECT * FROM JURISDICCION WHERE IdResponsable= ?");
    $consultaSQl->bind_param("i",$idResponsable);
    $consultaSQl->execute();

    $resultadoConsulta=$consultaSQl->get_result();

    $filaResultado=$resultadoConsulta->fetch_assoc();

    return $filaResultado;

}

}

?>