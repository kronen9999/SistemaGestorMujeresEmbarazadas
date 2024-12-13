<?php
class Doctores_Actualizar_Cita_Paciente_Desenlace
{

    public function ActualizarUsuario($conexionDB,$factorRiesgo,$curp)
    {
      
       
        
            $consultaActPac=$conexionDB->prepare("UPDATE PACIENTES SET FactorRiesgo=? WHERE CurpPaciente=?");
    
            $registoPac="";
            if ($factorRiesgo=="0")
            {
             $registoPac="Sin riesgo";
            }
            else if ($factorRiesgo=="1")
            {
                $registoPac="En riesgo";
            }
            $consultaActPac->bind_param("ss",$registoPac,$curp);
         
            $consultaActPac->execute();
        
    
        
    }

}


?>