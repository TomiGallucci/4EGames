<?php 


class ControllerUsers{

	static public function ctrCreateUser()
	{
		$_SESSION["error"] = [];

		if(isset($_POST["newEmail"])){

			if(filter_var($_POST["newEmail"], FILTER_VALIDATE_EMAIL)) {
		        $_SESSION["dataCorrect"]["email"] = $_POST["newEmail"];
		

		    }else{
		       $_SESSION["error"]["email"]["format"] = "El mail no posee el formato correcto.";
			

		    }


	        if (strlen($_POST["newPassword"]) < 8) $error["lenght"] = "La contraseña debe contener al menos 8 caracteres.";
		    if (ctype_alpha($_POST["newPassword"])) $error["onlyLetters"] = "La contraseña no debe contener solo letras.";
		    if (is_numeric($_POST["newPassword"])) $error["onlyNumbers"] = "La contraseña no debe contener solo números.";
			

		    if (isset($error)) {
		        $_SESSION["error"]["password"] = $error;
			

		    }

		    if($_POST["newPassword"] != $_POST["newVerifyPassword"]){

		        $_SESSION["error"]["password"]["distintosPass"] = "Las contraseñas son diferentes.";
			

		    }

		    $_SESSION["error"] = []; 
        	$_SESSION["dataCorrect"] = [];



			if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $_POST["newEmail"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["newPassword"])){

			$encryp = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);
			if($_POST["newTyCandP"] == "on"){
				$TyC= 1;

			}
			$data = array("email" => $_POST["newEmail"],
				           "password" => $encryp,
				           "tyc" => $TyC,
				           "name" => '',
				       	   "lastname" => '',
				       	   "image" => '',
				       	   "birthday" => '',
				       	   "status" => 1);

			$table = "users";

			$answer = ModelUsers::mdlIntoUser($table, $data);	

				if($answer == 1){

					echo '<script>
							
							
								swal({

									type: "success",
									title: "¡El usuario ha sido creado correctamente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){

									if(result.value){
									
										window.location = "login-page";

									}

								});
							
						</script>';

				}else{

						echo '<script>
							
							
									swal({

										type: "error",
										title: "¡El usuario no ha podido crearse correctamente!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar"

									}).then(function(result){

										if(result.value){
										
											window.location = "register-page";

										}

									});
								
							</script>';


				}
			}else{

					echo '<script>

							swal({

								type: "error",
								title: "¡El email no cumple un formato valido!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){
								
									window.location = "register-page";

								}

							});
						

