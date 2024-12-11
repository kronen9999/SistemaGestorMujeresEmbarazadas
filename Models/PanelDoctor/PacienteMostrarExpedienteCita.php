<?php
class Doctores_Pacientes_Citas_MostrarExpediente
{

    public function citas_MostrarExpedientes($conexionDB,$idCita)
    {

        $consultaCitaExpediente=$conexionDB->prepare("SELECT * FROM EXPEDIENTES WHERE IdCita=? ");

        $consultaCitaExpediente->bind_param("i",$idCita);
     
        $consultaCitaExpediente->execute();

        $resultadoConsultaCitaExpediente=$consultaCitaExpediente->get_result();

        $html="";
        while ($fila=$resultadoConsultaCitaExpediente->fetch_assoc())
        {
            $cita=$idCita;
            $pesoMaterno=$fila["PesoMaterno"];
            $presionArterial=$fila["PresionArterial"];
            $frecuenciaCardiacaFetal=$fila["FrecuenciaCardicaFetal"];
            $alturaUterina=$fila["AlturaUterina"];
            $movimientosFetales=$fila["MovimientosFetales"];
            $posicionFetal=$fila["PosicionFetal"];
            $evaluacionEdemas=$fila["EvaluacionEdemas"];
            $factorRiesgo=$fila["FactorRiesgo"];

            $html.="<p class='Doctor_ContenedorCitas_Paciente_InformacionExpediente_IdExpediente'>Id del expendiente:$cita</p>
<div class='Doctor_ContenedorCitas_Paciente_InformacionExpediente_SubApartado1'>
<div class='Doctor_ContenedorCitas_Paciente_InformacionExpediente_SubApartado1_contenedorInfo'>
<p p1=''>Peso materno:</p>
<p p2=''>$pesoMaterno</p>
</div>
<div class='Doctor_ContenedorCitas_Paciente_InformacionExpediente_SubApartado1_contenedorInfo'>
<p p1=''>Presion arterial:</p>
<p p2=''>$presionArterial</p>
</div>
</div>
<div class='Doctor_ContenedorCitas_Paciente_InformacionExpediente_SubApartado1'>
<div class='Doctor_ContenedorCitas_Paciente_InformacionExpediente_SubApartado1_contenedorInfo'>
<p p1=''>Frecuencia cardiaca fetal:</p>
<p p2=''>$frecuenciaCardiacaFetal</p>
</div>
<div class='Doctor_ContenedorCitas_Paciente_InformacionExpediente_SubApartado1_contenedorInfo'>
<p p1=''>Altura uterina:</p>
<p p2=''>$alturaUterina</p>
</div>
</div>
<div class='Doctor_ContenedorCitas_Paciente_InformacionExpediente_SubApartado1'>
<div class='Doctor_ContenedorCitas_Paciente_InformacionExpediente_SubApartado1_contenedorInfo'>
<p p1=''>Movimientos fetales:</p>
<p p2=''>$movimientosFetales</p>
</div>
<div class='Doctor_ContenedorCitas_Paciente_InformacionExpediente_SubApartado1_contenedorInfo'>
<p p1=''>Pocision fetal:</p>
<p p2=''>$posicionFetal</p>
</div>
</div>
<div class='Doctor_ContenedorCitas_Paciente_InformacionExpediente_SubApartado1'>
<div class='Doctor_ContenedorCitas_Paciente_InformacionExpediente_SubApartado1_contenedorInfo'>
<p p1=''>Evaluacion de edemas:</p>
<p p2=''>$evaluacionEdemas</p>
</div>
<div class='Doctor_ContenedorCitas_Paciente_InformacionExpediente_SubApartado1_contenedorInfo'>
<p p1=''>Factor de riesgo:</p>
<p p2=''>$factorRiesgo</p>
</div>
</div>";
        }
        
        return $html;
     
    }

}


?>