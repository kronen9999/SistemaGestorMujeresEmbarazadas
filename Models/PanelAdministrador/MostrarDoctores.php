<?php

class MostrarDoctores
{

public function MuestreoDoctores($conexionDB,$idResponsable)
{
     $consulta=$conexionDB->prepare("SELECT  * FROM select_Administrador_Doctores WHERE idResponsable= ? ");
     $consulta->bind_param("i",$idResponsable);
     $consulta->execute();

     $resultadoConsulta=$consulta->get_result();

     $htmlRetornar="<div class='Administrador_PanelDoctor_Descripcion'>
   <p>Registro de Doctores</p><div class='Administrador_PanelDoctor_Busqueda'>
   <div class='Administrador_PanelDoctor_Busqueda_inputimg'>
   <input type='text' placeholder='Buscar doctor'>
   <img src='../Public/Assets/IconoBusqueda.png'>
   </div>
   </div>
   </div>
   <div class='Administrador_PanelDoctor_ContenedorDoctores'>
    <div class='Administrador_PanelDoctor_ContenedorDoctores_Agregar' tipoOpcionDoctor='Agregar'>
   <img src='../Public/Assets/IconoAgregar.png'>
   <p>Agregar doctor</p>
   </div>";

     while ($fila=$resultadoConsulta->fetch_assoc())
     {
        $cedula=$fila["Cedula"];
        $nombre=$fila["Nombre"];
        $apellidoP=$fila["ApellidoPaterno"];
        $apellidoM=$fila["ApellidoMaterno"];
        $idClinica=$fila["IdClinica"];
        $nombreClinica=$fila["NombreClinica"];
        $genero=$fila["Genero"];

        $htmlRetornar.="<div class='Administrador_PanelDoctor_ContenedorDoctores_Doctor' cedulaDoc='$cedula' nombreDoc='$nombre' idClinica='$idClinica' genero='$genero'   tipoOpcionDoctor='Seleccionar'>";
   if ($genero=="Masculino")
   {
$htmlRetornar.="<img src='../Public/Assets/Icono_Doctor_M.png' alt='iconoDoctor'>";
   }
   else if ($genero=="Femenino")
   {
    $htmlRetornar.="<img src='../Public/Assets/Icono_Doctora_F.png' alt='iconoDoctor'>";
   }
   $htmlRetornar.="<p tipoP='descripcion'>Cedula:</p>
   <p tipoP='contenido'>$cedula</p>
   <p tipoP='descripcion'>Nombre:</p>
   <p tipoP='contenido'>$nombre $apellidoP $apellidoM</p>
   <p tipoP='descripcion'>Clinica:</p>
   <p tipoP='contenido'>$nombreClinica</p>
   </div>";

     }
     $htmlRetornar.="<div>";

     return $htmlRetornar;
}

}




?>