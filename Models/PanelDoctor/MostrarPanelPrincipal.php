<?php

class PanelPrincipalDoctor
{

    public function retornarPanelPrincipal($conexionDB,$cedula,$fechaHoy)
    {

        $consultaNumPacientes=$conexionDB->prepare("select P.CurpPaciente from PACIENTES as P inner join MEDICOS as M on P.Cedula=M.Cedula WHERE M.Cedula=?");

   $consultaNumPacientes->bind_param("s",$cedula);

   $consultaNumPacientes->execute();

   $resultadoConsultaPacientes=$consultaNumPacientes->get_result();

   $numPacientes="".$resultadoConsultaPacientes->num_rows;

   $consultaNumCitas=$conexionDB->prepare("select P.Nombre,P.Apellidopaterno,P.ApellidoMaterno,HOUR(C.HoraCita) as HoraCita from PACIENTES as P inner join MEDICOS as M on P.Cedula=M.Cedula inner join CITAS as C on C.CurpPaciente=P.CurpPaciente WHERE M.Cedula=? and C.FechaCita=? order by C.HoraCita");

   $consultaNumCitas->bind_param("ss",$cedula,$fechaHoy);

   $consultaNumCitas->execute();

   $resultadoConsultaCitas=$consultaNumCitas->get_result();


   $numCitas="".$resultadoConsultaCitas->num_rows;
   $objAgregar="";

   if ($numCitas=="0")
   {
    $objAgregar="<p class='MensajeNoCitas'>No se tienen citas registradas para el dia de hoy<p>";
   }
   else {
    while ($fila=$resultadoConsultaCitas->fetch_assoc())
    {
    $nombre=$fila["Nombre"];
    $apellidoP=$fila["Apellidopaterno"];
    $apellidoM=$fila["ApellidoMaterno"];
    $HoraCita=$fila["HoraCita"];

    $objAgregar.="<div class='Menu_Dinamico_Doctores_PanelPrincipal_SubApartado2_PacienteContenedor'>
    <img src='../Public/Assets/InicioSesion_Pacientes_IconoPaciente.png' alt='IconoPaciente'>
      <p>Paciente:</p>
      <p>$nombre $apellidoP $apellidoM</p>
      <p>Hora de la cita:</p>
      <p>$HoraCita:00</p>
   </div>";
    }
   }

  $html="<div class='Menu_Dinamico_Doctores_PanelPrincipal_SubApartado1'>
        <div id='Calendario'>
        </div>
        <div class='Menu_Dinamico_Doctores_PanelPrincipal_SubApartado1_Subapartado1'>
        <div class='Menu_Dinamico_Doctores_PanelPrincipal_SubApartado1_Subapartado1_ContenedorInfo'>
        <p>Sus pacientes registrados</p>
        <p numPacientes='Doctor'>$numPacientes</p>
        <button class='Menu_Dinamico_Doctores_PanelPrincipal_SubApartado1_Subapartado1_ContenedorInfo_AdministrarPacientes' bottonTipo='DoctoresAdministrarPacientes'>Administrar Pacientes</button>
        </div>
        <div class='Menu_Dinamico_Doctores_PanelPrincipal_SubApartado1_Subapartado1_ContenedorInfo'>
               <p>Total de citas programadas del dia de hoy $fechaHoy:</p>
               <p>$numCitas</p>
        </div>
        </div >
        </div>
        <div class='Menu_Dinamico_Doctores_PanelPrincipal_SubApartado2'>";

        $html.="
        $objAgregar
   
        </div>";


        return $html;
    }
}

    

    

?>