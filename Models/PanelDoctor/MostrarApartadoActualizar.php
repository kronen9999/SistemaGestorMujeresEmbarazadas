<?php

class Doctor_MostrarPacientesActualizar{

    public function doctorRecuperarActpacientes ($conexionDB,$curp){

        $consultaPacientes=$conexionDB->prepare("SELECT * FROM PACIENTES WHERE CurpPaciente=?");

        $consultaPacientes->bind_param("s",$curp);
     
        $consultaPacientes->execute();
     
        $resultadoConsultaPacientes=$consultaPacientes->get_result();
        $html="";

        while ($fila=$resultadoConsultaPacientes->fetch_assoc())
        {
        $curpPaciente=$curp;
        $nombre=$fila["Nombre"];
        $apellidoP=$fila["ApellidoPaterno"];
        $apellidoM=$fila["ApellidoMaterno"];
        $fechaN=$fila["FechaNacimiento"];
        $correo=$fila["CorreoElectronico"];
        $telefono=$fila["Telefono"];
        $tipoS=$fila["TipoSangre"];
        $fechaUM=$fila["FechaUltimaMenstruacion"];
        $ocupacion=$fila["Ocupacion"];
        $direccion=$fila["Direccion"];

        $html.="<div class='Doctores_AgregarPaciente_Apartado1'>
    <div class='Doctores_AgregarPaciente_Apartado1_divImg'><img src='../Public/Assets/InicioSesion_Pacientes_IconoPaciente.png' desc='Doctores_EditarP_IconoP'></div>
    <p>Actualizar informacion del paciente</p>
    </div>
    <div class='Doctores_AgregarPaciente_Apartado2'> 
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p valorCurp='$curpPaciente'>Curp: $curpPaciente</p>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Nombre:</p>
   <input type='text' placeholder='Ingrese el nombre de su paciente' id='ActualizarPacienteNombre' value='$nombre'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Apellido paterno:</p>
   <input type='text' placeholder='Ingrese el apellido paterno de su paciente' id='ActualizarPacienteApellidoP' value='$apellidoP'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Apellido materno:</p>
   <input type='text' placeholder='Ingrese el apellido materno de su paciente' id='ActualizarPacienteApellidoM' value='$apellidoM'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Fecha Nacimiento:</p>
   <input type='text' placeholder='Ingrese la fecha de nacimiento de su paciente' id='ActualizarPacienteFechaN' value='$fechaN'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>CorreoElectronico:</p>
   <input type='text' placeholder='Ingrese el correo electronico de su paciente' id='ActualizarPacienteCorreo' value='$correo'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Telefono:</p>
   <input type='text' placeholder='Ingrese el telefono de su paciente' id='ActualizarPacienteTelefono' value='$telefono'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Tipo de sangre:</p>
   <input type='text' placeholder='Ingrese el tipo de sangre de su paciente' id='ActualizarPacienteTipoSangre' value='$tipoS'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Fecha de la ultima mestruacion:</p>
   <input type='text' placeholder='Ingrese la fecha de ultima menstruacion de su paciente' id='ActualizarPacienteFechaUM' value='$fechaUM'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Ocupacion:</p>
   <input type='text' placeholder='Ingrese la ocupacion de su paciente' id='ActualizarPacienteOcupacion' value='$ocupacion'>
   </div>
   <div class='Doctores_AgregarPaciente_Apartado2_entrada'> 
   <p>Direccion:</p>
   <input type='text' placeholder='Ingrese la direcion del paciente' id='ActualizarPacienteDireccion' value='$direccion'>
   </div>
    </div>
    <div class='Doctores_AgregarPaciente_Apartado3'>
    <button botontipo='GuardarCambiosPaciente'>Actualizar campos</button>
    <button botontipo='CancelarCambiosPaciente'>Cancelar cambios</button>
    </div>
    ";
        

        ;


    
        }
    return $html;
    }
    

}


?>