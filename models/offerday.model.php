<?php 

require_once "connection.php";


class ModelOfferday{



    static public function mdlIntoOfferday($table, $data){
        echo '<pre>'; print_r($data); echo '</pre>';

        $stmt = Connection::connect()->prepare("INSERT INTO $table(price_discount, discount, date_limit, product_id) VALUES (:price_discount, :discount, :date_limit, :product_id)");

        $stmt->bindParam(":price_discount", $data["price_discount"], PDO::PARAM_STR);
        $stmt->bindParam(":discount", $data["discount"], PDO::PARAM_STR);
        $stmt->bindParam(":date_limit", $data["date_limit"], PDO::PARAM_STR);
        $stmt->bindParam(":product_id", $data["product_id"], PDO::PARAM_STR);


        if($stmt->execute()){

            return 1;

        }else{

            return 0;
        
        }

        $stmt->close();
        $stmt = null;

    }

    static public function mdlUpdateOfferday($table, $item1, $value1, $item2, $value2){

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

    static public function mdlShowOfferday($table, $item, $value){

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


    static public function mdlEditOfferday($table, $data){
        echo '<pre>'; print_r($data); echo '</pre>';


        $stmt = Connection::connect()->prepare("UPDATE $table SET price_discount = :price_discount, discount =  :discount, date_limit = :date_limit WHERE product_id = :product_id");

        $stmt->bindParam(":price_discount", $data["price_discount"], PDO::PARAM_STR);
        $stmt->bindParam(":discount", $data["discount"], PDO::PARAM_STR);
        $stmt->bindParam(":date_limit", $data["date_limit"], PDO::PARAM_STR);
        $stmt->bindParam(":product_id", $data["product_id"], PDO::PARAM_STR);



        if($stmt->execute()){

            return 1;

        }else{

            return 0;
        
        }

        $stmt->close();
        $stmt = null;

    }



    static public function mdlDeleteOfferday($table, $data){

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

