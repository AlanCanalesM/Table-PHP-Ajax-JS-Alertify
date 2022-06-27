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
 * It takes the id of the row you want to delete, and sends it to the PHP script, which deletes the row
 * from the database.
 * @param id - The id of the row you want to delete.
 */
function eliminardatos(id){

	cadena="id=" + id;


	$.ajax({

type: "POST",
url: "php/borrar.php",
data: cadena,

success:function(r){


	if (r==1) {

$('#tabla').load('formulario.php');
		alertify.success("Eliminado con exito");
	}

	else{
		alertify.error("Fallo el servidor");
	}
}


	})



}