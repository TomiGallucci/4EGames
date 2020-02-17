
/*=============================================
AGREGANDO PRECIO DE VENTA
=============================================*/
$("#newPurchasePrice, #editPurchasePrice").change(function(){
  var a = document.getElementsByClassName('alert-warning');
  $(a).remove();

  var valPercentage = $(this).val();
  console.log("valPercentage", valPercentage);
  var newPercentage = $('.newPercentage').val();
  console.log("newPercentage", newPercentage);

  if($(".percentage").prop("checked")){



    if($(".dolar").prop("checked")){


      var valDollar = $(".newDollar").val();
      console.log("valDollar", valDollar);

      var dolar = Number((valPercentage*valDollar));
      console.log("dolar", dolar);


      var percentage = Number((dolar*newPercentage/100)+dolar);
      console.log("percentage", percentage);


      var editPercentage = Number((dolar*newPercentage/100))+dolar;
      console.log("editPercentage", editPercentage);


    }else {



      var percentage = Number((valPercentage*newPercentage/100))+Number($("#newPurchasePrice").val());
      console.log("percentage", percentage);



      var editPercentage = Number(($("#editPurchasePrice").val()*newPercentage/100))+Number($("#editPurchasePrice").val());
      console.log("editPercentage", editPercentage);
      

    }


		$("#newSalePrice").val(percentage);
		console.log("percentage", percentage);
		$("#newSalePrice").prop("readonly",true);

		$("#editSalePrice").val(editPercentage);
		$("#editSalePrice").prop("readonly",true);

	}else{

      if($(".dolar").prop("checked")){


      var valDolar = $(".newDollar").val();

      var dolar = Number((valPercentage*valDolar));


      var percentage = dolar;


      var editPercentage = dolar;


    }

    $("#newSalePrice").val(percentage);
    $("#newSalePrice").prop("readonly",true);

    $("#editSalePrice").val(editPercentage);
    $("#editSalePrice").prop("readonly",true);
  }

})

/*=============================================
CAMBIO DE PORCENTAJE
=============================================*/
$(".newPercentage").change(function(){

  var a = $('.newPercentage').val();
  var b = $('.newDollar').val();

	if($(".percentage").prop("checked")){
    

    if($(".dolar").prop("checked")){

      var dolar = Number(($("#newPurchasePrice").val()*b));

      var percentage = Number((dolar*a/100))+dolar;
      var editPercentage = Number((dolar*a/100))+dolar;

    }else {

      var percentage = Number(($("#newPurchasePrice").val()*a/100))+Number($("#newPurchasePrice").val());
      var editPercentage = Number(($("#editPurchasePrice").val()*a/100))+Number($("#editPurchasePrice").val());

    }


		$("#newSalePrice").val(percentage);
		$("#newSalePrice").prop("readonly",true);

		$("#editSalePrice").val(editPercentage);
		$("#editSalePrice").prop("readonly",true);

	}

})
/*=============================================
CAMBIO DE DOLAR
=============================================*/
$(".newDollar").change(function(){

  var a = $('.newPercentage').val();
  var b = $('.newDollar').val();

  if($(".percentage").prop("checked")){
    

    if($(".dolar").prop("checked")){
      
      var valPercentage = $(this).val();
    
      var dolar = Number(($("#newPurchasePrice").val()*b));

      var percentage = Number((dolar*a/100))+dolar;
      var editPercentage = Number((dolar*a/100))+dolar;

    }else {

      var valPercentage = $(this).val();
      var percentage = Number(($("#newPurchasePrice").val()*a/100))+Number($("#newPurchasePrice").val());
      var editPercentage = Number(($("#editPurchasePrice").val()*a/100))+Number($("#editPurchasePrice").val());

    }


    $("#newSalePrice").val(percentage);
    $("#newSalePrice").prop("readonly",true);

    $("#editSalePrice").val(editPercentage);
    $("#editSalePrice").prop("readonly",true);

  }

})
$(".percentage").on("ifUnchecked",function(){

	$("#newSalePrice").prop("readonly",false);
	$("#editSalePrice").prop("readonly",false);

})

$(".percentage").on("ifChecked",function(){

	$("#newSalePrice").prop("readonly",true);
	$("#editSalePrice").prop("readonly",true);

})

/*=============================================
SUBIENDO LA FOTO DEL PRODUCTO
=============================================*/

