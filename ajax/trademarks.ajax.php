<?php

require_once "../controller/trademarks.controller.php";
require_once "../models/trademarks.model.php";

class AjaxTrademark{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idTrademark;

	public function ajaxEditTrademarks(){


		$item = "id";
		$value = $this->idTrademark;

		$answer = ControllerTrademarks::ctrShowTrademarks($item, $value);

		$a = json_encode($answer);

		echo $a;

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	


if(isset( $_POST["idTrademark"])){

	$trademarks = new AjaxTrademark();
	$trademarks -> idTrademark = $_POST["idTrademark"];
	$trademarks -> ajaxEditTrademarks();
}