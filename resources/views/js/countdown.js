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
      el.innerHTML = '<div class="alert alert-danger" style="width: 140px;">'+`${t.remainDays}d:${t.remainHours}h:${t.remainMinutes}m:${t.remainSeconds}s`+'</div>' ;
    }
    if(t.remainTime <= 1) {
      clearInterval(timerUpdate);
      el.innerHTML = finalMessage;
    }

  }, 1000)
};



 
$.ajax({

 url: "ajax/datatable-offerday.ajax.php",
 success:function(respuesta){
        
     a = JSON.parse(respuesta);
    for(i=0; i < a.data.length; i++){

      if($(a.data[i][7]).attr('statusOffer') == 1){
          $("#clock").before('<div class="btn btn-success btn-lg" style="margin: 10vh 8vw 0;">'+a.data[0][2]+'</div>').before('<div style="text-align: center">'+a.data[0][1]+'</div>')
          countdown(a.data[0][5],'clock','Oferta acabada');


       
      }else{
        

 
    }
      }

          
  }
 

})

