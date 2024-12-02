<?php

class MostrarClinicas
{

    public function RecibirClinicas($conexionDb,$idResponsable)
    {
   $consulta=$conexionDb->prepare("SELECT * FROM CLINICAS WHERE IdResponsable = ?");

   $consulta->bind_param("i",$idResponsable);

   $consulta->execute();

   $resultadoConsulta=$consulta->get_result();

   $htmlDevolver="<div class='Administrador_PanelClinicas'>";
   while($filaConsulta=$resultadoConsulta->fetch_assoc())
   {
    $idClinica=$filaConsulta["IdClinica"];
    $nombreClinica=$filaConsulta["NombreClinica"];
    $htmlDevolver.="<div class='div_Clinica' tipo='Seleccionable' idClinica='$idClinica'>
<img src='../Public/Assets/IconoClinicaOscuro.png'>
<p>Nombre Clinica:</p>
<p>$nombreClinica</p>
</div>";
   }
$htmlDevolver.="<div class='div_Clinica' tipo='Agregar'>
<img src='../Public/Assets/IconoAgregar.png'>
<p>Agregar clinica</p>
</div>";
   $htmlDevolver.="</div>";


   return $htmlDevolver;


    }
}


?>