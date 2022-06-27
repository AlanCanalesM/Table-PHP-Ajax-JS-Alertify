<!DOCTYPE html> 
<?php 
	include("conexion_sis.php");





?>
<meta charset="UTF-8">
<html> 	
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>PROYECTO</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">   
    <script src="librerias/jquery-3.2.1.min.js"></script>
  <script src="js/funciones.js"></script>	
	<script src="librerias/bootstrap/js/bootstrap.min.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
	<script src="librerias/datatable/jquery.dataTables.min.js"></script>  			
	</head>
<body>
	<div class="col-md-8 col-md-offset-2">
		<h1>PROYECTO SERVICIO SOCIAL CONEXION DE UNA BD SQL SERVER CON A ANDROID</h1>
<!--Modal nuevos registros -->
		<div class="modal fade" id="modalnuevos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Añadir Registro</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="formulario.php">
      <div class="form-group">
        <label>Nombre:</label>
        <input type="text" name="nombre" class="form-control" placeholder="Escriba su nombre"><br />
      </div>
      <div class="form-group">
        <label>Apellidos:</label>
        <input type="text" name="apellidos" class="form-control" placeholder="Escriba sus apellidos"><br />
      </div>
      <div class="form-group">
        <label>Telefono:</label>
        <input type="text" name="telefono" class="form-control" placeholder="Escriba su telefono"><br />
      </div>
      <div class="form-group">
        <label>Email:</label>
        <input type="text" name="email" class="form-control" placeholder="Escriba su email"><br />
      </div>
      <div class="form-group">        
        <input type="submit" name="insert" class="btn btn-warning" value="INSERTAR DATOS"><br />
      </div>
    </form>
        
      </div>
    
    </div>
  </div>
</div>
	</div>


	/* Checking if the form has been submitted. If it has, it is inserting the data into the database. */
	<?php
		if(isset($_POST['insert'])){
			$nombre = $_POST['nombre'];
			$apellidos = $_POST['apellidos'];
			$telefono= $_POST['telefono'];
			$email = $_POST['email'];

$insertar = "INSERT INTO nombres(nombre, apellidos, telefono, email)VALUES('$nombre', '$apellidos', '$telefono','$email')";

			$ejecutar = sqlsrv_query($con, $insertar);

			if($ejecutar){
				echo "<h3>Insertado correctamente</h3>";
			}

		}

	?>


	<!--Modal editar registros -->




	<div class="col-md-8 col-md-offset-2">
	<table class="table table-bordered table-responsive">
	<button class="btn btn-primary" data-toggle="modal" data-target="#modalnuevos">Agregar nuevo</button>
		<tr>
			<td>ID</td>
			<td>Nombre</td>
			<td>Apellidos</td>
			<td>Telfono</td>
			<td>Email</td>
			<td>Acción</td>
			<td>Acción</td>
		</tr>

		/* A PHP code that is fetching the data from the database and displaying it in the table. */
		<?php
			$consulta = "SELECT * FROM nombres";

			$ejecutar = sqlsrv_query($con, $consulta);

			$i = 0;

			while($fila = sqlsrv_fetch_array($ejecutar)){
				$id = $fila['id'];
				$nombre = $fila['nombre'];
				$apellidos = $fila['apellidos'];
				$telefono=$fila['telefono'];
				$email = $fila['email'];
				$i++;
			

		?>

		<tr align="center">
			<td><?php echo $id; ?></td>
			<td><?php echo $nombre; ?></td>
			<td><?php echo $apellidos; ?></td>
			<td><?php echo $telefono; ?></td>
			<td><?php echo $email; ?></td>
			<td><a href="formulario.php?editar=<?php echo $id; ?>">Editar</a></td>
			<td><a href="formulario.php?borrar=<?php echo $id; ?>">Borrar</a></td>
		</tr>

		<?php } ?>

	</table>
	</div>

	<?php
		if(isset($_GET['editar'])){
			include("editar.php");
		}

	?>	

	/* Deleting the data from the database. */
	<?php	
	if(isset($_GET['borrar'])){

			$borrar_id = $_GET['borrar'];

			$borrar = "DELETE FROM nombres WHERE id='$borrar_id'";
			
			$ejecutar = sqlsrv_query($con, $borrar);

			if($ejecutar){
				echo "<script>alert('El usuario ha sido borrado')</script>";
				echo "<script>window.open('formulario.php', '_self')</script>";
			}	
		}
?>
</body>
</html>



