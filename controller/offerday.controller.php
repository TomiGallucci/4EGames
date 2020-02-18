<?php 


class ControllerOfferday{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCreateOfferday(){

		if(isset($_POST["newProducts"])){

			if(preg_match('/^[0-9.]+$/', $_POST["newProducts"]) &&
                     preg_match('/^[0-9.]+$/', $_POST["newPercentage"])){

				$table = "products_offerday";

				$data = array("price_discount" =>  $_POST["newDiscountPrice"],
                                      "discount" =>  $_POST["newPercentage"],
                                      "date_limit" => $_POST["timeEnd"],
                                      "product_id" => $_POST["newProducts"]);
                        var_dump($data);
				$anwser = ModelOfferday::mdlIntoOfferday($table, $data);

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

	static public function ctrShowOfferday($item, $value){

		$table = "products_offerday";

		$anwser = ModelOfferday::mdlShowOfferday($table, $item, $value);


		return $anwser;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditOfferday(){

		if(isset($_POST["editOfferday"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editOfferday"])){

				$table = "products_offerday";

				$data = array("trademark"=>$_POST["editOfferday"],
							   "id"=>$_POST["idOfferday"]);

				$anwser = ModelOfferday::mdlEditOfferday($table, $data);

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

	static public function ctrDeleteOfferday(){

		if(isset($_GET["idOfferday"])){

			$table ="products_offerday";
			$data = $_GET["idOfferday"];

			$anwser = ModelOfferday::mdlDeleteOfferday($table, $data);

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
