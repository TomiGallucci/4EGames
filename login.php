<?php
if(isset($_COOKIE["usermail"])){
    $useremail = $_COOKIE["usermail"];
    $rememberMe = "checked";
}else{
    $useremail = "";
    $rememberMe = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('./componentes/module/head.php');?>


<?php $errores = isset($_SESSION["error"])? $_SESSION["error"]: [];?>

<body>
    <?php include('./componentes/module/header.php'); ?>
    <div class="fondo">
        <div class="container">
            <div>
                <h1>Ingresar a 4EGames</h1>
            </div>
            <form action="./componentes/module/validation.php" method="POST">
                <div>
                    <label for="email">
                        Email
                    </label>
                    <input type="email" id="" name="email" value="<?= $useremail ?>" required>
                    <?php if(isset($errores["email"])){
                        foreach ( $errores["email"] as $key => $value ){
                            echo "<li style='color:red;'><small>$value</small></li>";
                        }
                    } ?>
                </div>
                <div>
                    <label for="password">
                        Contraseña
                    </label>
                    <input type="password" id="" name="password" required>
                    <?php if(isset($errores["password"])){
                        foreach ( $errores["password"] as $key => $value ){
                            echo "<li style='color:red;'><small>$value</small></li>";
                        }
                    } ?>
                </div>
                <div>
                    <label for="remember">
                        Recordar usuario
                    </label>
                    <input type="checkbox" name="remember" <?= $rememberMe ?> style="opacity: 1;pointer-events:all;position:relative;" id="">
                </div>
                <button name="btnLogin" class="waves-effect waves-light btn">Ingresar</button>
            </form>
                <a href="./registro.php" class="waves-effect waves-light btn">Registrarse</a>
                <div id="arreglo">

                    <a href="changepass.php">
                        <p>He olvidado mi contraseña</p>
                    </a>
                    <a href="">
                        <p>Ingresar con Google</p>
                    </a>
                    <a href="">
                        <p>Ingresar con Facebook</p>
                    </a>
                </div>
        </div>
    </div>
    <?php $_SESSION["error"] = []; ?>
    <?php include('./componentes/module/footer.php'); ?>
</body>

</html>