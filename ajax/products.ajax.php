<?php

require_once "../controller/products.controller.php";
require_once "../models/products.model.php";

require_once "../controller/categories.controller.php";
require_once "../models/categories.model.php";

class AjaxProducts{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $idCategory;

  public function ajaxCreateCode(){

    $table = "products_categories";
    $item = "id";
    $value = $this->idCategory;
    $order = "id";

    $answer = ModelProducts::mdlShowProducts($table,$item, $value,$order);

    echo json_encode($answer);

  }



  /*=============================================
  EDITAR PRODUCTO
  =============================================*/ 

  public $idProduct;
  public $getProduct;
  public $nameProduct;
  public $productId;


  public function ajaxEditProduct(){

      if($this->getProduct == "ok"){

          $item = null;
          $value = null;
          $order = "id";

          $answer = ControllerProducts::ctrShowProducts($item, $value, $order);
          echo json_encode($answer);
      }elseif($this->nameProduct != ""){

      $item = "description";
      $value = $this->nameProduct;
      $order = "id";

          $answer = ControllerProducts::ctrShowProducts($item, $value, $order);

      echo json_encode($answer);
      }else{
        
      $item = "id";
      $value = $this->idProduct;
      $order = "id";

        $answer = ControllerProducts::ctrShowProducts($item, $value, $order);

      echo json_encode($answer);

      }
  }

   public function ajaxShowProduct(){

          $item = "id";
          $value = $this->productId;
          $order = "id";

          $answer = ControllerProducts::ctrShowProducts($item, $value, $order);

          echo json_encode($answer);
        
    }
}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/ 

if(isset($_POST["idCategory"])){

  $codeProduct = new AjaxProducts();
  $codeProduct -> idCategory = $_POST["idCategory"];
  $codeProduct -> ajaxCreateCode();

}
/*=============================================
EDITAR PRODUCTO
=============================================*/ 

if(isset($_POST["idProduct"])){

  $editProduct = new AjaxProducts();
  $editProduct -> idProduct = $_POST["idProduct"];
  $editProduct -> ajaxEditProduct();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["getProduct"])){

  $getProduct = new AjaxProducts();
  $getProduct -> getProduct = $_POST["getProduct"];
  $getProduct -> ajaxEditProduct();

}
/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["nameProduct"])){

  $nameProduct = new AjaxProducts();
  $nameProduct -> nameProduct = $_POST["nameProduct"];
  $nameProduct -> ajaxEditProduct();

}
if(isset($_POST["productId"])){

  $editProduct = new AjaxProducts();
  $editProduct -> productId = $_POST["productId"];
  $editProduct -> ajaxShowProduct();

}