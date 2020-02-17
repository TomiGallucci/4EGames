/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".newPhoto").change(function(){

	var image = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(image["type"] != "image/jpeg" && image["type"] != "image/png"){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(image["size"] > 5000000){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 5MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var dataImage = new FileReader;
  		dataImage.readAsDataURL(image);

  		$(dataImage).on("load", function(event){

  			var routeImage = event.target.result;

  			$(".preview").attr("src", routeImage);

  		})

  	}
})
/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#newEmail").change(function(){



	$(".alert").remove();

	var user = $(this).val();


	var data = new FormData();
	data.append("validateUser", user);

	 $.ajax({
	    url:"categories.ajax.php",
	    method:"POST",
	    data: data,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(answer){
	    	
	    	if(answer){

	    		$("#newEmail").parent().after('<div class="alert alert-warning">Este email ya existe en la base de datos</div>');

	    		$("#newEmail").val("");

	    	}

	    }

	})
})
/*=============================================
EDITAR USUARIO
=============================================*/
$(".table").on("click", ".btnEditUser", function(){

	var idUser = $(this).attr("idUser");
	
	var data = new FormData();
	data.append("idUser", idUser);

	$.ajax({

		url:"ajax/users.ajax.php",
		method: "POST",
		data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(answer){

			
			$("#editName").val(answer["name"]);
			$("#editLastname").val(answer["lastname"]);
			$("#editEmail").val(answer["email"]);
			$("#editPerfil").html(answer["perfil"]);
			$("#editBirthday").val(answer["birthday"]);
			$("#actualPhoto").val(answer["image"]);	
      $("#editTyc").val(answer["tyc"]);
			$("#actualPassword").val(answer["password"]);

			if(answer["image"] != ""){

				$(".preview").attr("src", answer["image"]);

			}

		}

	});

})

/*=============================================
ACTIVAR USUARIO
=============================================*/
$(".table").on("click", ".btnActive", function(){

	var idUser = $(this).attr("idUser");
	var statusUser = $(this).attr("statusUser");

	var data = new FormData();
 	data.append("activateId", idUser);
  data.append("activateUser", statusUser);

  	$.ajax({

	  url:"ajax/users.ajax.php",
	  method: "POST",
	  data: data,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

	      	if(window.matchMedia("(max-width:767px)").matches){

	      		 swal({
			      title: "El usuario ha sido actualizado",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    }).then(function(result) {
			        if (result.value) {

			        	window.location = "users";

			        }


				});

	      	}
      
		}

	})

  	if(statusUser == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('statusUser',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('statusUser',0);

  	}

})

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".table").on("click", ".btnDeleteUser", function(){

  var idUser = $(this).attr("idUser");
  var photoUser = $(this).attr("photoUser");
  var email = $(this).attr("email");

  swal({
    title: '¿Está seguro de borrar el usuario?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?route=users&idUser="+idUser+"&emailUser="+email+"&photoUser="+photoUser;

    }

  })

})
