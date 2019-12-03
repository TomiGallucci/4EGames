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
<?php include('./componentes/module/head.php') ?>


<?php $errores = isset($_SESSION["error"])? $_SESSION["error"]: [];?>

<body>
    <?php include('./componentes/module/header.php'); ?>
    <div class="fondo">
        <div class="container">
            <div>
                <h1>Cambio de contraseña</h1>
            </div>
            <form action="./componentes/module/validation.php" method="POST">
                <div>
                    <label for="email">
                        Email
                    </label>
                    <input type="email" id="" name="email" value="<?= $useremail ?>" required>
                    <?php if(isset($errores["email"])){
                        foreach ( $errores["email"] as $key => $value ){
                            echo "<div style='color:red;'>$value</div>";
                        }
                    } ?>
                </div>
                <div>
                    <label for="password1">
                        Contraseña
                    </label>
                    <input type="password" id="" name="password1" required>
                    <?php if(isset($errores["password"])){
                        foreach ( $errores["password"] as $key => $value ){
                            echo "<div style='color:red;'>$value</div>";
                        }
                    } ?>
                </div>
                <div>
                    <label for="password2">
                        Contraseña
                    </label>
                    <input type="password" id="" name="password2" required>
                </div>
                <button name="btnPassChange" class="waves-effect waves-light btn">Confirmar</button>
            </form>
                <a href="index.php" class="waves-effect waves-light btn">Cancelar</a>
        </div>
    </div>
    <?php $_SESSION["error"] = []; ?>
    <?php include('./componentes/module/footer.php'); ?>
</body>

</html>