<?php
class Doctores_Eliminar_Cita_Expedientes
{

    public function EliminarCita($conexionDB,$idCita)
    {

        $consultaEliminarCitaExp=$conexionDB->prepare("DELETE FROM EXPEDIENTES WHERE IdCita=?");
        $consultaEliminarCitaExp->bind_param("i",$idCita);
        $consultaEliminarCitaExp->execute();
        $consultaEliminarCitaExp->close();

        $consultaEliminarCita=$conexionDB->prepare("DELETE FROM CITAS WHERE IdCita=?");
        $consultaEliminarCita->bind_param("i",$idCita);
        $consultaEliminarCita->execute();
       
        if($consultaEliminarCita->affected_rows!=0)
        {
            return true;
        }
        else {
            return false;
        }
     
        

    }

}


?>