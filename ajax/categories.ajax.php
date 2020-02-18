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
    public $categories;
    public function ajaxShowCategory(){

        $table = "products_categories";
        $item = "category";
        $value = $this->categories;

        $answer = ModelCategories::mdlShowCategories($table,$item, $value);

        if(!$answer){

            $answerCreate = ModelCategories::mdlIntoCategory($table,$value);

            if($answerCreate == 1){


                $answerShow = ModelCategories::mdlShowCategories($table,$item, $value);

                $a = json_encode($answerShow);

            }

        }else{

             $a = json_encode($answer);
        }
       

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

if(isset( $_POST["categories"])){

    $showCategory = new AjaxCategories();
    $showCategory -> categories = $_POST["categories"];
    $showCategory -> ajaxShowCategory();
}
