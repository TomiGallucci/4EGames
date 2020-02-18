
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
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }},
  function (start, end) {
    $('#reservationtime').html(start.format('MMMM D, YYYY hh::mm:A') + ' - ' + end.format('MMMM D, YYYY hh::mm:A'));

    var fechaInicial = start.format('YYYY-MM-DD hh::mm:A');


    var fechaFinal = end.format('YYYY-MM-DD hh::mm:A');
    console.log("fechaFinal", fechaFinal);


   // $('#reservationtime').attr('timeStart', fechaInicial);
    $('#timeEnd').val(fechaFinal);

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
        console.log("answer", answer);

        priceBase = answer["sale_price"];
        percentage = $(".newPercentage").val();


        $total =  Number(priceBase) - Number(priceBase * percentage /100);

        $("#newDiscountPrice").val($total).attr('priceReal', priceBase);

 
    }
   });


})

$('.newPercentage').change(function(){

       priceBase = $("#newDiscountPrice").attr('priceReal');
       percentage = $(".newPercentage").val();

        $total =  Number(priceBase) - Number(priceBase * percentage /100);

        $("#newDiscountPrice").val($total);




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
