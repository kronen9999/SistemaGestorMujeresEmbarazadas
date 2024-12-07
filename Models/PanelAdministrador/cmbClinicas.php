<?php

class cmbClinicasRegresar{

    public function datosCmbClinicas($conexiondb,$idResponsable)
    {
      $consulta=$conexiondb->prepare("SELECT C.IdClinica,C.NombreClinica from CLINICAS as C WHERE IdResponsable=?");

      $consulta->bind_param("i",$idResponsable);

      $consulta->execute();

      $resultadoConsulta=$consulta->get_result();

      $componenteDevolver="";
    while ($fila=$resultadoConsulta->fetch_assoc())
    {
    $idClinica=$fila["IdClinica"];
    $nombreClinica=$fila["NombreClinica"];
 
    $componenteDevolver.="<option value='$idClinica'>Nombre:$nombreClinica Id:$idClinica</option>";
    } 

      $componenteDevolver.="";

      return $componenteDevolver;

    }
}




?>