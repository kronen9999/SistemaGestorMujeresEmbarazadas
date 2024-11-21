<?php
$host="localhost";
$user="root";
$password="";
$db="GESTOREMBARAZADAS";

$conexiondb=mysqli_connect($host,$user,$password,$db);

if ($conexiondb)
{
//echo "Se ha conectado a la base de datos";
}
else {
   // echo "No se ha podido conectar a la base de datos";
}
?>