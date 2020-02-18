<?php

class ControllerProducts{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrShowProducts($item, $value, $order){
      
		$table = "products";

		$answer = ModelProducts::mdlShowProducts($table, $item, $value, $order);

		return $answer;

	}

	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	static public function ctrCreateProducts(){

		if(isset($_POST["newDescription"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newDescription"]) &&
                     preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newTitle"]) &&
			   preg_match('/^[0-9]+$/', $_POST["newStock"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["newPurchasePrice"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["newSalePrice"])){
                  
                  /*=============================================
			VALIDAR IMAGEN
			=============================================*/

			   	$route = "resources/views/img/products/default/anonymous.png";

			   	if(isset($_FILES["newPhoto"]["tmp_name"]) && !empty($_FILES["newPhoto"]["tmp_name"])){

					list($width, $height) = getimagesize($_FILES["newPhoto"]["tmp_name"]);

					$newWidth = 500;
					$newHeight = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directory = "resources/views/img/products/".$_POST["newCode"];

					mkdir($directory, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["newPhoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$random = mt_rand(100,999);

						$route = "resources/views/img/products/".$_POST["newCode"]."/".$random.".jpg";

						$origin = imagecreatefromjpeg($_FILES["newPhoto"]["tmp_name"]);						

						$destination = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destination, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagejpeg($destination, $route);

					}

					if($_FILES["newPhoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$random = mt_rand(100,999);

						$route = "resources/views/img/products/".$_POST["nuevoCodigo"]."/".$random.".png";

						$origin = imagecreatefrompng($_FILES["newPhoto"]["tmp_name"]);						

						$destination = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destination, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagepng($destination, $route);

					}

				}
				/*=============================================
				GUARDAMOS LOS IDIOMAS
				=============================================*/
                            

				$table = "products";

				$data = array("code" => $_POST["newCode"],
                                      "title" => $_POST["newTitle"],
                                      "description" => $_POST["newDescription"],
                                      "stock" => $_POST["newStock"],
                                      "purchase_price" => $_POST["newPurchasePrice"],
                                      "sale_price" => $_POST["newSalePrice"],
                                      "languages" => $_POST["listLanguage"],
                                      "image" => $route,
                                      "url" => 'probando',
                                      "categories" => $_POST["listCategories"],
                                      "trademark" => $_POST["newTrademark"],
                                      "isDlc" => 1);

				$answer = ModelProducts::mdlIntoProducts($table, $data);

				if($answer == 1){

					echo'<script>

						swal({
							  type: "success",
							  title: "El producto ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "products";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "products";

							}
						})

			  	</script>';
			}
		}

	}

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/

	static public function ctrEditProducts(){

		if(isset($_POST["editDescription"])){
       
      		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editDescription"]) &&
                     preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editTitle"]) &&
      		   preg_match('/^[0-9]+$/', $_POST["editStock"]) &&	
      		   preg_match('/^[0-9.]+$/', $_POST["editPurchasePrice"]) &&
                     preg_match('/^[0-9.]+$/', $_POST["editSalePrice"]))
                                    {   

                        		   		/*=============================================
                        				VALIDAR IMAGEN
                        				=============================================*/

                        			   	$route = $_POST["actualPhoto"];

                        			   	if(isset($_FILES["editPhoto"]["tmp_name"]) && !empty($_FILES["editPhoto"]["tmp_name"])){

                        					list($width, $height) = getimagesize($_FILES["editPhoto"]["tmp_name"]);

                        					$newWidth = 500;
                        					$newHeight = 500;

                        					/*=============================================
                        					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                        					=============================================*/

                        					$directory = "resources/views/img/products/".$_POST["editCode"];

                        					/*=============================================
                        					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                        					=============================================*/

                        					if(!empty($_POST["actualPhoto"]) && $_POST["actualPhoto"] != "resources/views/img/products/default/anonymous.png"){

                        						unlink($_POST["actualPhoto"]);

                        					}else{

                        						mkdir($directory, 0755);	
                        					
                        					}
                        					
                        					/*=============================================
                        					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                        					=============================================*/

                        					if($_FILES["editPhoto"]["type"] == "image/jpeg"){

                        						/*=============================================
                        						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        						=============================================*/

                        						$random = mt_rand(100,999);

                        						$route = "resources/views/img/products/".$_POST["editCode"]."/".$random.".jpg";

                        						$origin = imagecreatefromjpeg($_FILES["editPhoto"]["tmp_name"]);						

                        						$destination = imagecreatetruecolor($newWidth, $newHeight);

                        						imagecopyresized($destination, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                        						imagejpeg($destination, $route);

                        					}

                        					if($_FILES["editPhoto"]["type"] == "image/png"){

                        						/*=============================================
                        						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        						=============================================*/

                        						$random = mt_rand(100,999);

                        						$route = "resources/views/img/products/".$_POST["editCode"]."/".$random.".png";

                        						$origin = imagecreatefrompng($_FILES["editPhoto"]["tmp_name"]);						

                        						$destination = imagecreatetruecolor($newWidth, $newHeight);

                        						imagecopyresized($destination, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                        						imagepng($destination, $route);

                        					}

                        				}
                                                /*=============================================
                                                GUARDAMOS LOS IDIOMAS
                                                =============================================*/
                                                 $lang = "";
                                                if(isset($_POST["languages"])){


                                                      $languages = $_POST["languages"];

                                                     

                                                      foreach ($languages as $key) {
                                                           
                                                  
                                                            $item = "language";
                                                            $value = $key;
                                                            $table = "products_languages";
                                                            $order = "id";

                                                            $answerLanguage = ModelProducts::mdlShowProducts($table,$item,$value,$order);

                                                           if(!$answerLanguage){


                                                                  $answerLang = ModelProducts::mdlIntoLanguages($table,$key);

                                                                  $item1 = "language";
                                                                  $value1 = $key;
                                                                  $table1 = "products_languages";
                                                                  $order1 = "id";

                                                                  $answerLanguage1 = ModelProducts::mdlShowProducts($table,$item1,$value1,$order1);

                                                                  $lang.= '-'.$answerLanguage1["id"];      

                                                            }else{

                                                                   $lang.='-'.$answerLanguage["id"];            
                                                            }

                                                      }
                                                            

                                                      
                                                }

                                                $cat = "";

                                                if(isset($_POST["categories"])){
                                                 

                                                      $categories = $_POST["categories"];

                                                      

                                                      foreach ($categories as $key) {
                                                  
                                                            $item = "category";
                                                            $value = $key;
                                                            $table = "products_categories";

                                                            $answerCategory = ModelCategories::mdlShowCategories($table,$item,$value);

                                                           if(!$answerCategory){


                                                                  $answerCategory= ModelCategories::mdlIntoCategory($table,$key);

                                                                  $item1 = "category";
                                                                  $value1 = $key;
                                                                  $table1 = "products_categories";
                                

                                                                  $answerCategory1 = ModelCategories::mdlShowCategories($table,$item1,$value1);

                                                                  $cat.= '-'.$answerCategory1["id"];      

                                                            }else{

                                                                   $cat.='-'.$answerCategory["id"];            
                                                            }

                                                      }
                          
                                                }

                        				$table = "products";

                                                $data = array("code" => $_POST["editCode"],
                                                              "title" => $_POST["editTitle"],
                                                              "description" => $_POST["editDescription"],
                                                              "stock" => $_POST["editStock"],
                                                              "purchase_price" => $_POST["editPurchasePrice"],
                                                              "sale_price" => $_POST["editSalePrice"],
                                                              "languages" => $lang,
                                                              "image" => $route,
                                                              "url" => 'probando',
                                                              "categories" => $cat,
                                                              "trademark" => $_POST["editTrademarkId"],
                                                              "isDlc" => 1);

                        				$answer = ModelProducts::mdlEditProducts($table, $data);
                                                echo '<pre>'; print_r($answer); echo '</pre>';

                        				if($answer == 1){

                        					echo'<script>

                        						swal({
                        							  type: "success",
                        							  title: "El producto ha sido editado correctamente",
                        							  showConfirmButton: true,
                        							  confirmButtonText: "Cerrar"
                        							  }).then(function(result){
                        										if (result.value) {

                        										window.location = "products";

                        										}
                        									})

                        						</script>';

                        				}


                                    }else{

                              			echo'<script>

                              				swal({
                              					  type: "error",
                              					  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
                              					  showConfirmButton: true,
                              					  confirmButtonText: "Cerrar"
                              					  }).then(function(result){
                              						if (result.value) {

                              						window.location = "products";

                              						}
                              					})

                              		  	</script>';
                        		}
      	}   

      }

	/*=============================================
	BORRAR PRODUCTO
	=============================================*/
	static public function ctrDeleteProduct(){

		if(isset($_GET["idProduct"])){

			$table ="products";
			$data = $_GET["idProduct"];

			if($_GET["image"] != "" && $_GET["image"] != "resources/views/img/products/default/anonymous.png"){

				unlink($_GET["image"]);
				rmdir('resources/views/img/products/'.$_GET["code"]);

			}

			$answer = ModelProducts::mdlDeleteProduct($table, $data);

			if($answer == 1){

				echo'<script>

				swal({
					  type: "success",
					  title: "El producto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "products";

								}
							})

				</script>';

			}		
		}


	}

	/*=============================================
	MOSTRAR SUMA VENTAS (release)
	=============================================*/

	// static public function ctrShowSumeSales(){

	// 	$table = "products";

	// 	$answer = ModelProducts::mdlShowSumeSales($table);

	// 	return $answer;

	// }


}