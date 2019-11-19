<!DOCTYPE html>
<html lang="en">
<?php include('./componentes/module/head.php') ?>
<body>
    <?php include('./componentes/module/header.php'); ?>
        <section class="Ingreso row">
            <div class="titulo" style="text-align:center;">
                <h1>Ingresar a 4EGames Comunity</h1>
            </div>
            <form class="form" action="" class="">
                <div class="datoIngresados col s3" style="margin:0;">
                    <div class="emailLogin">
                        <div class="labelLogin">
                            <label for="emailLogin">
                                Email
                            </label>
                        </div>
                        <div class="inputLogin">
                            <input type="email" id="" name="">
                        </div>
                    </div>
                    <div class="contraLogin">
                        <div class="labelLogin">
                            <label for="contraLogin">
                                Contraseña
                            </label>
                        </div>
                        <div class="inputLogin">
                            <input type="password" id="" name="">
                        </div>
                        <button type="submit" class="waves-effect waves-light btn">Ingresar</button>
                        <a href="./registro.php" class="waves-effect waves-light btn">Registrarse</a>
                        <div id="arreglo">

                            <a href="">
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
            </form>
    </section>
    <?php include('./componentes/module/footer.php'); ?>
</body>
</html>