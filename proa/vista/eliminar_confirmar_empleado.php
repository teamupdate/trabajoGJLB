<?php
require_once "../conexion.php";
if (!empty($_POST))
{ 
$Id = $_POST['Id'];
// echo $Id;
// exit;

$query_delete = mysqli_query($conexion, "DELETE FROM empleados WHERE Id=$Id ");
// mysqli_close($conexion);
if($query_delete){
	header("location: vista/lista_empleados.php");
} else {
	echo "Error al eliminar";
}
}

$Id = $_REQUEST['Id'];

$query = mysqli_query($conexion, "SELECT empleados.Nombre FROM empleados WHERE Id = $Id");
$result = mysqli_num_rows($query);

if ($result >0){
while ($data=mysqli_fetch_array($query)){

$nombre = $data['Nombre'];

} 
} else {
		header("location: listaEmpleados.php");
}

?> 

<!DOCTYPE html>
<link rel="stylesheet" href="../Css/style.css" type="text/css">
<html lang="en">
<head>
	<meta charset="UTF-8">
<!-- <?php include "includes/scripts.php" ?> -->

<link rel="stylesheet" href="../css/estilos.css" type="text/css">
	<title>Eliminar empleado</title>
</head>
<body>
<!-- <?php include "includes/header.php" ?> -->
	<section id="container">
		<div class="data_delete">
<h2>¿Esta seguro que desea borrar el siguiente registro?</h2>
<p>Descripcion: <span><?php echo $nombre; ?></span></p>

<form method="POST" action="">
<input type="hidden" name="Id" value="<?php echo $Id; ?>">
<a href="listaEmpleados.php" class="btn_cancel">Cancelar</a>
<input type="submit" value="Aceptar" class="btn_ok">
</form>


		</div>
	</section>
	

</body>
</html>