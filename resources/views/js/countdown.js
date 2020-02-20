const getRemainingTime = deadline => {
  let now = new Date(),
      remainTime = (new Date(deadline) - now + 1000) / 1000,
      remainSeconds = ('0' + Math.floor(remainTime % 60)).slice(-2),
      remainMinutes = ('0' + Math.floor(remainTime / 60 % 60)).slice(-2),
      remainHours = ('0' + Math.floor(remainTime / 3600 % 24)).slice(-2),
      remainDays = Math.floor(remainTime / (3600 * 24));

  return {
    remainSeconds,
    remainMinutes,
    remainHours,
    remainDays,
    remainTime
  }
};

const countdown = (deadline,elem,finalMessage) => {
  const el = document.getElementById(elem);

  const timerUpdate = setInterval( () => {
    let t = getRemainingTime(deadline);

    if(el){
      el.innerHTML = '<div class="box-footer"><div class="alert alert-danger">'+`${t.remainDays}d:${t.remainHours}h:${t.remainMinutes}m:${t.remainSeconds}s`+'</div></div>' ;
    }
    if(t.remainTime <= 1) {
      clearInterval(timerUpdate);
      el.innerHTML = finalMessage;
    }

  }, 1000)
};



 

var data = new FormData();
    data.append("activeOffer", 1);
 $.ajax({

    url:"ajax/offerdays.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(answer){


      
              var data1 = new FormData();
                  data1.append("productId",answer["product_id"]);
              $.ajax({

              url:"ajax/products.ajax.php",
              method: "POST",
              data: data1,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(answer1){

                  if(answer["offerOn"] == 1){
                      $("#clock").before('<div class="box text-center"><div class="box-header"><div class="btn btn-success">'+answer1["title"]+'</div></div><div class="box-body"><div ><img src="'+answer1["image"]+'" style="width: 100%"><div class="btn-warning">-'+answer["discount"]+'%  $'+answer["price_discount"]+'</div></div></div></div>');
                      countdown(answer["date_limit"],'clock','<div class="btn btn-danger">Oferta acabada</div>');


                   
                  }else{
                    

             
                  }
                }
              })


    }
 })
 $('.btn-warning').number(true, 2);


     