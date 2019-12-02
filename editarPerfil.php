<!DOCTYPE html>
<html lang="en">
<?php include('./componentes/module/head.php') ?>

<body>
    <?php include('./componentes/module/header.php'); ?>
    <div class="fondo">
        <div class="container">
            <div class="registroTitle">
                <h1>Edita tus datos</h1>
            </div>
            <form action="./componentes/module/validation.php" method="POST">
                <div>
                    <label for="name">
                        Nombre
                    </label>
                    <input type="text" name="name" value="<?= $_SESSION["userIn"]["name"] ?>" validate>
                </div>
                <div>
                    <label for="lastname">
                        Apellido
                    </label>
                    <input type="text" name="lastname" value="<?= $_SESSION["userIn"]["lastname"] ?>" validate>
                </div>
                <div>
                    <label for="email">
                        Email
                    </label>
                    <input type="email" name="email" value="<?= $_SESSION["userIn"]["email"] ?>" validate>
                </div>
                <div>
                    <label for="pais">
                        Pais
                    </label>
                    <input type="text" name="pais" value="<?= $_SESSION["userIn"]["pais"] ?>" validate>
                </div>
                <div>
                    <label for="provincia">
                        Provincia
                    </label>
                    <input type="text" name="provincia" value="<?= $_SESSION["userIn"]["provincia"] ?>" validate>
                </div>
                <div>
                    <label for="localidad">
                        Localidad
                    </label>
                    <input type="text" name="localidad" value="<?= $_SESSION["userIn"]["localidad"] ?>" validate>
                </div>
                <div>
                    <label for="birthday">
                        Fecha de Nacimiento
                    </label>
                    <input type="date" name="birthday" value="<?= $_SESSION["userIn"]["birthday"] ?>" validate>
                </div>
                <button name="btnEdicion" class="waves-effect waves-light btn">Confirmar</button>
                <button name="btnCancelEdicion" class="waves-effect waves-light btn red">Cancelar</button>
            </form>
        </div>
    </div>
    <?php include('./componentes/module/footer.php'); ?>
</body>

</html>