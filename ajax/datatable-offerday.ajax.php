<?php


require_once "../controller/products.controller.php";
require_once "../models/products.model.php";

require_once "../controller/offerday.controller.php";
require_once "../models/offerday.model.php";


class tableOfferday{

    /*=============================================
     MOSTRAR LA TABLA DE PRODUCTOS
    =============================================*/ 

    public function showtableOfferday(){

        $item = null;
        $value = null;
        $offer = ControllerOfferday::ctrShowOfferday($item, $value); 
        
        $datosJson = '{
          "data": [';

          for($i = 0; $i < count($offer); $i++){



            /*=============================================
            TRAEMOS EL NOMBRE PRODUCTO
            =============================================*/ 

            $productId = $offer[$i]["product_id"];

            $item = "id";
            $order = "id";

            $answer = ControllerProducts::ctrShowProducts($item,$productId, $order);

            /*=============================================
            TRAEMOS LA IMAGEN
            =============================================*/ 

            $image = "<img src='".$answer["image"]."' class='img-thumbnail' width='140px'>";

            if($offer[$i]["offerOn"] == 1){
                  $morebutton = "<button class='btn btn-success btn-xs btnActive' idOffer='".$offer[$i]["id"]."' statusOffer='0'>Activado</button>";
            }else{
                  $morebutton = "<button class='btn btn-danger btn-xs btnActive' idOffer='".$offer[$i]["id"]."' statusOffer='1'>Desactivado</button>";
            }

            /*=============================================
            TRAEMOS LAS ACCIONES
            =============================================*/ 

            $button =  "<div class='btn-group'><a><button class='btn btn-warning btnEditOfferday' offerId='".$offer[$i]["id"]."' productId='".$answer["id"]."' data-toggle='modal' data-target='#modalEditOfferDay'><i class='fa fa-pencil'></i></button></a><a><button class='btn btn-danger btnDeleteOfferday' offerId='".$offer[$i]["id"]."' productId='".$answer["id"]."' ><i class='fa fa-times'></i></button></a></div>"; 

            $datosJson .='[
                  "'.($i+1).'",
                  "'.$image.'",
                  "'.$answer["title"].'",
                  "'.number_format($offer[$i]["price_discount"],2).'",
                  "'.$offer[$i]["discount"].'",
                  "'.$offer[$i]["date_limit"].'",
                  "'.$offer[$i]["date"].'",
                  "'.$morebutton.'",
                  "'.$button.'"
                ],';

          }

          $datosJson = substr($datosJson, 0, -1);

         $datosJson .=   '] 

         }';
        
        echo $datosJson;


    }


}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activeOffer = new tableOfferday();
$activeOffer -> showtableOfferday();

