<!DOCTYPE html>
<html>
    <head>
        <title>PanelAdministrador</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../Public/Css/PanelAdministrador/PanelAdministrador.css">
    </head>
    <body>
        
        <header class="cabezera">
            <p>Informacion del perfil</p>
            <img src="../Public/Assets/Administrador_InformacionPerfil_Icono.png" alt="Icono_Administrador">
        </header>
        <div class="menuLateral">
        <div class="botonMenu" botonSeleccionado="true" opcionMenu="botonPerfil">
        <img src="../Public/Assets/Icono_Administrador_Perfil.png" alt="IconoApartado">
        </div>
        <div class="botonMenu" botonSeleccionado="false" opcionMenu="botonClinicas">
        <img src="../Public/Assets/Icono_Administrador_Clinica.png" alt="IconoApartado">
        </div>
        <div class="botonMenu" botonSeleccionado="false" opcionMenu="botonDoctores">
        <img src="../Public/Assets/Icono_Administraador_Doctor.png" alt="IconoApartado">
        </div>
        <div class="botonMenu" botonSeleccionado="false" opcionMenu="botonPacientes">
        <img src="../Public/Assets/Icono_Administrador_Paciente.png" alt="IconoApartado">
        </div>
        </div>
        <div class="Menu_Dinamico" TipoMenu="Informacion_Administrador">
        <?php
        include ("../Models/PanelAdministrador/InfoPerfil.php");
        include("../config.php");
        

        session_start();
        $idSesion=isset($_SESSION["IdResponsable"])?$_SESSION["IdResponsable"]:null;
        session_write_close();

        $objPerfil= new InformacionPerfil();
        
        
        $consultaPerfil=$objPerfil->ObtenerInfoPerfil($conexiondb,$idSesion);
         $nombre=$consultaPerfil["Nombre"];
         $apellidoPaterno=$consultaPerfil["ApellidoPaterno"];
         $apellidoMaterno=$consultaPerfil["ApellidoMaterno"];
         $numeroTrabajador=$consultaPerfil["NoTrabajador"];
         $telefono=$consultaPerfil["Telefono"];
         $contraseña=$consultaPerfil["Contraseña"];
         $correoElectronico=$consultaPerfil["CorreoElectronico"];

   echo "
            <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1'>
                <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_DivImg'>
                   <img src='../Public/Assets/Icono_Administrador_Perfil.png' alt='IconoAdmin'> 
                </div>
                <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1'>
                    <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
                      <p>
                         Nombre:
                      </p>
                      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
                      <input type='text'  class='input_Nombre' placeholder='Ingrese su nombre' id='Perfil_Nombre' value='$nombre' disable'>  
                      <img src='../Public/Assets/Icono_Editar.png' alt='IconoEditarImputs'>
                      </div> 
                      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
                      <p>
                         Apellido paterno:
                      </p>
                      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
                      <input type='text'  class='input_Nombre' placeholder='Ingrese su apellido paterno' id='Perfil_ApellidoPaterno' value='$apellidoPaterno'>  
                      <img src='../Public/Assets/Icono_Editar.png' alt='IconoEditarImputs'>
                      </div>
                    </div>
                    <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
                      <p>
                         Apellido Materno:
                      </p>
                      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
                      <input type='text'  class='input_Nombre' placeholder='Ingrese su apellido materno' id='Perfil_ApellidoMaterno' value='$apellidoMaterno'>  
                      <img src='../Public/Assets/Icono_Editar.png' alt='IconoEditarImputs'>
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
                      <input type='text' class='input_Nombre' placeholder='Ingrese su numero de trabajador' id='Perfil_Notrabajador' value='$numeroTrabajador'>

                      <img src='../Public/Assets/Icono_Editar.png' alt='IconoEditarImputs'>
                      </div> 
                      </div>
                      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
                      <p>
                         Telefono:
                      </p>
                      <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput_Div'>
                      <input type='text'  class='input_Nombre' placeholder='Ingrese su Telefono' id='Perfil_Telefono' value='$telefono'>  
                      <img src='../Public/Assets/Icono_Editar.png' alt='IconoEditarImputs'>
                      </div> 
                      </div>
            </div>
            <div class='Menu_Dinamico_AdministrarPerfil_SubApartado2_Div2'>
            <div class='Menu_Dinamico_AdministrarPerfil_SubApartado1_Div_1_DivImput'>
                      <p>
                         Contraseña:
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
                      <input type='text'  class='input_Nombre' placeholder='Ingrese su Correo electronico' id='Perfil_Correo_Electronico' value='$correoElectronico'>  
                      <img src='../Public/Assets/Icono_Editar.png' alt='IconoEditarImputs'>
                      </div> 
                      </div>
            </div>
        </div>"
        ?>
            
        </div>
        

        </div>

    </body>

</html>