$(".newPhoto").change(function(){

	var image = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(image["type"] != "image/jpeg" && image["type"] != "image/png"){

  		$(".newPhoto").val("");

  		 swal({
		      title: "Error al subir la image",
		      text: "¡La image debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(image["size"] > 5000000){

  		$(".newPhoto").val("");

  		 swal({
		      title: "Error al subir la image",
		      text: "¡La image no debe pesar más de 5MB!",
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
EDITAR PRODUCTO
=============================================*/

$(".tableProducts tbody").on("click", "button.btnEditProduct", function(){

	var idProduct = $(this).attr("idProduct");

	
	var data = new FormData();
    data.append("idProduct", idProduct);

     $.ajax({

      url:"ajax/products.ajax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(a){


          

        let b = a["categories"];
            category = b.split('-');

          for (i=1; i < category.length ; i++) { 
                
              var dataCategoria = new FormData();
              dataCategoria.append("idCategories",category[i]);


           $.ajax({

              url:"ajax/categories.ajax.php",
              method: "POST",
              data: dataCategoria,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(anwer){  
               

                $(".categories").append('<a class="btn btn-xs btn-success" style="margin-top: 5px; margin-left: 3px">'+anwer["category"]+'<i class="fa fa-ban text-red"></i><input type="hidden" name="categories[]" value="'+anwer["id"]+'" /></a>');


              }

            });
                

          }
        let c = a["languages"];
            language = c.split('-');
          for (i=1; i < language.length ; i++) { 
            console.log(language[i]);
                
              var data = new FormData();
              data.append("idLanguages",language[i]);


           $.ajax({

              url:"ajax/languages.ajax.php",
              method: "POST",
              data: data,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(anwer){
                console.log("anwer", anwer);
               
                $('.languages').append(`<a class="btn btn-primary btn-xs" role="button" style="padding: 3px">${anwer["language"]} <i class="fa fa-times remove" style="color: red;"></i><input type="hidden" class="lang" name="languages[]" value="${anwer["id"]}" /></a>`);

              }
            })
                

          }

          var data = new FormData();
              data.append("idTrademark",a["trademark"]);

          $.ajax({

              url:"ajax/trademarks.ajax.php",
              method: "POST",
              data: data,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(anwer){
                console.log("anwer", anwer);

                       $("#editTrademark").val(anwer["trademark"]);
                       $("#editTrademarkId").val(anwer["id"]);

              }
            })
                

 



      
           $("#editCode").val(a["code"]);

           $("#editTitle").val(a["title"]);

           $("#editDescription").val(a["description"]);

           $("#editStock").val(a["stock"]);

    

           $("#editPurchasePrice").val(a["purchase_price"]);

           $("#editSalePrice").val(a["sale_price"]);

           if(a["image"] != ""){

           	$("#actualPhoto").val(a["image"]);

           	$(".preview").attr("src",  a["image"]);

           }

      }

  })

})

/*=============================================
ELIMINAR PRODUCTO
=============================================*/

$(".tableProducts tbody").on("click", "button.btnEliminarProducto", function(){

	var idProduct = $(this).attr("idProduct");
	var codigo = $(this).attr("codigo");
	var image = $(this).attr("image");
	
	swal({

		title: '¿Está seguro de borrar el producto?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar producto!'
        }).then(function(result){
        if (result.value) {

        	window.location = "index.php?route=products&idProduct="+idProduct+"&image="+image+"&codigo="+codigo;

        }


	})

})
$("#newCategories").change(function(){

	idCategory = $(this).val();

	var data = new FormData();
  	data.append("idCategory", idCategory);

  	$.ajax({

      url:"ajax/products.ajax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(answer){
 

      	if(!answer){


      	}else{

      		$(".categories").append('<a class="btn btn-xs btn-success" style="margin-top: 5px; margin-left: 3px">'+answer["category"] +'<i class="fa fa-ban text-red">	</i><input type="hidden" name="categories[]" value="'+answer["category"]+'" /></a>');

      	}
                
      }

  	})

})

$("#editCategories").change(function(){

  idCategory = $(this).val();

  var data = new FormData();
    data.append("idCategory", idCategory);

    $.ajax({

      url:"ajax/products.ajax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(answer){
 

        if(!answer){


        }else{

          $(".categories").append('<a class="btn btn-xs btn-success" style="margin-top: 5px; margin-left: 3px">'+answer["category"] +'<i class="fa fa-ban text-red">  </i><input type="hidden" name="categories[]" value="'+answer["category"]+'" /></a>');

        }
                
      }

    })

})


/*=============================================
AGARRO LOS IDIOMAS
=============================================*/
var obj = [];
$("#newLanguage").change(function(){
  var language = $('#newLanguage').val();

    obj.push(language);



    console.log(obj.length);
  $('.languages').append(`<a class="btn btn-primary btn-xs" role="button" style="padding: 3px">${language} <i class="fa fa-times remove" style="color: red;"></i><input type="hidden" class="language" language="${language}" /></a>`);

   $("#newLanguage").val('');
  listLanguage()
})










$("#editLanguages").change(function(){
  var language = $('#editLanguages').val();

    obj.push(language);



    console.log(obj.length);

  $('.languages').append(`<a class="btn btn-primary btn-xs" role="button" style="padding: 3px">${language} <i class="fa fa-times remove" style="color: red;"></i><input type="hidden" class="language1" language="${language}" /></a>`);
  $("#editLanguages").val('');
  listLanguage()
})
$(document).on("click",".fa-ban",function(){

   $(this).parent().remove();
    listLanguage()
})
$(document).on('click', '.remove', function() {

   $(this).parent().remove();

   listLanguage()

})

function listLanguage(){

  var listaLanguage = [];

  var languages = $(".language");


  for(var i = 0; i < languages.length; i++){

    var data = new FormData();
    let a = $(languages[i]).attr('language');
      data.append('language', a);
      console.log($(languages[i]).attr('language'));
      $.ajax({

      url:"ajax/languages.ajax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(answer){
        
        if(!answer){

               var data1 = new FormData();
               data1.append('newLanguage',a);

               $.ajax({

                url:"ajax/languages.ajax.php",
                method: "POST",
                data: data1,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success:function(answer1){
                

                  if(answer1){

                    var data2 = new FormData();
                    data2.append('language', a);
                     $.ajax({

                      url:"ajax/languages.ajax.php",
                      method: "POST",
                      data: data2,
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType:"json",
                      success:function(answer2){

                        listaLanguage.push({"id": answer2["id"],
                            "language": answer["language"]});

                      }
                    })

                  }


                }
              })

         

        }else{

           listaLanguage.push({"id": answer["id"],
                            "language": answer["language"]});
      
         }

       

      }
  })


  }
  console.log("json",JSON.stringify(listaLanguage));
  console.log(listaLanguage);

  $("#listLanguages").val(listaLanguage); 

}
