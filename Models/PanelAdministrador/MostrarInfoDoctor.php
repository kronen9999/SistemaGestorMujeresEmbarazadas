<?php

class mostrarInfoDoctor
{

    public function devolverInfo($conexionDB,$cedula,$idResponsable)
    {

        $consulta=$conexionDB->prepare("select  * from select_Administrador_Doctores where Cedula=? and IdResponsable=?");

        $consulta->bind_param("si",$cedula,$idResponsable);

        $consulta->execute();

        $resultadoConsulta=$consulta->get_result();

        $htmldevolver="<div class='SubContenedorEditarDoctor1'>";

        while($fila=$resultadoConsulta->fetch_assoc())
        {
         $cedulaDoc=$fila["Cedula"];
         $nombreDoc=$fila["Nombre"];
         $apellidoP=$fila["ApellidoPaterno"];
         $apellidoM=$fila["ApellidoMaterno"];
         $telefonoM=$fila["TelefonoMovil"];
         $telefonoO=$fila["TelefonoOficina"];
         $Contraseña=$fila["Contraseña"];
         $correoE=$fila["CorreoElectronico"];
         $genero=$fila["Genero"];

         $htmldevolver.="<div class='SubContenedorEditarDoctor1_divImg'>";

         if ($genero=="Femenino")
         {
            $htmldevolver.="<img src='../Public/Assets/Icono_Doctora_F.png'>";
         }
         else if ($genero=="Masculino")
         {
            $htmldevolver.="<img src='../Public/Assets/Icono_Doctor_M.png'>";
         }
$htmldevolver.="
</div>
<div class='SubContenedorEditarDoctor1_1'>
<div class='DoctorInput_text'>
<p>Nombre:</p>
<input type='text' adminDoctorCampo='nombre' value='$nombreDoc'>
</div>
<div class='DoctorInput_text'>
<p>Apellido paterno:</p>
<input type='text' adminDoctorCampo='apellidoP' value='$apellidoP'>
</div>
<div class='DoctorInput_text'>
<p>Apellido materno:</p>
<input type='text' adminDoctorCampo='apellidoM' value='$apellidoM'>
</div>
</div>
</div>
<div class='SubContenedorEditarDoctor2'>
<div class='SubContenedorEditarDoctor2_1'>
<div class='DoctorInput_text'>
<p>Cedula:</p>
<input type='text' adminDoctorCampo='cedula' value='$cedulaDoc'>
</div>
<div class='DoctorInput_text' >
<p>Telefono movil:</p>
<input type='text' adminDoctorCampo='telefonoM' value='$telefonoM'>
</div>
<div class='DoctorInput_text'>
<p>Correo electronico:</p>
<input type='text' adminDoctorCampo='correoE' value='$correoE'>
</div>
</div>

<div class='SubContenedorEditarDoctor2_1'>
<div class='SubContenedorEditarDoctor2_1_cmbox'>
<p>Genero:</p>
<select class='SubContenedorEditarDoctor2_1_select' adminDoctorCampo='genero' >";
if ($genero=="Femenino")
{
    $htmldevolver.="<option value='Masculino'>
    Masculino
    </option>
    <option value='Femenino' selected>
    Femenino
    </option>";
}
else if ($genero=="Masculino")
{
    $htmldevolver.="<option value='Masculino' selected>
    Masculino
    </option>
    <option value='Femenino'>
    Femenino
    </option>";
}
$htmldevolver.="
</select>

</div>

<div class='DoctorInput_text'>
<p>Telefono oficina:</p>
<input type='text' adminDoctorCampo='telefonoO' value='$telefonoO'>
</div>
<div class='DoctorInput_text'>
<p>Contraseña:</p>
<div class='DoctorInput_text_input' >
<input type='password' value='$Contraseña'>
<img src='../Public/Assets/Icono_Editar.png' >
</div>
</div>
</div>
</div>";

         

        }

        $htmldevolver.="<div class='SubContenedorEditarDoctor2_1_botones'>
<button tipo='botonAceptarEditarDoctor'>Guardar cambios</button>
<button tipo='botonAceptarCancelarDoctor'>Cancelar</button>
</div>
        </div>";

        return $htmldevolver;
        

    }


}


?>