						</script>';
			}

			
		

		}


	} 
	static public function ctrLoginUser()
	{

		if(isset($_POST["inputEmail"])){

			if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $_POST["inputEmail"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["inputPassword"])){

				$table = "users";
				$item = "email";
				$value = $_POST["inputEmail"];

				$answerUser = ModelUsers::mdlShowUsers($table,$item,$value);

				$decryp = password_verify($_POST["inputPassword"], $answerUser["password"]);
	
				if($answerUser["email"] == $_POST["inputEmail"] && $decryp == 1){

					if($answerUser["status"] == 1){				
					
								$_SESSION["sessionOn"] = "ok";
								$_SESSION["id"] =  $answerUser["id"];

							if($answerUser["name"] == '' && $answerUser["lastname"] == ''){

								echo '<script>
				
										window.location = "profile";

									</script>';

							}else{
								$_SESSION["name"] =  $answerUser["name"];
								$_SESSION["lastname"] = $answerUser["lastname"];
								$_SESSION["email"] =  $answerUser["email"];
								$_SESSION["photo"] =  $answerUser["image"];
							}
							
							if($answerUser["isAdmin"] == 1){

								$_SESSION["isAdmin"] = 1;

							}


							/*=============================================
							REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
							=============================================*/

							date_default_timezone_set('America/Argentina/Buenos_Aires');

							$date = date('Y-m-d');
							$hour = date('H:i:s');

							$actualDate = $date.' '.$hour;

							$item1 = "last_login";
							$value1 = $actualDate;

							$item2 = "id";
							$value2 = $answerUser["id"];

							$lastLogin = ModelUsers::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

							if($lastLogin == 1){

								echo '<script>

									window.location = "home";

								</script>';


							}	


					}else{

					echo '<br>
							<div class="alert alert-danger">El usuario aún no está activado</div>';

				}
				
			}else{
						echo '<script>
								
								
										swal({

											type: "error",
											title: "¡El usuario no existe. Por favor, registrese!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar"

										}).then(function(result){

											if(result.value){
												
												window.location = "register-page";
												
											}

										});
									
								</script>';
					}

		}

	}
}

	static public function ctrShowUsers($item,$value)
	{

		$table = "users";

		$answer = ModelUsers::mdlShowUsers($table, $item, $value);

		return $answer;	

	}
	static public function ctrEditUser()
	{

	  if(isset($_POST["editEmail"])){

		if (strlen($_POST["editName"]) < 3) $error["name"]["lenght"] = "El nombre es muy corto";
 	    if (!ctype_alpha($_POST["editName"])) $error["name"]["type"] = "El nombre debe contener solo letras";
	    if (strlen($_POST["editLastname"]) < 3) $error["lastname"]["lenght"] = "El apellido es muy corto";
	    if (!ctype_alpha($_POST["editLastname"])) $error["lastname"]["type"] = "El apellido debe contener solo letras";
	    
	    
	    !isset($error["name"])? $_SESSION["dataCorrect"]["name"] = $_POST["editName"]: 0;
	    !isset($error["lastname"])? $_SESSION["dataCorrect"]["lastname"] = $_POST["editLastname"]: 0;
	    
	    if (isset($error)) {
	        $_SESSION["error"] = $error;
	    }
	    $now = new DateTime();
	    $then = new DateTime($_POST["editBirthday"]);
	    $diff = $now->diff($then);
	    if ($diff->format('%Y') < 18) {
	        $_SESSION["error"]["age"] = "Debes ser mayor de 18 años para crearte una cuenta.";
	        return 0;
	    }
	    $_SESSION["dataCorrect"]["birthday"] = $_POST["editBirthday"];

			/*=============================================
			VALIDAR IMAGEN
			=============================================*/


			$route = $_POST["actualPhoto"];

			if(isset($_FILES["newPhoto"]["tmp_name"]) && !empty($_FILES["newPhoto"]["tmp_name"])){

				list($width, $height) = getimagesize($_FILES["newPhoto"]["tmp_name"]);

				$newWidth = 500;
				$newHeight = 500;




				$directory = "resources/views/img/users/".$_POST["editEmail"];


				if(!empty($_POST["actualPhoto"])){

					unlink($_POST["actualPhoto"]);

				}else{

					mkdir($directory, 0755);

				}	

		
				if($_FILES["newPhoto"]["type"] == "image/jpeg"){

				

					$random = mt_rand(100,999);

					$route = "resources/views/img/users/".$_POST["editEmail"]."/".$random.".jpg";

					$origin = imagecreatefromjpeg($_FILES["newPhoto"]["tmp_name"]);						

					$destination = imagecreatetruecolor($newWidth, $newHeight);

					imagecopyresized($destination, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

					imagejpeg($destination, $route);

				}

				if($_FILES["newPhoto"]["type"] == "image/png"){

					$random = mt_rand(100,999);

					$route = "resources/views/img/users/".$_POST["editEmail"]."/".$random.".png";

					$origin = imagecreatefrompng($_FILES["newPhoto"]["tmp_name"]);						

					$destination = imagecreatetruecolor($newWidth, $newHeight);

					imagecopyresized($destination, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

					imagepng($destination, $route);

				}

			}

			$table = "users";

			if($_POST["editPassword"] != ""){

				if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editPassword"])){

					$encryp = password_hash($_POST["editPassword"], PASSWORD_DEFAULT);

				}

			}else{

				$encryp = $_POST["actualPassword"];

			}

			$data = array("name" => $_POST["editName"],
						   "lastname" => $_POST["editLastname"],
						   "email" => $_POST["editEmail"],
						   "password" => $encryp,
						   "birthday" => $_POST["editBirthday"],
						   "image" => $route,
						   "tyc" => $_POST["editTyc"]);

	
			$answer = ModelUsers::mdlEditUser($table, $data);

			/*=============================================
			REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
			=============================================*/

			date_default_timezone_set('America/Argentina/Buenos_Aires');

			$date = date('Y-m-d');
			$hour = date('H:i:s');

			$actualDate = $date.' '.$hour;

			$item1 = "updated_at";
			$value1 = $actualDate;

			$item2 = "id";
			if(isset($_SESSION["id"])) {
				$value2 = $_SESSION["id"];
			}else {
				$value2 = null;
			}
			

			$updateAt = ModelUsers::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

			if($answer == 1){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido editado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

						

								}
							})

				</script>';

			}else {
				echo'<script>

				swal({
					  type: "error",
					  title: "El usuario no se ha podido editar",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

						

								}
							})

				</script>';
			}


		}


	}
	static public function ctrDeleteUser()
	{

		if(isset($_GET["idUser"])){

			$table ="users";
			$data = $_GET["idUser"];

			if($_GET["photoUser"] != ""){

				unlink($_GET["photoUser"]);
				rmdir('resources/views/img/users/'.$_GET["emailUser"]);

			}

			$answer = ModelUsers::mdlDeleteUser($table, $data);

			if($answer == 1){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "users";

								}
							})

				</script>';

			}		

		}

	}


}
