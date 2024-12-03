<?php

class MostrarClinicas
{

    public function RecibirClinicas($conexionDb,$idResponsable)
    {
   $consulta=$conexionDb->prepare("SELECT * FROM CLINICAS WHERE IdResponsable = ?");

   $consulta->bind_param("i",$idResponsable);

   $consulta->execute();

   $resultadoConsulta=$consulta->get_result();

   $htmlDevolver="
   
   <div class='Administrador_PanelClinicas_Descripcion'>
   <p>Registro de clinicas</p><div class='Administrador_PanelClinicas_Busqueda'>
   <div class='Administrador_PanelClinicas_Busqueda_inputimg'>
   <input type='text' placeholder='Buscar clinica'>
   <img src='../Public/Assets/IconoBusqueda.png'>
   </div>
   </div>
   </div>
   <div class='Administrador_PanelClinicas'>";

   $htmlDevolver.="<div class='div_Clinica' tipo='Agregar'>
<img src='../Public/Assets/IconoAgregar.png'>
<p>Agregar clinica</p>
</div>";
   while($filaConsulta=$resultadoConsulta->fetch_assoc())
   {
    $idClinica=$filaConsulta["IdClinica"];
    $nombreClinica=$filaConsulta["NombreClinica"];
    $localidadClinica=$filaConsulta["Localidad"];
    $direccionClinica=$filaConsulta["Direccion"];
    $htmlDevolver.="<div class='div_Clinica' tipo='Seleccionable' idClinica='$idClinica' nombreClinica='$nombreClinica' localidadClinica='$localidadClinica' direccionClinica='$direccionClinica'>
<img src='../Public/Assets/IconoClinicaOscuro.png'>
<p>Id de la clinica:</p>
<p>$idClinica</p>
<p>Nombre Clinica:</p>
<p>$nombreClinica</p>
</div>";
   }

   $htmlDevolver.="</div>";


   return $htmlDevolver;


    }
}


?>