<?php

require_once "connection.php";

class ModelProducts{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlShowProducts($table, $item, $value, $order){

		if($item != null){

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY id DESC");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY $order DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE PRODUCTO
	=============================================*/
	static public function mdlIntoProducts($table, $data){
        echo '<pre>'; print_r($data); echo '</pre>';


		$stmt = Connection::connect()->prepare("INSERT INTO $table(code, title, description, stock, purchase_price, sale_price, languages, image, url, categories, trademark, isDlc) VALUES (:code, :title, :description, :stock, :purchase_price, :sale_price, :languages, :image, :url, :categories, :trademark, :isDlc)");

        $stmt->bindParam(":code", $data["code"], PDO::PARAM_INT);
        $stmt->bindParam(":title", $data["title"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
        $stmt->bindParam(":stock", $data["stock"], PDO::PARAM_STR);
        $stmt->bindParam(":purchase_price", $data["purchase_price"], PDO::PARAM_STR);
        $stmt->bindParam(":sale_price", $data["sale_price"], PDO::PARAM_STR);
        $stmt->bindParam(":languages", $data["languages"], PDO::PARAM_STR);
        $stmt->bindParam(":image", $data["image"], PDO::PARAM_STR);
        $stmt->bindParam(":url", $data["url"], PDO::PARAM_STR);
        $stmt->bindParam(":categories", $data["categories"], PDO::PARAM_STR);
        $stmt->bindParam(":trademark", $data["trademark"], PDO::PARAM_STR);
        $stmt->bindParam(":isDlc", $data["isDlc"], PDO::PARAM_STR);





		if($stmt->execute()){

			return 1;

		}else{

			return 0;
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/
	static public function mdlEditProducts($table, $data){
        echo '<pre>'; print_r($data); echo '</pre>';



	$stmt = Connection::connect()
    ->prepare("UPDATE $table SET title = :title, description = :description, stock = :stock, purchase_price = :purchase_price, sale_price = :sale_price, languages = :languages, image = :image, url = :url, categories = :categories, trademark = :trademark, isDlc = :isDlc WHERE code = :code");



        $stmt->bindParam(":code", $data["code"], PDO::PARAM_INT);
        $stmt->bindParam(":title", $data["title"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
        $stmt->bindParam(":stock", $data["stock"], PDO::PARAM_STR);
        $stmt->bindParam(":purchase_price", $data["purchase_price"], PDO::PARAM_STR);
        $stmt->bindParam(":sale_price", $data["sale_price"], PDO::PARAM_STR);
        $stmt->bindParam(":languages", $data["languages"], PDO::PARAM_STR);
        $stmt->bindParam(":image", $data["image"], PDO::PARAM_STR);
        $stmt->bindParam(":url", $data["url"], PDO::PARAM_STR);
        $stmt->bindParam(":categories", $data["categories"], PDO::PARAM_STR);
        $stmt->bindParam(":trademark", $data["trademark"], PDO::PARAM_STR);
        $stmt->bindParam(":isDlc", $data["isDlc"], PDO::PARAM_STR);




        if($stmt->execute()){

            return 1;

        }else{

            return 0;
        
        }

        $stmt->close();
        $stmt = null;

    }



	/*=============================================
	BORRAR PRODUCTO
	=============================================*/

	static public function mdlDeleteProduct($table, $data){

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

	/*=============================================
	ACTUALIZAR PRODUCTO
	=============================================*/

	static public function mdlUpdadteProducts($table, $item1, $value1, $value2){

		$stmt = Connection::connect()->prepare("UPDATE $table SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $value2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return 1;
		
		}else{

			return 0;	

		}

		$stmt -> close();

		$stmt = null;

	}
    static public function mdlIntoLanguages($table,$data){

        $stmt = Connection::connect()->prepare("INSERT INTO $table(language) VALUES(:language)");

        $stmt->bindParam(":language", $data, PDO::PARAM_STR);


        if($stmt->execute()){

            return 1;

        }else{

            return 0;
        
        }

        $stmt->close();
        $stmt = null;


    }
	/*=============================================
	MOSTRAR SUMA VENTAS (release)
	=============================================*/	

	// static public function mdlShowSumeSales($table){

	// 	$stmt = Connection::connect()->prepare("SELECT SUM(sales) as total FROM $table");

	// 	$stmt -> execute();

	// 	return $stmt -> fetch();

	// 	$stmt -> close();

	// 	$stmt = null;
	// }


}