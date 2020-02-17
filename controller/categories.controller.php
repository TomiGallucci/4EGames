<?php 

class ControllerCategories{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCreateCategory(){

		if(isset($_POST["newCategory"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newCategory"])){

				$table = "products_categories";

				$data = $_POST["newCategory"];

				$anwser = ModelCategories::mdlIntoCategory($table, $data);

				if($anwser == 1){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categories";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categories";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrShowCategories($item, $value){

		$table = "products_categories";

		$anwser = ModelCategories::mdlShowCategories($table, $item, $value);


		return $anwser;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditCategory(){

		if(isset($_POST["editCategory"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editCategory"])){

				$table = "products_categories";

				$data = array("category"=>$_POST["editCategory"],
							   "id"=>$_POST["idCategory"]);

				$anwser = ModelCategories::mdlEditCategories($table, $data);

				if($anwser == 1){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categories";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categories";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrDeleteCategory(){

		if(isset($_GET["idCategories"])){

			$table ="products_categories";
			$data = $_GET["idCategories"];

			$anwser = ModelCategories::mdlDeleteCategories($table, $data);

			if($anwser == 1){

				echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categories";

									}
								})

					</script>';
			}
		}
		
	}
}
