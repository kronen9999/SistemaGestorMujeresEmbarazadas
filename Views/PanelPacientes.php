<!DOCTYPE html>
<html>
 <?php
include ("../config.php");
session_start();
$curpPaciente=$_SESSION["CurpPaciente"];
session_write_close();

?>
    <head>
        <title>PanelPacintes</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../Public/Css/PanelPacientes/Pacientes.css">
        <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    </head>
    <body>
        <header class="cabezera">
            <p Apartado="titulo">Panel Principal</p>
            <img src="../Public/Assets/Pacientes_Icono_Perfil.png" alt="Icono_Paciente">
        </header>
        <div class="menuLateral">
        <div class="botonMenu" botonSeleccionado="true" opcionMenu="botonHome">
        <img src="../Public/Assets/IconoHome.png" alt="IconoApartado">
        </div>
        <a href="../index.php">
          <div class="botonMenu" botonSeleccionado="false" >
        <img src="../Public/Assets/Icono_CerrarSesion.png" alt="IconoApartado" botonSeleccionado="false">
        </div>
        </a>
        </div>
        <div class="Menu_Dinamico" TipoMenu="PanelPrincipalPaciente">
        <?php

$ConsutaDatosPaciente=$conexiondb->prepare("Select * FROM PACIENTES where CurpPaciente=?");
$ConsutaDatosPaciente->bind_param("s",$curpPaciente);
$ConsutaDatosPaciente->execute();

$resultado=$ConsutaDatosPaciente->get_result();

$filaDatos=$resultado->fetch_assoc();
$nombreP=$filaDatos["Nombre"];
$apellidoP=$filaDatos["ApellidoPaterno"];
$apellidoM=$filaDatos["ApellidoMaterno"];
$fechaN=$filaDatos["FechaNacimiento"];
$correoE=$filaDatos["CorreoElectronico"];
$telefono=$filaDatos["Telefono"];
$TipoSangre=$filaDatos["TipoSangre"];
$fechaUMP=$filaDatos["FechaUltimaMenstruacion"];
$ocupacion=$filaDatos["Ocupacion"];
$Direccion=$filaDatos["Direccion"];

echo "<div class='DatosPersonalesPaciente'>
<div class='DatosPersonalesPaciente_titulo'>
<p>!Hola</p><p>$nombreP</p><p> $apellidoP</p><p> $apellidoM ¡</p>
</div>

<div class='DatosPersonalesPaciente_DatosPaciente'>
<p style='font-size:22px; margin-bottom:2vh'>Datos personales</p>
<div class='DatosPersonalesPaciente_DatosPaciente_fila'>
<p style=:font-size:20px;>Curp:$curpPaciente</p>
<p style=:font-size:20px;>Fecha de nacimiento:$fechaN</p>
<p style=:font-size:20px;>CorreoElectronico:$correoE</p>
</div>

<div class='DatosPersonalesPaciente_DatosPaciente_fila'>
<p style=:font-size:20px;>Telefono:$telefono</p>
<p style=:font-size:20px;>Tipo de sangre:$TipoSangre</p>
<p style=:font-size:20px;>Fecha de ultima Menstruacion:$fechaUMP</p>
</div>

<div class='DatosPersonalesPaciente_DatosPaciente_fila'>
<p style=:font-size:20px;>Direccion:$ocupacion</p>
<p style=:font-size:20px;>Ocupacion:$Direccion</p>

</div>
</div>
</div>";

$consultaNumExpedientes=$conexiondb->prepare("select * from Citas as C right join Expedientes as E on C.IdCita= E.IdCita where CurpPaciente=?");
$consultaNumExpedientes->bind_param("s",$curpPaciente);
$consultaNumExpedientes->execute();

$numExpedientes=$consultaNumExpedientes->get_result()->num_rows;
$consultaNumExpedientes->close();

$consultaFactorRiesgo=$conexiondb->prepare("select * from Citas as C right join Expedientes as E on C.IdCita= E.IdCita where CurpPaciente=? and (FactorRiesgo='Sin factor de riesgo' or FactorRiesgo='0'); ");
$consultaFactorRiesgo->bind_param("s",$curpPaciente);
$consultaFactorRiesgo->execute();

$numFactorRiesgo=$consultaFactorRiesgo->get_result()->num_rows;
$consultaFactorRiesgo->close();


