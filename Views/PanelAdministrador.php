<!DOCTYPE html>
<html>
   <?php
session_start();
$idSesion=isset($_SESSION["IdResponsable"])?$_SESSION["IdResponsable"]:null;
session_write_close();
if (!$idSesion)
        {
         echo "Debe iniciar sesion para poder continuar";
         exit;
        }
   ?>
    <head>
        <title>PanelAdministrador</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../Public/Css/PanelAdministrador/PanelAdministrador.css">
    </head>
    <body>
        
        <header class="cabezera">
            <p Apartado="titulo">Informacion del perfil</p>
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
        <a href="../index.php">
          <div class="botonMenu" botonSeleccionado="false" >
        <img src="../Public/Assets/Icono_CerrarSesion.png" alt="IconoApartado" botonSeleccionado="false">
        </div>
        </a>
       
        </div>
        <div class="Menu_Dinamico" TipoMenu="Informacion_Administrador">
        <?php
        include ("../Models/PanelAdministrador/InfoPerfil.php");
        include("../config.php");
        

        

        if (!$idSesion)
        {
         echo "Debe iniciar sesion para poder continuar";
         exit;
        }

        $objPerfil= new InformacionPerfil();
        
        
        $htmlObtener=$objPerfil->ObtenerInfoPerfil($conexiondb,$idSesion);
         

   echo $htmlObtener;
            
        ?>
            
        </div>

                
<script src="../Controllers/Ajax/PanelAdministrador/InfoAdmin/PerfilAdministradorRec.js" defer></script>
<script src="../Controllers/Ajax/PanelAdministrador/MenuLateral/MenuLateral.js" defer></script> 
    </body>

</html>