
<?php 
include '../menu/header.php';
require_once "../config/conexion.php";



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


<body>
	<h2>Eliminar empleado</h2>

<!-- <?php include "includes/header.php" ?> -->
	<section id="container">
		<div class="data_delete">
<h2>¿Esta seguro que desea borrar el siguiente registro?</h2>
<p class="text-white bg-dark">Descripcion: <span><?php echo $nombre; ?></span></p>

<form method="POST" action="">
<input type="hidden" name="Id" value="<?php echo $Id; ?>">
<a href="listaEmpleados.php" class="btn btn-primary">Cancelar</a>
<input type="submit" value="Aceptar" class="btn btn-danger">
</form>


		</div>
	</section>
	

</body>
</html>