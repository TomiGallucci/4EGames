<?php

require_once "../controller/categories.controller.php";
require_once "../models/categories.model.php";
require_once "../controller/products.controller.php";
require_once "../models/products.model.php";

class AjaxCategories{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idCategory;

	public function ajaxEditCategory(){


		$item = "id";
		$value = $this->idCategory;

		$answer = ControllerCategories::ctrShowCategories($item, $value);

		$a = json_encode($answer);

		echo $a;

	}
}


/*=============================================
EDITAR CATEGORÍA
=============================================*/	


if(isset( $_POST["idCategories"])){

	$category = new AjaxCategories();
	$category -> idCategory = $_POST["idCategories"];
	$category -> ajaxEditCategory();
}
