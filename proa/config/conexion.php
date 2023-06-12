<?php 
$host = 'localhost';
$user = 'root';
$password = '';
$db='proa';

$conexion =  @mysqli_connect($host,$user,$password,$db);

if (!$conexion) {
echo "error en la conexion";
} else{
    echo "conexion exitosa";
}

?>