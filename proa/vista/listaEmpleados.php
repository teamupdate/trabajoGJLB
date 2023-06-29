<?php
require_once '../menu/header.php';
require_once "../config/conexion.php";
?>

<div class="col-xs-12">
		<h1>Lista de Empleados</h1>
				
		<div>
			<a class="btn btn-success" href="nuevoEmpleado.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre_completo</th>
					<th>Dni</th>
					<th>Direccion</th>
					<th>Mail</th>
					<th>Rol</th>
					<th>Editar</th>
					
				</tr>
			</thead>
			<tbody>
				
				<?php 
				
					$query = mysqli_query($conexion, "SELECT * FROM empleados");
$result=mysqli_num_rows($query);
mysqli_close($conexion);

if ($result>0) {
    while ($data = mysqli_fetch_array($query)){
		// var_dump($data);
		// exit;

        ?> 
     

	  <tr>
<td><?php echo $data["Id"] ?></td>
<td><?php echo $data["Nombre"] ?></td>
<td><?php echo $data["Dni"] ?></td>
<td><?php echo $data["Direccion"] ?></td>
<td><?php echo $data["Mail"] ?></td>
<td><?php echo $data["Rol"] ?></td>

<td>
<a class="link_edit" href="modificarEmpleado.php?Id=<?php echo $data["Id"] ?>" >Editar</a>
|<?php if ($data["Id"] !=1) { ?> 
<a class="link_delete" href="eliminar_confirmar_empleado.php?Id=<?php echo $data["Id"] ?>" >Eliminar</a>

<?php } ?>
</td>
</tr>
<?php 
    }
}
?> 
</table>
	
			</tbody>
		</table>
	</div>