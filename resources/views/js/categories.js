/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".table").on("click", ".btnEditCategory", function(){

	var idCategories = $(this).attr("idCategories");

	
	var dato = new FormData();
	dato.append("idCategories", idCategories);

	$.ajax({
		url: "ajax/categories.ajax.php",
		method: "POST",
		data: dato,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(answer){

     

     		 $("#editCategory").val(answer["category"]);
     		 $("#idCategory").val(answer["id"]);

     	},
     	 error : function()
	      {
	        alert('Hubo un error');
	      }


	})


})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".table").on("click", ".btnDeleteCategory", function(){

	 var idCategories = $(this).attr("idCategories");

	 swal({
	 	title: '¿Está seguro de borrar la categoría?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar categoría!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?route=categories&idCategories="+idCategories;

	 	}

	 })

})