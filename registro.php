<!DOCTYPE html>
<html lang="en">
<?php include('./componentes/module/head.php') ?>
<body>
    <?php include('./componentes/module/header.php'); ?>
    <section class="RegistroUsuario">
        <div class="titulo" style="text-align: center;">
            <h1>Mi Perfil</h1>
        </div>
        <div class="Datos">
            <div class="datosUsuario">
                <div class="dato">
                    <div class="label">
                        <label for="nombreReg">
                            Nombre
                        </label>
                        <input type="text" name="nombreReg" id="emailContacto" validate>
                    </div>
                </div>
                <div class="dato">
                    <div class="label">
                        <label for="apellidoReg">
                            Apellido
                        </label>
                        <input type="text" name="apellidoReg" id="emailContacto" validate>
                    </div>
                </div>
                <div class="dato">
                    <div class="label">
                        <label for="email">
                            Email
                        </label>
                        <input type="email" name="emailReg" id="emailContacto" validate>
                    </div>
                </div>
                <div class="dato">
                    <div class="label">
                        <label for="paisReg">
                            Pais
                        </label>
                        <input type="text" name="paisReg" id="emailContacto" validate>
                    </div>
                </div>
                <div class="dato">
                    <div class="label">
                        <label for="provinciaReg">
                            Provincia
                        </label>
                        <input type="text" name="provinciaReg" id="emailContacto" validate>
                    </div>
                </div>
                <div class="dato">
                    <div class="label">
                        <label for="localidadReg">
                            Localidad
                        </label>
                        <input type="text" name="localidadReg" id="emailContacto" validate>
                    </div>
                </div>
                <div class="dato">
                    <div class="label">
                        <label for="fechadenacimiento">
                            Fecha de Nacimiento
                        </label>
                        <input type="date" name="fechadenacimiento" id="emailContacto" validate>
                    </div>
                </div>
            </div>
        </div>
                <div class="buttonRegistro">
                    <a href="./login.php" class="waves-effect waves-light btn">Confirmar</a>
                    <a href="./login.php" class="waves-effect waves-light btn" id="cancelarRegistro">Cancelar</a>
                </div>
    </section>
    <?php include('./componentes/module/footer.php'); ?>
</body>
</html>