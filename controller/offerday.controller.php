<?php 
class ControllerOfferdays{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCreateOfferday(){

		if(isset($_POST["newOfferday"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newOfferday"]) && 
                     preg_match('/^[0-9.]+$/', $_POST["newDiscountPrice"]) &&
                     preg_match('/^[0-9.]+$/', $_POST["newDiscount"])){

				$table = "products_offerday";

				$data = array("price_discount" =>  $_POST["newDiscountPrice"],
                                      "discount" =>  $_POST["newDiscount"],
                                      "date_limit" => $_POST["newDateLimit"],
                                      "product_id" => $_POST["productId"]);

				$anwser = ModelOfferday::mdlIntoOfferdays($table, $data);

				if($anwser == 1){

					echo'<script>

					swal({
						  type: "success",
						  title: "La oferta ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "offerday";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La oferta no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "offerday";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrShowOfferdays($item, $value){

		$table = "products_offerday";

		$anwser = ModelOfferday::mdlShowOfferdays($table, $item, $value);


		return $anwser;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditOfferdays(){

		if(isset($_POST["editOfferday"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editOfferday"])){

				$table = "products_offerday";

				$data = array("trademark"=>$_POST["editOfferday"],
							   "id"=>$_POST["idOfferday"]);

				$anwser = ModelOfferday::mdlEditOfferdays($table, $data);

				if($anwser == 1){

					echo'<script>

					swal({
						  type: "success",
						  title: "La oferta ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "offerday";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La oferta no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "offerday";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrDeleteOfferdays(){

		if(isset($_GET["idOfferday"])){

			$table ="products_offerday";
			$data = $_GET["idOfferday"];

			$anwser = ModelOfferday::mdlDeleteOfferdays($table, $data);

			if($anwser == 1){

				echo'<script>

					swal({
						  type: "success",
						  title: "La oferta ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "offerday";

									}
								})

					</script>';
			}
		}
		
	}
}
