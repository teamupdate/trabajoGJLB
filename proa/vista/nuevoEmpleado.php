<?php
include '../menu/header.php';
require_once "../config/conexion.php";

if (!empty($_POST))
{
$alert='';
if (empty($_POST['Nombre']) || empty($_POST['Dni']) || empty($_POST['Direccion']) || empty($_POST['Mail']) || empty($_POST['Rol']))
{

	$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
} else { 
$nombre = $_POST['Nombre'];
$dni =$_POST['Dni'];
$direccion =$_POST['Direccion'];
$mail = $_POST['Mail'];
$rol = $_POST['Rol'];

// echo($nombre);
// echo($dni);
// echo($direccion);
// echo($mail);
// echo("$rol");
// exit;


$query_insert = mysqli_query($conexion, "INSERT INTO empleados(Nombre,Dni,Direccion,Mail,Rol) VALUES ('$nombre','$dni','$direccion','$mail','$rol')") ;
mysqli_close($conexion);
If ($query_insert) {
	$alert='<p class="msg_save">Usuario creado correctamente.</p>';
} else{
	$alert='<p class="msg_error">Error al crear el usuario.</p>';
}
}
}
?>


<h1>Ingresar un empleado</h1>
<a button type="button" href="listaEmpleados.php" class="btn btn-outline-primary">Ir a lista Empleados</button> </a>

<br>
<br>

<div class="alerta"><?php echo isset($alert) ? $alert : '';  ?></div>

<form action="" method="post">
      
  <div class="col-md-10">
    <label for="Nombre" class="form-label">Nombre</label>
           <input id="Nombre" name="Nombre" type="text" class="form-control" required>

  </div>
  
  <div class="col-md-10">
    <label for="Dni" class="form-label">DNI</label>
    <input type="number" class="form-control" id="Dni" name="Dni" class="Dni">
  </div>

  <div class="col-10">
    <label for="Direccion" class="form-label">Dirección</label>
    <input type="text" class="form-control" id="Direccion" name="Direccion">
  </div>
  <div class="col-10">
    <label for="Mail_empleado" class="form-label">Mail</label>
    <input type="mail" class="form-control" id="Mail" name="Mail">
  </div>
  <div class="col-md-10">
  <label for="Rol" class="form-label">Rol</label>
    <input type="text" class="form-control" id="Rol" name="Rol">
    
   
  </div>
    <br>
    <br>
    
  <!-- <div class="col-12">
     <input type="submit" value="Crear Empleado" class="btn_save"> 
    </div> -->

    <div class="col-auto">
    <button type="submit" value="Crear Empleado" class="btn btn-primary mb-3">Crear Empleado</button>
  </div>
</form>

    <br>
    <br>

    <footer id="contacto">
        <div class="footer contenedor">
            <div class="marca-logo">
                <!-- <img src="img/logo1.png" alt=""> -->
            </div>
            <div class="iconos">
                <i class="fab fa-youtube"></i>
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-github"></i>
            </div>
            <p>La pasión e innovación es lo que nos distingue del resto</p>
        </div>

    </footer>
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
    <script src="js/filtro.js"></script>
</body>

</html>