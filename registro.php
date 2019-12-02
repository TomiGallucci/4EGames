<!DOCTYPE html>
<html lang="en">
<?php include('./componentes/module/head.php') ?>

<body>
    <?php include('./componentes/module/header.php'); ?>
    <div class="fondo">
        <div class="container">
            <div class="registroTitle">
                <h1>Bienvenido a nuestro formulario de registro!</h1>
            </div>
            <form action="./componentes/module/validation.php" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="name">
                        Nombre
                    </label>
                    <input type="text" name="name" validate>
                </div>
                <div>
                    <label for="lastname">
                        Apellido
                    </label>
                    <input type="text" name="lastname" validate>
                </div>
                <div>
                    <label for="fotoCarnet">
                        Foto de Perfil
                    </label>
                    <input type="file" name="fotoCarnet" validate>
                </div>
                <div>
                    <label for="password">
                        Contraseña
                    </label>
                    <input type="password" name="password" validate>
                </div>
                <div>
                    <label for="email">
                        Email
                    </label>
                    <input type="email" name="email" validate>
                </div>
                <div>
                    <label for="pais">
                        Pais
                    </label>
                    <input type="text" name="pais" validate>
                </div>
                <div>
                    <label for="provincia">
                        Provincia
                    </label>
                    <input type="text" name="provincia" validate>
                </div>
                <div>
                    <label for="localidad">
                        Localidad
                    </label>
                    <input type="text" name="localidad" validate>
                </div>
                <div>
                    <label for="birthday">
                        Fecha de Nacimiento
                    </label>
                    <input type="date" name="birthday" validate>
                </div>
                <div>
                    <label for="remember">
                        Recordar usuario
                    </label>
                    <input type="checkbox" name="remember" style="opacity: 1;pointer-events:all;position:relative;" id="">
                </div>
                <button name="btnRegistro" class="waves-effect waves-light btn">Confirmar</button>
                <button name="btnCancelRegistro" class="waves-effect waves-light btn red">Cancelar</button>
            </form>
        </div>
    </div>
    <?php include('./componentes/module/footer.php'); ?>
</body>

</html>