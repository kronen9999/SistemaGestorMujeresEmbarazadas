<?php

class MostrarCitasCalendario{

    public function RecpererarCitas($conexionDb,$fecha,$cedula)
    {
        $horasRango = range(9, 14); 
        $consultaMostrarCitas= $conexionDb->prepare("SELECT HOUR(C.horaCita) AS hora, C.IdCita,C.CurpPaciente,P.Nombre,P.ApellidoPaterno,P.ApellidoMaterno FROM CITAS as C inner join PACIENTES as P on P.CurpPaciente=C.CurpPaciente 
              WHERE C.FechaCita =? and C.Cedula=?");

              $consultaMostrarCitas->bind_param("ss",$fecha,$cedula);

              $consultaMostrarCitas->execute();
              $result = $consultaMostrarCitas->get_result();
              
    $horasOcupadas = [];
    while ($row = $result->fetch_assoc()) {
        $horasOcupadas[(int)$row['hora']] = $row; 
    }

    
    $horasLibres = array_diff($horasRango, array_keys($horasOcupadas));
    $horasLibres = array_values($horasLibres); 
    
    $htmlCitas="<p pFechaCita='$fecha'>Registro de citas para la fecha: $fecha</p>
    <div class='Doctores_Fecha_ContenedorCitas'>";
    
    foreach ($horasRango as $hora) {
        if (isset($horasOcupadas[$hora])) {
        
            $detalles = $horasOcupadas[$hora];
            $htmlCitas.= "<div class='Cita_ocupada' tipoCita='SoloEdicion' > 
                    <p>Hora de la cita: {$hora}:00 No disponible  Paciente Agendado: {$detalles['Nombre']} {$detalles['ApellidoPaterno']} {$detalles['ApellidoMaterno']}</p>
                    <button CitaGestionarIdCita='{$detalles['IdCita']}' btnGestionarCita=''>Gestionar</button>
                    <button CitaGestionarIdCitaEliminar='{$detalles['IdCita']}' btnEliminarCita=''>Desagendar</button>
                  </div>";
        } else {
            
            $htmlCitas.= "<div class='Cita_Desocupada' tipoCita='RegistroDisponible'>
            <p>Hora de la cita:{$hora}:00 Se encuentra disponible para agendar una cita</p>
            <button btnAgendarCita='' fechaCita='$fecha' horaCita='{$hora}:00:00'>Agendar</button>
            </div>";
        }
    }

    $htmlCitas.="</div>";
    return $htmlCitas;
    }

}


?>