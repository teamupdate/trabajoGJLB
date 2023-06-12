<?php 
require_once "../Config/Conexion.php";
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
	$alert='<p class="msg_save">Estudiante editado correctamente.</p>';
} else{
	$alert='<p class="msg_error">Error al editar el estudiante.</p>';
}

}
}


//validar mostrar
if(empty($_GET['Id'])) 
{
header('Location: lista_estudiantes.php');


}
$id = $_GET['Id'];

$sql = mysqli_query($conexion,"SELECT * FROM empleados WHERE Id=$id");


$result_sql = mysqli_num_rows($sql);
// if($result_sql==0) {
// header('Location: lista_estudiantes.php');
// } else{
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
		<h1>Editar Estudiante</h1>
	        <hr>

<div class="alerta"><?php echo isset($alert) ? $alert : '';  ?></div>
<form action="" method="post">	
<input type="hidden" name="Id" value="<?php echo $id;?>">	 



<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" id="Nombre" placeholder="Nombre" value="<?php echo $nombre;?>">

<label for="Dni">Dni</label>
<input type="text" name="Dni" id="Dni" placeholder="Dni" value="<?php echo $dni;?>">

<label for="Direccion">Direccion</label>
<input type="text" name="Direccion" id="Direccion" placeholder="Direccion" value="<?php echo $direccion;?>">

<label for="Mail">Mail</label>
<input type="text" name="Mail" id="Mail" placeholder="Mail" value="<?php echo $mail;?>">

<label for="Rol">Rol</label>
<input type="text" name="Rol" id="Rol" placeholder="Rol" value="<?php echo $rol;?>">


<input type="submit" value="Editar Estudiante" class="btn_save"> 
</form>
</div>
	</section>
	<!-- <?php include "includes/footer.php" ?> -->

</body>
</html>