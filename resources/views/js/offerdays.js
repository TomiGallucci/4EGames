
$('.tableOfferday').DataTable( {
    "ajax": "ajax/datatable-offerday.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
     "language": {

            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

    }

} );











 //Date range picker with time picker
    $('.reservationtime').daterangepicker({ timePicker: true, timePicker24Hour: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY HH:mm:ss' }},
  function (start, end) {
    $('.reservationtime').html(start.format('MMMM D, YYYY HH:mm:ss') + ' - ' + end.format('MMMM D, YYYY HH:mm:ss'));

    var fechaInicial = start.format('YYYY-MM-DD HH:mm:ss');


    var fechaFinal = end.format('YYYY-MM-DD hh::mm:A');
 
    $('.timeEnd').val(fechaFinal);

  })
    
$("#newProducts").change(function(){
    let a = $(this).val();
    var data = new FormData();
        data.append('idProduct',a);
   $.ajax({

      url:"ajax/products.ajax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(answer){


        priceBase = answer["sale_price"];
        percentage = $(".newPercentage").val();


        total =  Number(priceBase) - Number(priceBase * percentage /100);

        $("#newPrice").val(total).attr('priceReal', priceBase);

        $("#newDiscountPrices").val(priceBase);
        $("#newDiscountPrice").number(true, 2);
        $("#newPercentages").val(percentage);

 
    }
   });


})


$('.newPercentage').change(function(){

       priceBase = $("#newPrices").attr('priceReal');
   


    if($('.percentage').prop('checked')){

        percentage = $("#newPercentage").val();

        total =  Number(priceBase) - Number(priceBase * percentage /100);

        $("#newDiscountPrice").val(total);

    }




})

$("#editProducts").change(function(){
    let a = $(this).val();
    var data = new FormData();
        data.append('idProduct',a);
   $.ajax({

      url:"ajax/products.ajax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(answer){


        priceBase = answer["sale_price"];
        percentage = $(".newPercentage").val();


        total =  Number(priceBase) - Number(priceBase * percentage /100);

        $("#editDiscountPrices").val(priceBase)
        $("#editDiscountPrice").val(total).attr('priceReal', priceBase);
        $("#editPercentages").val(percentage);
        $("#editDiscountPrice").number(true, 2);

 
    }
   });


})




$('.newPercentage').change(function(){

       priceBase = $("#editPrices").attr('priceReal');
   


    if($('.percentage').prop('checked')){

        percentage = $("#editPercentage").val();

        total =  Number(priceBase) - Number(priceBase * percentage /100);

        $("#editDiscountPrice").val(total);

    }




})



$(".tableOfferday").on("click", ".btnActive", function(){

    var idOffer = $(this).attr("idOffer");
    var statusOffer = $(this).attr("statusOffer");

    var data = new FormData();
        data.append("activateId", idOffer);
       data.append("activateOffer", statusOffer);

    $.ajax({

      url:"ajax/offerdays.ajax.php",
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

    if(statusOffer == 0){

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('statusOffer',1);

    }else{

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('statusOffer',0);

    }

})
/*=============================================
EDITAR OFERTA
=============================================*/
$(".tableOfferday").on("click", ".btnEditOfferday", function(){

    var productId = $(this).attr("productId");

    
    var data = new FormData();
    data.append("productId", productId);

    $.ajax({

        url:"ajax/offerdays.ajax.php",
        method: "POST",
        data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(answer){

            var data = new FormData();
                data.append("idProduct", answer["product_id"]);
                $.ajax({

                url:"ajax/products.ajax.php",
                method: "POST",
                data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(answer1){
  
               $("#reservationtime").val(answer["date_limit"]);
               $(".timeEnd").val(answer["date_limit"]);     
               $("#editProduct").val(answer1["id"]);
               $("#editProduct").html(answer1["title"]);  
               $("#editPercentage").val(answer["discount"]);
               $("#editDiscountPrice").val(answer["price_discount"]).attr('priceReal',answer["price_discount"]);
              


                }
            })

        }

    })

})
$(".tableOfferday").on("click", ".btnDeleteOfferday", function(){

  var idOfferday = $(this).attr("productId");

  swal({
        title: '¿Está seguro de borrar la venta?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar venta!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?route=offerday&idOfferday="+idOfferday;
        }

  })

})