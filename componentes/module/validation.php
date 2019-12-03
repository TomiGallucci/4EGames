<?php

session_start();

$_SESSION["error"] = [];

function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? 1 : $_SESSION["error"]["email"]["format"] = "El mail no posee el formato correcto";
}

function validatePass($password)
{
    if (strlen($password) < 8) $error["lenght"] = "debe contener al menos 8 caracteres";
    if (ctype_alpha($password)) $error["onlyLetter"] = "no debe contener solo letras";
    if (is_numeric($password)) $error["onlyNumbers"] = "no debe contener solo números";

    if (isset($error)) {
        $_SESSION["error"]["password"] = $error;
        return false;
    }

    return true;
}

function validateFullName($name, $lastname)
{
    if (strlen($name) < 3) $error["lenName"] = "El nombre es muy corto";
    if (strlen($lastname) < 3) $error["lenLastName"] = "El apellido es muy corto";
    if (!ctype_alpha($name)) $error["typeName"] = "El nombre debe contener solo letras";
    if (!ctype_alpha($lastname)) $error["typeLastName"] = "El apellido debe contener solo letras";

    if (isset($error)) {
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
    if ($diff->format('%Y') < 18) {
        $_SESSION["error"]["age"] = "Debes ser mayor de 18 años para crearte una cuenta.";
        return false;
    }
    return true;
}

function validatePicture($file)
{
    return $file["error"] == 0;
}

// function validateCandC()
// {    API to use
//     https://raw.githubusercontent.com/David-Haim/CountriesToCitiesJSON/master/countriesToCities.json
// }

function logIn($usermail, $password)
{
    $users = file_get_contents('./users.json');
    $users = json_decode($users, true);
    foreach ($users as $data) {
        // var_dump($data);
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
    $_SESSION["error"]["email"]["userNoExiste"] = "No existe una cuenta asociada a ese email.";
}

function changePass($mail, $pass){
    $users = file_get_contents("users.json");
    $users = json_decode($users, true);
    foreach ( $users as $index => $user ){
        if($mail == $user["email"]){
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $users[$index]["password"] = $pass;
        }
    }
    $newUsers = json_encode($users);
    file_put_contents("users.json", $newUsers);
}

function registerUser($userdata, $file)
{
    $userdata["password"] = password_hash($userdata["password"], PASSWORD_DEFAULT);
    unset($userdata["btnRegistro"]);
    unset($userdata["remember"]);
    $users = file_get_contents("./users.json");
    $users = json_decode($users, true);
    $email = $userdata["email"];
    $dataFile = $file["tmp_name"];
    $ext = $file["name"];
    $ext = pathinfo($ext, PATHINFO_EXTENSION);
    $pictureDir = dirname(__FILE__, 3);
    $pictureDir = $pictureDir . "/css/perfilPictures/";
    $pictureDir = $pictureDir . $email . ".jpg";
    move_uploaded_file($dataFile, $pictureDir);
    $users[] = $userdata;
    $users = json_encode($users);
    file_put_contents("./users.json", $users);
}

function editUser($userNewData, $userOldData)
{
    unset($userNewData["btnEdicion"]);
    $users = file_get_contents("users.json");
    $users = json_decode($users, true);
    foreach ($users as $index => $user) {
        if ($user["email"] == $userOldData["email"]) {
            foreach ($userNewData as $key => $value) {
                if ($userNewData[$key] != $userOldData[$key]) $users[$index][$key] = $value;
            }
            var_dump($users);
        }
    }
    if($userNewData["email"] != $userOldData["email"]){
        $newEmail = $userNewData["email"];
        $oldEmail = $userOldData["email"];
        $dirChangeImg = dirname(__file__, 3);
        rename("$dirChangeImg/css/perfilPictures/$oldEmail.jpg", "$dirChangeImg/css/perfilPictures/$newEmail.jpg");
    }
    $_SESSION["userIn"] = $userNewData;
    $users = json_encode($users);
    file_put_contents("users.json", $users);
}

if (isset($_POST["btnLogin"])) {
    if (validateEmail($_POST["email"]) && validatePass($_POST["password"])) {
        if ($_POST["remember"]) {
            setcookie("usermail", $_POST["email"], 0, "/");
        } else {
            setcookie("usermail", "", time() - 1, "/");
        }
        logIn($_POST["email"], $_POST["password"]);
    } else {
        header("Location: ../../login.php");
    }
    var_dump($_SESSION["error"]);
}

if(isset($_POST["btnPassChange"])){
    $pass = $_POST["password1"];
    $mail = $_POST["email"];
    if($_POST["password1"] == $_POST["password2"]){
        if(validatePass($pass)){
            changePass($mail, $pass);
            header("Location: ../../login.php");
        }else{
            // INCORRECT FORMAT FOR A PASSWORD
        }
    }else{
        // != PASSWORDS
    }
    var_dump($_SESSION["error"]);
}

if (isset($_POST["btnRegistro"])) {
    if (validateFullName($_POST["name"], $_POST["lastname"]) && validateEmail($_POST["email"]) && validatePass($_POST["password"]) && validateBirthday($_POST["birthday"]) && validatePicture($_FILES["fotoCarnet"])) {
        registerUser($_POST, $_FILES["fotoCarnet"]);
        // if ($_POST["remember"]) {
        //     setcookie("usermail", $_POST["email"], 0, "/login.php");
        // } else {
        //     setcookie("usermail", "", time() - 1, "/login.php");
        // }

        header("Location: ../../login.php");
    }
    var_dump($_SESSION["error"]);
    // header("Location: ../../registro.php");
}

if (isset($_POST["btnEdicion"])) {
    if (validateFullName($_POST["name"], $_POST["lastname"]) && validateEmail($_POST["email"]) && validateBirthday($_POST["birthday"])) {
        editUser($_POST, $_SESSION["userIn"]);
        header("Location: ../../index.php");
    }
    var_dump($_SESSION["error"]);
}

if (isset($_POST["btnCancelEdicion"])) {
    header("Location: ../../perfilusuario.php");
}

if (isset($_POST["btnCancelRegistro"])) {
    header("Location: ../../index.php");
}

if (isset($_GET["closeSession"])) {
    session_destroy();
    header("Location: ../../index.php");
}
