<?php

require_once "../controller/products.controller.php";
require_once "../models/products.model.php";

require_once "../controller/categories.controller.php";
require_once "../models/categories.model.php";


class TableProducts{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

	public function showTableProducts(){

		$item = null;
    	$value = null;
    	$order = "id";

  		$products = ControllerProducts::ctrShowProducts($item, $value, $order);	
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($products); $i++){

		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/ 

		  	$image = "<img src='".$products[$i]["image"]."' >";

		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
  			=============================================*/ 

            $categoryProduct = $products[$i]["categories"];

		  	$item = "id";

		  	/*=============================================
 	 		STOCK
  			=============================================*/ 

  			if($products[$i]["stock"] <= 3){

  				$stock = "<button class='btn btn-danger'>".$products[$i]["stock"]."</button>";

  			}else if($products[$i]["stock"] > 3 && $products[$i]["stock"] <= 5){

  				$stock = "<button class='btn btn-warning'>".$products[$i]["stock"]."</button>";

  			}else{

  				$stock = "<button class='btn btn-success'>".$products[$i]["stock"]."</button>";

  			}
  			/*=============================================
 	 		Languages
  			=============================================*/ 
  	
  			$languages = $products[$i]["languages"];

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

		  	$button =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProduct='".$products[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$products[$i]["id"]."' code='".$products[$i]["code"]."' image='".$products[$i]["image"]."'><i class='fa fa-times'></i></button></div>"; 

		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$image.'",
			      "'.$products[$i]["code"].'",
			      "'.$products[$i]["title"].'",
			      "'.$products[$i]["description"].'",
			      "'.$stock.'",
			      "'.$products[$i]["purchase_price"].'",
			      "'.$products[$i]["sale_price"].'",
                  "'.$languages.'",
                  "'.$categoryProduct.'",
                  "'.$products[$i]["trademark"].'",
                  "'.$products[$i]["date"].'",
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
$activarProductos = new TableProducts();
$activarProductos -> showTableProducts();

