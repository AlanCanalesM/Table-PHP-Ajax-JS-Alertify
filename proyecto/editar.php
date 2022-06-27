/* This is the code that is executed when the user clicks on the edit button. It is getting the id of
the row that the user wants to edit and then it is getting all the data from that row and putting it
into variables. */
<?php	
	if(isset($_GET['editar'])){
			$editar_id = $_GET['editar'];

			$consulta = "SELECT * FROM nombres WHERE id='$editar_id'";
			$ejecutar = sqlsrv_query($con, $consulta);

			$fila = sqlsrv_fetch_array($ejecutar);

			$nombre = $fila['nombre'];
			$apellidos = $fila['apellidos'];
			$telefono = $fila['telefono'];
			$email = $fila['email'];
		}

?>

<br />

<div class="col-md-8 col-md-offset-2">
		<form method="POST" action="">
			<div class="form-group">
				<label>Nombre:</label>
				<input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>"><br />
			</div>
			<div class="form-group">
				<label>Apellidos:</label>
				<input type="text" name="apellidos" class="form-control" value="<?php echo $apellidos; ?>"><br />
			</div>
			<div class="form-group">
				<label>Telefono:</label>
				<input type="text" name="telefono" class="form-control" value="<?php echo $telefono; ?>"><br />
			</div>
			<div class="form-group">
				<label>Email:</label>
				<input type="text" name="email" class="form-control" value="<?php echo $email; ?>"><br />
			</div>
			<div class="form-group">				
				<input type="submit" name="actualizar" class="btn btn-warning" value="ACTUALIZAR DATOS"><br />
			</div>
		</form>
</div>

/* This is the code that is executed when the user clicks on the update button. It is getting all the
data from the form and putting it into variables. Then it is updating the row that the user wants to
update with the new data. */
<?php

	if(isset($_POST['actualizar'])){
			$actualizar_nombre = $_POST['nombre'];
			$actualizar_apellidos = $_POST['apellidos'];
			$actualizar_telefono = $_POST['telefono'];
			$actualizar_email = $_POST['email'];

			$consulta = "UPDATE nombres SET nombre='$actualizar_nombre', apellidos='$actualizar_apellidos', telefono='$actualizar_telefono', email='$actualizar_email' WHERE id='$editar_id'";

			$ejecutar = sqlsrv_query($con, $consulta);

			if($ejecutar){
				echo "<script>alert('Datos actualizados')</script>";
				echo "<script>window.open('formulario.php', '_self')</script>";
			}			
		}

?>