<?php 


require_once "../controller/offerday.controller.php";
require_once "../models/offerday.model.php";

class AjaxOfferday {

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public $activateOffer;
	public $activateId;


	public function ajaxActivateOffer(){

		$table = "products_offerday";

		$item1 = "offerOn";
		$value1 = $this->activateOffer;

		$item2 = "id";
		$value2 = $this->activateId;

		$answer = ModelOfferday::mdlUpdateOfferday($table, $item1, $value1, $item2, $value2);

	}
    public $showOffer;

    public function ajaxShowOffer(){


        $item = "offerOn";
        $value = $this->showOffer;



        $answer = ControllerOfferday::ctrShowOfferday($item, $value);

        echo $answer;

    }

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	


if(isset($_POST["activateOffer"])){
	$activateOffers = new AjaxOfferday();
	$activateOffers -> activateOffer = $_POST["activateOffer"];
	$activateOffers -> activateId = $_POST["activateId"];
	$activateOffers -> ajaxActivateOffer();

}
if(isset($_POST["offerOn"])){
    $a = new AjaxOfferday();
    $a -> showOffer = $_POST["offerOn"];
    $a -> ajaxShowOffer();

}