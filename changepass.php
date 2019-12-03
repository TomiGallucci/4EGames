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
                </div>
                <div>
                    <label for="password1">
                        Contraseña
                    </label>
                    <input type="password" id="" name="password1" required>
                </div>
                <div>
                    <label for="password2">
                        Contraseña
                    </label>
                    <input type="password" id="" name="password2" required>
                </div>
                <div>
                    <label for="remember">
                        Recordar usuario
                    </label>
                    <input type="checkbox" name="remember" <?= $rememberMe ?> style="opacity: 1;pointer-events:all;position:relative;" id="">
                </div>
                <button name="btnPassChange" class="waves-effect waves-light btn">Confirmar</button>
            </form>
                <a href="index.php" class="waves-effect waves-light btn">Cancelar</a>
        </div>
    </div>
    <?php include('./componentes/module/footer.php'); ?>
</body>

</html>