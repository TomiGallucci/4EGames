<?php
$editarPerfil = isset($_GET["editar"])?true:false;
?>
<!DOCTYPE html>
<html lang="en">
<?php include('./componentes/module/head.php') ?>

<body>
    <?php include('./componentes/module/header.php'); ?>
    <div class="fondo">
        <div class="container">
            <div class="titulo">
                <h1>Mi Perfil</h1>
                <img src="./css/perfilPictures/<?= $_SESSION["userIn"]["email"] ?>.jpg" alt="" srcset="">
            </div>
            <div class="datosUsuario">
                <div class="dato">
                    <label for="nombre">
                        Nombre
                    </label>
                    <div class="datoUsu">
                        <?= $_SESSION["userIn"]["name"] ?>
                    </div>
                </div>
                <div class="dato">
                    <label for="apellido">
                        Apellido
                    </label>
                    <div class="datoUsu">
                        <?= $_SESSION["userIn"]["lastname"] ?>
                    </div>
                </div>
                <div class="dato">
                    <label for="email">
                        Email
                    </label>
                    <div class="datoUsu">
                        <?= $_SESSION["userIn"]["email"] ?>
                    </div>
                </div>
                <div class="dato">
                    <label for="pais">
                        Pais
                    </label>
                    <div class="datoUsu">
                        <?= $_SESSION["userIn"]["pais"] ?>
                    </div>
                </div>
                <div class="dato">
                    <label for="provincia">
                        Provincia
                    </label>
                    <div class="datoUsu">
                        <?= $_SESSION["userIn"]["provincia"] ?>
                    </div>
                </div>
                <div class="dato">
                    <label for="localidad">
                        Localidad
                    </label>
                    <div class="datoUsu">
                        <?= $_SESSION["userIn"]["localidad"] ?>
                    </div>
                </div>
                <div class="dato">
                    <label for="fechadenacimiento">
                        Fecha de Nacimiento
                    </label>
                    <div class="datoUsu">
                        <?= $_SESSION["userIn"]["birthday"] ?>
                    </div>
                </div>
                <a href="editarPerfil.php">Cambiar datos</a>
                <a href="changepass.php">Cambiar contraseña</a>
            </div>
        </div>
    </div>
    <?php include('./componentes/module/footer.php'); ?>
</body>

</html>