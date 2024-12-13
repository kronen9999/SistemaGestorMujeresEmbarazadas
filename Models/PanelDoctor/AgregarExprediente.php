<?php
class Doctores_Agregar_Cita_Expediente
{

    public function AgregarExpediente($conexionDB,$pesoMaterno,$presion,$fCFetal,$alturaUterina,$movimientosFetales,$posicionFetal,
    $evaluacionEdemas,$factorRiesgo,$idCita)
    {



        $consultaExpediente=$conexionDB->prepare("INSERT INTO Expedientes (PesoMaterno,PresionArterial,FrecuenciaCardicaFetal,AlturaUterina,
        MovimientosFetales,PosicionFetal,EvaluacionEdemas,FactorRiesgo,IdCita) VALUES (?,?,?,?,?,?,?,?,?)");

        $consultaExpediente->bind_param("dsisssssi",$pesoMaterno,$presion,$fCFetal,$alturaUterina,$movimientosFetales,$posicionFetal,$evaluacionEdemas,$factorRiesgo,$idCita);
     
        $consultaExpediente->execute();

      
       
     
        if ( $consultaExpediente->affected_rows > 0) {
            return true ;
        } else {
            return false; 
        }
    }

}


?>