<nav>
			<ul>
				<li><a href="#">Inicio</a></li>

<?php 
if ($_SESSION['rol'] == 1) {
?> 
				<li class="principal">
					<a href="#">Usuarios</a>
					<ul>
						<li><a href="registro_usuario.php">Nuevo Usuario</a></li>
						<li><a href="lista_usario.php">Lista de Usuarios</a></li>
					</ul>
				</li>
				<?php } ?> 

				<li class="principal">
					<a href="#">Estudiantes</a>
					<ul>
						<li><a href="registro_estudiante.php">Nuevo Estudiante</a>	</li>
						<li><a href="lista_estudiantes.php">Lista de Estudiantes</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Roles</a>
					<ul>
						<li><a href="registro_rol.php">Nuevo Rol</a></li>
						<li><a href="lista_roles.php">Lista de Roles</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Materias</a>
					<ul>
						<li><a href="#">Nuevo Materia</a></li>
						<li><a href="#">Lista de Materias</a></li>
					</ul>
				</li>

				<li class="principal">
					<a href="#">Planes</a>
					<ul>
						<li><a href="registro_plan.php">Nuevo Plan</a></li>
						<li><a href="lista_planes.php">Lista de Planes</a></li>
					</ul>
				</li>

				<li class="principal">
					<a href="#">Estado</a>
					<ul>
						<li><a href="registro_estado.php">Nuevo Estado</a></li>
						<li><a href="lista_estados.php">Lista de Estados</a></li>
					</ul>
				</li>

				<li class="principal">
					<a href="#">Analiticos</a>
					<ul>
						<li><a href="#">Nuevo Analitico</a></li>
						<li><a href="#">Analiticos</a></li>
					</ul>
				</li>
			</ul>
		</nav>