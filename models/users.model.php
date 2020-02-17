<?php 

require_once "connection.php";

class ModelUsers{

	static public function mdlIntoUser($table, $data)
	{

		$stmt = Connection::connect()->prepare("INSERT INTO $table(name, lastname, email, password,  image, birthday, status, tyc) VALUES (:name, :lastname, :email, :password,  :image, :birthday, :status, :tyc)");

		$stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt->bindParam(":lastname",  $data["lastname"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
		$stmt->bindParam(":image",  $data["image"], PDO::PARAM_STR);
		$stmt->bindParam(":birthday",  $data["birthday"], PDO::PARAM_STR);
		$stmt->bindParam(":status",  $data["birthday"], PDO::PARAM_STR);
		$stmt->bindParam(":tyc", $data["tyc"], PDO::PARAM_STR);

		if($stmt->execute()){

			return 1;	

		}else{

			return 0;
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	static public function mdlShowUsers($table, $item, $value)
	{

	if($item != null){

		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

	}else{

		$stmt = Connection::connect()->prepare("SELECT * FROM $table");

		$stmt -> execute();

		return $stmt -> fetchAll();

	}
	

	$stmt -> close();

	$stmt = null;

	}

	static public function mdlUpdateUser($table, $item1, $value1, $item2, $value2){

		$stmt = Connection::connect()->prepare("UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return 1;
		
		}else{

			return 0;	

		}

		$stmt -> close();

		$stmt = null;

	}
	static public function mdlEditUser($table,$data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET name = :name, lastname = :lastname, password = :password,  image = :image, birthday = :birthday, tyc = :tyc WHERE email = :email");

		$stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt->bindParam(":lastname",  $data["lastname"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
		$stmt->bindParam(":image",  $data["image"], PDO::PARAM_STR);
		$stmt->bindParam(":birthday",  $data["birthday"], PDO::PARAM_STR);
		$stmt->bindParam(":tyc", $data["tyc"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return 1;
		
		}else{

			return 0;	

		}



	}
	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlDeleteUser($table, $data){

		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");

		$stmt -> bindParam(":id", $data, PDO::PARAM_INT);

		if($stmt -> execute()){

			return 1;
		
		}else{

			return 0;	

		}

		$stmt -> close();

		$stmt = null;


	}
}