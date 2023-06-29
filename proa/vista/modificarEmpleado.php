<?php 
include '../menu/header.php';
require_once "../config/conexion.php";
?> 

<?php
if (!empty($_POST))
{
$alert='';
if (empty($_POST['Nombre']) || empty($_POST['Dni']) || empty($_POST['Direccion']) || empty($_POST['Mail']) || empty($_POST['Rol']))
{
$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
} else { 
    $id = $_POST['Id'];
    $nombre = $_POST['Nombre'];
    $dni =$_POST['Dni'];
    $direccion =$_POST['Direccion'];
    $mail = $_POST['Mail'];
    $rol = $_POST['Rol'];
    
$query = mysqli_query($conexion, "SELECT * FROM empleados WHERE (Nombre='$nombre' AND Id!='$id') OR (Mail = '$mail' AND Id!='$id')");

$result = mysqli_fetch_array($query);

if ($result > 0) {

	$alert='<p class="msg_error">El correo o el usuario ya exite.</p>';
} else {


	$query_update = mysqli_query($conexion, "UPDATE `empleados` SET `Nombre` = '$nombre', `Dni` = '$dni', `Direccion` = '$direccion', `Mail` = '$mail', `Rol` = '$rol' WHERE `empleados`.`Id` = $id");
}

If ($query_update) {
	$alert='<p class="msg_save">Empleado editado correctamente.</p>';
} else{
	$alert='<p class="msg_error">Error al editar el empleado.</p>';
}

}
}

//validar mostrar
if(empty($_GET['Id'])) 
{
header('Location: lista_empleados.php');

}
$id = $_GET['Id'];

$sql = mysqli_query($conexion,"SELECT * FROM empleados WHERE Id=$id");


$result_sql = mysqli_num_rows($sql);
// if($result_sql==0) {
// header('Location: listaEmpleados.php');
// } else{ BORRAR EN EL ARCHIVO SUBIDO
	$option ='';
	while($data=mysqli_fetch_array($sql)) {

	$id = $data['Id'];
	$nombre = $data['Nombre'];
	$dni = $data['Dni'];
    $direccion = $data['Direccion'];
    $mail = $data['Mail'];
    $rol = $data['Rol'];

	
}

//}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="../Css/style.css" type="text/css">
<html lang="en">
<head>
	<meta charset="UTF-8">
<!-- <?php include "includes/scripts.php" ?> -->
	<title>Editar Estudiante</title>

	
</head>

<body>
 <!-- <?php include "includes/header.php" ?>  -->
	<section id="container">
		<div class="form_register">
		<div>
			<a class="btn btn-success" href="listaEmpleados.php">Lista de Empleados <i class=""></i></a>
		</div>

		<h1>Editar Estudiante</h1>
	        <br>

<div class="alerta"><?php echo isset($alert) ? $alert : '';  ?></div>

<form action="" method="post" class="form-horizontal">




<input type="hidden" name="Id" value="<?php echo $id;?>">	 

<div class="form-group">
<label for="Nombre">Nombre</label>
<div class="col-sm-10">
<input class="form-control" type="text" name="Nombre" id="Nombre" placeholder="Nombre" value="<?php echo $nombre;?>">
</div>
</div>
<br>

<div class="form-group">
<label for="Dni">Dni</label>
<div class="col-sm-10">
<input class="form-control" type="text" name="Dni" id="Dni" placeholder="Dni" value="<?php echo $dni;?>">
</div>
</div>

<br>
<div class="form-group">
<label for="Direccion">Direccion</label>
<div class="col-sm-10">
<input class="form-control" type="text" name="Direccion" id="Direccion" placeholder="Direccion" value="<?php echo $direccion;?>">
</div>
</div>
<br>
<div class="form-group">
<label for="Mail">Mail</label>
<div class="col-sm-10">
<input class="form-control" type="text" name="Mail" id="Mail" placeholder="Mail" value="<?php echo $mail;?>">
</div>
</div>

<div class="form-group">
<label for="Rol">Rol</label>
<div class="col-sm-10">
<input class="form-control" type="text" name="Rol" id="Rol" placeholder="Rol" value="<?php echo $rol;?>">
</div>
</div>

<br>
<input class="btn btn-primary mb-3" type="submit" value="Editar Estudiante"> 
</form>
</div>
	</section>
	<!-- <?php include "includes/footer.php" ?> -->

</body>
</html>