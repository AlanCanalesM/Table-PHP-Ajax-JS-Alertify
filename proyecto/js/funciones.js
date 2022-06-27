/**
 * The function agregardatos() takes four parameters, and then uses the jQuery ajax() method to send a
 * POST request to the PHP script agregardatos.php, which is located in the php folder. The data
 * parameter of the ajax() method is set to the value of the variable cadena, which is a string that
 * contains the values of the four parameters.
 * @param nombre - the name of the input field
 * @param apellidos - "",
 * @param email - email
 * @param telefono - $('#telefono').val(),
 */
function agregardatos(nombre, apellidos, email, telefono){

cadena="nombre=" + nombre 
+"&apellidos=" + apellidos 
+ "&email=" + email 
+ "&telefono=" + telefono;


	$.ajax({
type:"POST",
url:"php/agregardatos.php",
data:cadena,
success:function(r){

	if (r==1) {

$('#tabla').load('componentes/tabla.php');
$('#buscador').load('componentes/buscador.php');
		alertify.success("Agregado con exito");
	}

	else{
		alertify.error("Fallo el servidor");
	}
}


	});


}

/**
 * It takes a string of data, splits it into an array, and then assigns each array element to a
 * variable.
 * @param datos - idpersona||nombre||apellidos||correo||telefono
 */
function agregaform(datos){

	d=datos.split('||');

	$('#idpersona').val(d[0]);
	$('#nombreu').val(d[1]);
	$('#apellidosu').val(d[2]);
	$('#correou').val(d[3]);
	$('#telefonou').val(d[4]);
	
}


/**
 * It takes the values from the form and sends them to the php file, which then updates the database.
 */
function actualizaDatos(){


	id=$('#idpersona').val();
	nombre=$('#nombreu').val();
	apellidos=$('#apellidosu').val();
	email=$('#correou').val();
	telefono=$('#telefonou').val();


cadena="id=" + id 
+"&nombre=" + nombre 
 +"&apellidos=" + apellidos 
 + "&email=" + email 
 + "&telefono=" + telefono;


 $.ajax({
type:"POST",
url:"php/actualizadatos.php",
data:cadena,
success:function(r){

	if (r==1) {

$('#tabla').load('componentes/tabla.php');
		alertify.success("Datos Actualizados");
	}

	else{
		alertify.error("fallo el servidor");
	}
}


	});


}


/**
 * If the user clicks the OK button, then call the function eliminardatos(id), otherwise call the
 * function alertify.error('Cancelado')
 * @param id - The id of the row to delete.
 */
function preguntarSiNo(id){



alertify.confirm("Eliminar registros", "¿Estas seguro de eliminar este registro?",
  function(){
    eliminardatos(id)
  },
  function(){
    alertify.error('Cancelado');
  });
}
/**
 * When the user clicks the delete button, the function will send the id of the row to the server, and
 * the server will delete the row from the database.
 * @param id - The id of the row you want to delete.
 */

function eliminardatos(id){

	cadena="id=" + id;


	$.ajax({

type: "POST",
url: "php/eliminardatos.php",
data: cadena,

success:function(r){


	if (r==1) {

$('#tabla').load('componentes/tabla.php');
		alertify.success("Eliminado con exito");
	}

	else{
		alertify.error("Fallo el servidor");
	}
}


	})



}




/**
 * It's a function that asks the user if they want to add attendance to a record.
 * @param id - the id of the row
 */
function preguntarSiNoasistencia(id){



alertify.confirm("Asistencia", "¿Deseas agregar asistencia al registro?",
  function(){
    asistencia(id)
  },
  function(){
    alertify.error('Cancelado');
  });
}

/**
 * It takes the id of the row that was clicked, and sends it to a php file that updates the database.
 * @param id - the id of the row you want to delete
 */
function asistencia(id){

	cadena="id=" + id;


	$.ajax({

type: "POST",
url: "php/asistenciasino.php",
data: cadena,

success:function(r){


	if (r==1) {

$('#tabla').load('componentes/tabla.php');
		alertify.success("Asistencia agregada con exito");
	}

	else{
		$('#tabla').load('componentes/tabla.php');
		alertify.success("Asistencia agregada con exito");
	}
}


	})



}





/**
 * It's a function that asks a question and if the user clicks "OK" it runs another function.
 * @param id - the id of the row
 */
function preguntarNoasistencia(id){



alertify.confirm("Asistencia", "¿Deseas quitar asistencia al registro?",
  function(){
    asistenciano(id)
  },
  function(){
    alertify.error('Cancelado');
  });
}
/**
 * It takes the id of the row that was clicked, and then sends it to the php file, which then deletes
 * the row from the database.
 * @param id - The id of the row you want to delete.
 */

function asistenciano(id){

	cadena="id=" + id;


	$.ajax({

type: "POST",
url: "php/asistenciano.php",
data: cadena,

success:function(r){


	if (r==1) {

$('#tabla').load('componentes/tabla.php');
		alertify.success("Se quito la asistencia");
	}

	else{
		$('#tabla').load('componentes/tabla.php');
		alertify.success("Se quito la asistencia");
	}
}


	})



}

