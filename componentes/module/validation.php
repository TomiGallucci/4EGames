<?php

session_start();

$_SESSION["error"] = [];

function validateEmail($email)
{ 
    return filter_var($email, FILTER_VALIDATE_EMAIL)? 1: $_SESSION["error"]["email"]["format"] = "El mail no posee el formato correcto";
}

function validatePass($password)
{ 
    if(strlen($password) < 8) $error["lenght"] = "debe contener al menos 8 caracteres";
    if(ctype_alpha($password)) $error["onlyLetter"] = "no debe contener solo letras";
    if(is_numeric($password)) $error["onlyNumbers"] = "no debe contener solo números";

    if(isset($error)){
        $_SESSION["error"]["password"] = $error;
        return false;
    }

    return true;
}

function validateFullName($name, $lastname)
{ 
    if(strlen($name) < 3) $error["lenName"] = "El nombre es muy corto";
    if(strlen($lastname) < 3) $error["lenLastName"] = "El apellido es muy corto";
    if(!ctype_alpha($name)) $error["typeName"] = "El nombre debe contener solo letras";
    if(!ctype_alpha($lastname)) $error["typeLastName"] = "El apellido debe contener solo letras";

    if(isset($error)){
        $_SESSION["error"]["username"] = $error;
        return false;
    }

    return true;

}

function validateBirthday($birthday)
{ 
    $now = new DateTime();
    $then = new DateTime($birthday);
    $diff = $now->diff($then);
    if($diff->format('%Y') < 18) {
        $_SESSION["error"]["age"] = "Debes ser mayor de 18 años para crearte una cuenta.";
        return false;
    }
    return true;
}

// function validateCandC()
// { }

function logIn($usermail, $password)
{
    $users = file_get_contents('./users.json');
    $users = json_decode($users, true);
    foreach ($users as $data) {
        var_dump($data);
        if ($data["email"] == $usermail) {
            if (password_verify($password, $data["password"])) {
                $_SESSION["userIn"] = $data;
                header("Location: ../../index.php");
            } else {
                $_SESSION["error"]["password"]["wrong"] = "La contraseña es incorrecta";
            }
            return;
        }
    }
    $_SESSION["error"]["email"]["userNoExist"] = "No existe una cuenta asociada a ese email.";
}

function registerUser($userdata)
{
    var_dump($userdata);
    $userdata["password"] = password_hash($userdata["password"], PASSWORD_DEFAULT);
    unset($userdata["btnRegistro"]);
    unset($userdata["loguedBox"]);
    $users = file_get_contents("./users.json");
    $users = json_decode($users, true);
    $users[] = $userdata;
    $users = json_encode($users);
    file_put_contents("./users.json", $users);
}

if (isset($_POST["btnLogin"])) {
    if(validateEmail($_POST["email"]) && validatePass($_POST["password"])) {
        logIn($_POST["email"], $_POST["password"], $_POST["loguedBox"]);
    }else{
        header("Location: ../../login.php");
    }
}

if (isset($_POST["btnRegistro"])) {
    if(validateFullName($_POST["name"], $_POST["lastname"]) && validateEmail($_POST["email"]) && validatePass($_POST["password"]) && validateBirthday($_POST["birthday"])) {
        registerUser($_POST);
        header("Location: ../../login.php");
    }
    // header("Location: ../../registro.php");
}

if(isset($_POST["btnCancelRegistro"])){
    header("Location: ../../index.php");
}

if (isset($_GET["closeSession"])) {
    session_destroy();
    header("Location: ../../index.php");
}
