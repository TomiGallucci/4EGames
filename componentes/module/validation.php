<?php

session_start();

$_SESSION["error"] = [];

function validateEmail($email)
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 1;
    }else{
        $_SESSION["error"]["email"]["format"] = "El mail no posee el formato correcto.";
        return 0;
    }
}

function validatePass($password)
{
    if (strlen($password) < 8) $error["lenght"] = "La contraseña debe contener al menos 8 caracteres.";
    if (ctype_alpha($password)) $error["onlyLetters"] = "La contraseña no debe contener solo letras.";
    if (is_numeric($password)) $error["onlyNumbers"] = "La contraseña no debe contener solo números.";

    if (isset($error)) {
        $_SESSION["error"]["password"] = $error;
        return 0;
    }

    return 1;
}

function comparePass($pass1, $pass2){
    if($pass1 == $pass2){
        return 1;
    }else{
        $_SESSION["error"]["password"]["distintosPass"] = "Las contraseñas son diferentes.";
        return 0;
    }
}

function validateFullName($name, $lastname)
{
    if (strlen($name) < 3) $error["name"]["lenght"] = "El nombre es muy corto";
    if (strlen($lastname) < 3) $error["lastname"]["lenght"] = "El apellido es muy corto";
    if (!ctype_alpha($name)) $error["name"]["type"] = "El nombre debe contener solo letras";
    if (!ctype_alpha($lastname)) $error["lastname"]["type"] = "El apellido debe contener solo letras";

    if (isset($error)) {
        $_SESSION["error"] = $error;
        return 0;
    }

    return 1;
}

function validateBirthday($birthday)
{
    $now = new DateTime();
    $then = new DateTime($birthday);
    $diff = $now->diff($then);
    if ($diff->format('%Y') < 18) {
        $_SESSION["error"]["age"] = "Debes ser mayor de 18 años para crearte una cuenta.";
        return 0;
    }
    return 1;
}

function validatePicture($file)
{
    if($file["error"] == 0){
        return 1;
    }else{
        $_SESSION["error"]["imgProfile"] = "Debe cargar una imagen de perfil. En caso de haberlo echo, cambie de imagen.";
        return 0;
    }
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
        if ($data["email"] == $usermail) {
            if (password_verify($password, $data["password"])) {
                $_SESSION["userIn"] = $data;
                header("Location: ../../index.php");
            } else {
                $_SESSION["error"]["password"]["wrong"] = "La contraseña es incorrecta";
                header("Location: ../../login.php");
            }
            return;
        }
    }
    $_SESSION["error"]["email"]["userNoExiste"] = "No existe una cuenta asociada a ese email.";
    header("Location: ../../login.php");
}

function changePass($mail, $pass){
    $users = file_get_contents("users.json");
    $users = json_decode($users, true);
    $cont = 0;
    foreach ( $users as $index => $user ){
        if($mail == $user["email"]){
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $users[$index]["password"] = $pass;
        }else{
            $cont += 1;
        }
    }
    if($cont == count($users)) {
        $_SESSION["error"]["email"]["userNoExiste"] = "No existe una cuenta asociada a ese email.";
        return 0;
    }
    $newUsers = json_encode($users);
    file_put_contents("users.json", $newUsers);
}

function registerUser($userdata, $file)
{
    $userdata["password"] = password_hash($userdata["password"], PASSWORD_DEFAULT);
    unset($userdata["btnRegistro"]);
    // unset($userdata["remember"]);
    $users = file_get_contents("./users.json");     // trae los usuarios registrados
    $users = json_decode($users, true);     // decodea de json a arrays asosiados
    $email = $userdata["email"];
    $dataFile = $file["tmp_name"];      // guarda el codigo de la imagen
    // $ext = $file["name"];
    // $ext = pathinfo($ext, PATHINFO_EXTENSION);
    $pictureDir = dirname(__FILE__, 3);     // guardo el path de la carpeta raiz
    $pictureDir = $pictureDir . "/css/perfilPictures/";     // armo el path de la carpeta donde deseo guardar la foto
    $pictureDir = $pictureDir . $email . ".jpg";        // termino el path con nombre y extension de la imagen
    move_uploaded_file($dataFile, $pictureDir);     // guardo la imagen
    $users[] = $userdata;
    $users = json_encode($users);
    file_put_contents("./users.json", $users);
}

function editUser($userNewData, $userOldData, $foto)
{
    // var_dump($foto);exit;
    unset($userNewData["btnEdicion"]);
    $users = file_get_contents("users.json");
    $users = json_decode($users, true);
    foreach ($users as $index => $user) {
        if ($user["email"] == $userOldData["email"]) {
            foreach ($userNewData as $key => $value) {
                if ($userNewData[$key] != $userOldData[$key]) $users[$index][$key] = $value;
            }
        }
    }
    $dirChangeImg = dirname(__file__, 3);
    if($userNewData["email"] != $userOldData["email"]){
        $newEmail = $userNewData["email"];
        $oldEmail = $userOldData["email"];
        rename("$dirChangeImg/css/perfilPictures/$oldEmail.jpg", "$dirChangeImg/css/perfilPictures/$newEmail.jpg");
    }
    $_SESSION["userIn"] = $userNewData;
    $users = json_encode($users);
    file_put_contents("users.json", $users);

    if($foto["error"] == 0){
        $dirChangeImg = $dirChangeImg . "/css/perfilPictures/" . $_SESSION["userIn"]["email"] . ".jpg";
        move_uploaded_file($foto["tmp_name"], $dirChangeImg);
    }
}

if (isset($_POST["btnLogin"])) {
    if ($_POST["remember"]) {
        setcookie("usermail", $_POST["email"], 0, "/");
    } else {
        setcookie("usermail", "", time() - 1, "/");
    }
    $count = validateEmail($_POST["email"]);
    $count += validatePass($_POST["password"]);
    if ($count == 2) {
        logIn($_POST["email"], $_POST["password"]);
    } else {
        header("Location: ../../login.php");
    }
}

if(isset($_POST["btnPassChange"])){
    $pass1 = $_POST["password1"];
    $pass2 = $_POST["password2"];
    $mail = $_POST["email"];
    $count = validatePass($pass1) + comparePass($pass1, $pass2) + validateEmail($mail);
    if($count == 3){
        changePass($mail, $pass);
        header("Location: ../../login.php");
    }else{
        header("Location: ../../changepass.php");
    }
}

if (isset($_POST["btnRegistro"])) {
    $count = validateFullName($_POST["name"], $_POST["lastname"]) + validateEmail($_POST["email"]) + validatePass($_POST["password"]) + validateBirthday($_POST["birthday"]) + validatePicture($_FILES["fotoCarnet"]);
    if ($count == 5) {
        registerUser($_POST, $_FILES["fotoCarnet"]);
        header("Location: ../../login.php");
    }else{
        header("Location: ../../registro.php");
    }
}

if (isset($_POST["btnEdicion"])) {
    $count = validateFullName($_POST["name"], $_POST["lastname"]) + validateEmail($_POST["email"]) + validateBirthday($_POST["birthday"]);
    if ($count == 3){
        editUser($_POST, $_SESSION["userIn"], $_FILES["fotoCarnet"]);
        header("Location: ../../perfilusuario.php");
    }else{
        header("Location: ../../editarPerfil.php");
    }
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
