<?php
class Doctores_Mostrar_Citas_Paciente
{

    public function MostrarCitasPaciente($conexionDB,$curp)
    {

        $consultaMostarCitas=$conexionDB->prepare("SELECT * FROM Citas WHERE CurpPaciente=?");

        $consultaMostarCitas->bind_param("s",$curp);
     
        $consultaMostarCitas->execute();

        $resultadoConsultaMC=$consultaMostarCitas->get_result();
        $htmlagregar="";

        $html=" <p titulo='Doctor_PacienteCitasRegistradas'>Citas registradas</p>
    <p titulo='Doctor_PacienteExpedienteCitas'>Expediente de la cita</p>
    <div class='Doctor_ContenedorCitas_Paciente'>
    <div class='Doctor_ContenedorCitas_Paciente_SelectorCitas'>";
    

        while ($fila=$resultadoConsultaMC->fetch_assoc())
        {
            $idCita=$fila["IdCita"];
            $fechaCita=$fila["FechaCita"];
            $horaCita=$fila["HoraCita"];

   $htmlagregar.="
         <div class='Doctor_ContenedorCitas_Paciente_SelectorCitas_Cita' selectorCitaId='$idCita'>
         <p idCitaSelector>idCita: $idCita</p>
         <p>Fecha:$fechaCita  Hora:$horaCita</p>
         </div>";
        }
        $html.=$htmlagregar;
        $html.=" </div>
    <div class='Doctor_ContenedorCitas_Paciente_InformacionExpediente'>    
    </div>
    </div>";
     
    return $html;
        
    }

}


?>