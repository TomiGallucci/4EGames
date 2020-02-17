<?php

require_once "../controller/products.controller.php";
require_once "../models/products.model.php";

class AjaxLanguage{

    /*=============================================
    EDITAR CATEGORÍA
    =============================================*/ 

    public $idLanguage;

    public function ajaxEditLanguage(){

        $table = "products_languages";
        $item = "id";
        $value = $this->idLanguage;
        $order = "id";

        $answer = ModelProducts::mdlShowProducts($table,$item, $value,$order);

        $a = json_encode($answer);

        echo $a;

    }
    public $language;

    public function ajaxShowLanguage(){

        $table = "products_languages";
        $item = "language";
        $value = $this->language;
        $order = "id";

        $answer = ModelProducts::mdlShowProducts($table,$item, $value,$order);

        $a = json_encode($answer);

        echo $a;

    }
    public $newLanguage;

    public function ajaxCreateLanguage(){

        $table = "products_languages";
        $value = $this->newLanguage;

        $answer = ModelProducts::mdlIntoLanguages($table,$value);

        $a = json_encode($answer);

        echo $a;

    }
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	

if(isset( $_POST["idLanguages"])){

    $idLanguage = new AjaxLanguage();
    $idLanguage -> idLanguage = $_POST["idLanguages"];
    $idLanguage -> ajaxEditLanguage();
}
if(isset( $_POST["language"])){

    $showLenguage = new AjaxLanguage();
    $showLenguage -> language = $_POST["language"];
    $showLenguage -> ajaxShowLanguage();
}

if(isset( $_POST["newLanguage"])){
   

    $a = new AjaxLanguage();
    $a -> newLanguage = $_POST["newLanguage"];
    $a -> ajaxCreateLanguage();

    

}
