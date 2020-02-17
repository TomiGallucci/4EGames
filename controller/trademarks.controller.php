<?php 

class ControllerTrademarks{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCreateTrademarks(){

		if(isset($_POST["newTrademark"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newTrademark"])){

				$table = "products_trademarks";

				$data = $_POST["newTrademark"];

				$anwser = ModelTrademark::mdlIntoTrademarks($table, $data);

				if($anwser == 1){

					echo'<script>

					swal({
						  type: "success",
						  title: "La empresa ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "trademarks";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La empresa no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "trademarks";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrShowTrademarks($item, $value){

		$table = "products_trademarks";

		$anwser = ModelTrademark::mdlShowTrademarks($table, $item, $value);


		return $anwser;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditTrademarks(){

		if(isset($_POST["editTrademark"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editTrademark"])){

				$table = "products_trademarks";

				$data = array("trademark"=>$_POST["editTrademark"],
							   "id"=>$_POST["idTrademark"]);

				$anwser = ModelTrademark::mdlEditTrademarks($table, $data);

				if($anwser == 1){

					echo'<script>

					swal({
						  type: "success",
						  title: "La empresa ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "trademarks";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La empresa no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "trademarks";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrDeleteTrademarks(){

		if(isset($_GET["idTrademarks"])){

			$table ="products_trademarks";
			$data = $_GET["idTrademarks"];

			$anwser = ModelTrademark::mdlDeleteTrademarks($table, $data);

			if($anwser == 1){

				echo'<script>

					swal({
						  type: "success",
						  title: "La empresa ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "trademarks";

									}
								})

					</script>';
			}
		}
		
	}
}
