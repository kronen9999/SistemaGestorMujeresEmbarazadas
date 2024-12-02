<?php

class InformacionPerfil
{

public function ObtenerInfoPerfil($conexiondb,$idResponsable)
{

    $consultaSQl=$conexiondb->prepare("SELECT * FROM JURISDICCION WHERE IdResponsable= ?");
    $consultaSQl->bind_param("i",$idResponsable);
    $consultaSQl->execute();

    $resultadoConsulta=$consultaSQl->get_result();

    $filaResultado=$resultadoConsulta->fetch_assoc();

    $nombre=$filaResultado["Nombre"];
         $apellidoPaterno=$filaResultado["ApellidoPaterno"];
         $apellidoMaterno=$filaResultado["ApellidoMaterno"];
         $numeroTrabajador=$filaResultado["NoTrabajador"];
         $telefono=$filaResultado["Telefono"];
         $contraseña=$filaResultado["Contraseña"];
         $correoElectronico=$filaResultado["CorreoElectronico"];

$htmlDinamico="<div class='Menu_Dinamico_AdministrarPerfil_SubApartado1'>
<div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_DivImg'>
   <img src='../Public/Assets/Icono_Administrador_Perfil.png' alt='IconoAdmin'> 
</div>
<div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1'>
    <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
      <p>
         Nombre:
      </p>
      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
      <input type='text'  class='input_Nombre' placeholder='Ingrese su nombre' id='Perfil_Nombre' value='$nombre' InfoPerfilInput='nombre'>  
      </div> 
      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
      <p>
         Apellido paterno:
      </p>
      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
      <input type='text'  class='input_Nombre' placeholder='Ingrese su apellido paterno' id='Perfil_ApellidoPaterno' value='$apellidoPaterno' InfoPerfilInput='apellidoP'>  
      
      </div>
    </div>
    <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
      <p>
         Apellido Materno:
      </p>
      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
      <input type='text'  class='input_Nombre' placeholder='Ingrese su apellido materno' id='Perfil_ApellidoMaterno' value='$apellidoMaterno' InfoPerfilInput='apellidoM'>  
      
      </div>
</div>
</div>

</div>
</div>
<div class='Menu_Dinamico_AdministrarPerfil_SubApartado2'>
<div class='Menu_Dinamico_AdministrarPerfil_SubApartado2_Div1'>
<div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
      <p>
         Numero trabajador:
      </p>
      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
      <input type='text' class='input_Nombre' placeholder='Ingrese su numero de trabajador' id='Perfil_Notrabajador' value='$numeroTrabajador' InfoPerfilInput='noTrabajador'>

      
      </div> 
      </div>
      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
      <p>
         Telefono:
      </p>
      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
      <input type='text'  class='input_Nombre' placeholder='Ingrese su Telefono' id='Perfil_Telefono' value='$telefono' InfoPerfilInput='telefono'>  
      
      </div> 
      </div>
</div>
<div class='Menu_Dinamico_AdministrarPerfil_SubApartado2_Div2'>
<div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
      <p>
         Contraseña:(Requiere autenticacion)
      </p>
      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
      <input type='password'  class='input_Nombre' placeholder='Ingrese su contraseña' id='Perfil_Contraseña' value='$contraseña'>  
      <img src='../Public/Assets/Icono_Editar.png' alt='IconoEditarImputs'>
      </div> 
      </div>
      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
      <p>
         Correo Electronico:
      </p>
      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
      <input type='text'  class='input_Nombre' placeholder='Ingrese su Correo electronico' id='Perfil_Correo_Electronico' value='$correoElectronico' InfoPerfilInput='correoE'>  
     
      </div> 
      </div>
</div>
</div>

<div class='Menu_Dinamico_AdministrarPerfil_SubApartadoSubmit'>
<button class='Menu_Dinamico_AdministrarPerfil_SubApartadoSubmit_button' referencia='InfoPerfil_BotonSubmit'>Guardar cambios</button>
<div> ";

    return $htmlDinamico;

}

}

?>