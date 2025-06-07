<?php
$host="194.195.84.1";
$user="u356678976_SGME22";
$password="@SiGeMuEm22";
$db="u356678976_SGME";

$conexiondb=mysqli_connect($host,$user,$password,$db);

if ($conexiondb)
{
//echo "Se ha conectado a la base de datos";
}
else {
   // echo "No se ha podido conectar a la base de datos";
}
?>