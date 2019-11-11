<!DOCTYPE html>
<html lang="en">
<?php include('./componentes/module/head.php') ?>
<body>
    <?php include('./componentes/module/header.php'); ?>
        <section class="Ingreso">
       <form class="form" action="">
            <div class="titulo">
                <h1>Ingresar a 4EGames Comunity</h1>
            </div>
            <div class="datoIngresados">
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
                    <button type="submit">Ingresar</button>
                    <a href="">
                        <p>He olvidado mi contraseña.</p>
                    </a>
                    <a href="">
                        <p>Ingresar con Google</p>
                    </a>
                    <a href="">
                        <p>Ingresar con Facebook</p>
                    </a>
                </div>
            </div>
        </form>
    </section>
    <?php icluide('./componentes/module/footer.php'); ?>
</body>
</html>