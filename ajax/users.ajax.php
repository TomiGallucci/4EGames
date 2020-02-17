<?php 


require_once "../controller/users.controller.php";
require_once "../models/users.model.php";

class AjaxUser {

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validateUser;

	public function ajaxValidateUser(){

		$item = "email";
		$value = $this->validateUser;

		$answer = ControllerUsers::ctrShowUsers($item, $value);

		echo json_encode($answer);

	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idUser;

	public function ajaxEditUser(){

		$item = "id";
		$value = $this->idUser;

		$answer = ControllerUsers::ctrShowUsers($item, $value);

		echo json_encode($answer);

	}
	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public $activateUser;
	public $activateId;


	public function ajaxActiveUser(){

		$table = "users";

		$item1 = "status";
		$value1 = $this->activateUser;

		$item2 = "id";
		$value2 = $this->activateId;

		$answer = ModelUsers::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

	}

}
/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validateUser"])){

	$userValidate = new AjaxUser();
	$userValidate -> validateUser = $_POST["validateUser"];
	$userValidate -> ajaxValidateUser();

}
/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idUser"])){

	$edit = new AjaxUser();
	$edit -> idUser = $_POST["idUser"];
	$edit -> ajaxEditUser();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activateUser"])){

	$activateUsers = new AjaxUser();
	$activateUsers -> activateUser = $_POST["activateUser"];
	$activateUsers -> activateId = $_POST["activateId"];
	$activateUsers -> ajaxActiveUser();

}