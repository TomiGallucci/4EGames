<!DOCTYPE html>
<html lang="en">
<?php include('./componentes/module/head.php') ?>
<body>
    <?php include('./componentes/module/header.php'); ?>
    <section class="miPerfil">
        <div class="Datos">
            <div class="titulo">
                <h1>Mi Perfil</h1>
            </div>
            <div class="datosUsuario">
                <div class="dato">
                    <div class="label">
                        <label for="nombreReg">
                            Nombre
                        </label>
                    </div>
                    <div class="datoUsu">
                            <input type="text" name="nombreReg" id="emailContacto" validate>
                    </div>
                </div>
                <div class="dato">
                    <div class="label">
                        <label for="apellidoReg">
                            Apellido
                        </label>
                    </div>
                    <div class="datoUsu">
                            <input type="text" name="apellidoReg" id="emailContacto" validate>
                    </div>
                </div>
                <div class="dato">
                    <div class="label">
                        <label for="email">
                            Email
                        </label>
                    </div>
                    <div class="datoUsu">
                            <input type="email" name="emailReg" id="emailContacto" validate>
                    </div>
                </div>
                <div class="dato">
                    <div class="label">
                        <label for="paisReg">
                            Pais
                        </label>
                    </div>
                    <div class="datoUsu">
                         <input type="text" name="paisReg" id="emailContacto" validate>
                    </div>
                </div>
                <div class="dato">
                    <div class="label">
                        <label for="provinciaReg">
                            Provincia
                        </label>
                    </div>
                    <div class="datoUsu">
                         <input type="text" name="provinciaReg" id="emailContacto" validate>
                    </div>
                </div>
                <div class="dato">
                    <div class="label">
                        <label for="localidadReg">
                            Localidad
                        </label>
                    </div>
                    <div class="datoUsu">
                         <input type="text" name="localidadReg" id="emailContacto" validate>
                    </div>
                </div>
                <div class="dato">
                    <div class="label">
                        <label for="fechadenacimiento">
                            Fecha de Nacimiento
                        </label>
                    </div>
                    <div class="datoUsu">
                         <input type="date" name="fechadenacimiento" id="emailContacto" validate>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('./componentes/module/footer.php'); ?>
</body>
</html>