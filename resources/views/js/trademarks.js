/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".table").on("click", ".btnEditTrademark", function(){

	var idTrademark = $(this).attr("idTrademark");

	
	var data = new FormData();
	data.append("idTrademark", idTrademark);

	$.ajax({
		url: "ajax/trademarks.ajax.php",
		method: "POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(answer){

     

     		 $("#editTrademark").val(answer["trademark"]);
     		 $("#idTrademark").val(answer["id"]);

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
$(".table").on("click", ".btnDeleteTrademark", function(){

	 var idTrademark = $(this).attr("idTrademark");

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

	 		window.location = "index.php?route=categories&idTrademark="+idTrademark;

	 	}

	 })

})