echo "<label idLbl='NumExpediente' numFilas='$numExpedientes' numRiesgo='$numFactorRiesgo'></label>";
?>
        <div class="PanelPrincipalPaciente_Grafico" id="Divgrafico_pacientes">
<script >
    document.addEventListener("DOMContentLoaded", function () {
    const numExp=document.querySelector('[idLbl="NumExpediente"]').getAttribute("numFilas");
    const numFactorSR=document.querySelector('[idLbl="NumExpediente"]').getAttribute("numRiesgo");
    const factR=numExp-numFactorSR;
    const chartDom = document.getElementById('Divgrafico_pacientes');
    const myChart = echarts.init(chartDom);

    const option = {
        backgroundColor: '#381d30',
        title: {
            text: 'Expedientes completos: '+numExp,
            left: 'center',
            top: 20,
            textStyle: {
                color: '#ccc'
            }
        },
        tooltip: {
            trigger: 'item'
        },
        visualMap: {
            show: false,
            min: 6,
            max: 1,
            inRange: {
                colorLightness: [0, 1]
            }
        },
        series: [
            {
                name: 'Acceso desde',
                type: 'pie',
                radius: '55%',
                center: ['50%', '50%'],
                data: [
                    { value: numFactorSR, name: 'Registros si riesgo' },
                    { value: factR, name: 'Resgistros con riesgo' }
                    
                    
                ].sort(function (a, b) {
                    return a.value - b.value;
                }),
                roseType: 'radius',
                label: {
                    color: '#FFFFFF'
                },
                labelLine: {
                    lineStyle: {
                        color: 'rgba(255, 255, 255, 0.3)'
                    },
                    smooth: 0.2,
                    length: 10,
                    length2: 20
                },
                itemStyle: {
                    color: '#f081cf',
                    shadowBlur: 200,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                },
                animationType: 'scale',
                animationEasing: 'elasticOut',
                animationDelay: function (idx) {
                    return Math.random() * 200;
                }
            }
        ]
    };

    myChart.setOption(option);
});

</script>
        </div>
        <div class="RegistroCitas">
            <p>Datos de la cita</p>
            <p>Expediente de la cita</p>
        </div>
<div class='Contenedor_Expedientes'>
<?php
$consultaCitasEx=$conexiondb->prepare("select * from Citas as C right join Expedientes as E on C.IdCita= E.IdCita where CurpPaciente=?");
$consultaCitasEx->bind_param("s",$curpPaciente);
$consultaCitasEx->execute();

$resultado=$consultaCitasEx->get_result();

if ($resultado->num_rows==0)
{
    echo "<p style='margin:auto auto;'>Usted no tiene ninguna cita o expediente registrado</p>";
}
else {
    while($filaCita=$resultado->fetch_assoc())
    {
     $fechaCita=$filaCita["FechaCita"];
     $horaCita=$filaCita["HoraCita"];
     $pesoMaterno=$filaCita["PesoMaterno"];
     $presionArterial=$filaCita["PresionArterial"];
     $frecuenciaCF=$filaCita["FrecuenciaCardicaFetal"];
     $alturaUterina=$filaCita["AlturaUterina"];
     $movimientosfetales=$filaCita["MovimientosFetales"];
     $posicionFetal=$filaCita["PosicionFetal"];
     $evaluacionEdemas=$filaCita["EvaluacionEdemas"];
     echo "<div class='Contenedor_Expedientes_Expedientes'>
<div class='Contenedor_Expedientes_CitaInfo'>
<p>Fecha de la cita:$fechaCita</p>
<p>Hora de la cita:$horaCita</p>
</div>
<div class='Contenedor_Expedientes_ExpedienteInfo'>
<p>Peso Materno:$pesoMaterno kg</p>
<p>Presion Arterial:$presionArterial</p>
<p>Frecuencia Cardiaca Fetal:$frecuenciaCF Lpm</p>
<p>Altura uterina:$alturaUterina cm</p>
<p>Movimientos fetales:$movimientosfetales</p>
<p>Posicion fetal:$posicionFetal</p>
<p>Evaluacion de edemas:$evaluacionEdemas</p>
</div>
</div>";

    }

}

?>

        </div>

<script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
<script src="../Controllers/Ajax/PanelPacientes/MenuLateral.js" defer></script> 
    </body>

</html>