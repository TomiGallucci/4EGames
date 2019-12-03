<!DOCTYPE html>
<html lang="en">
<?php include('./componentes/module/head.php') ?>


<?php $errores = isset($_SESSION["error"])? $_SESSION["error"]: [];?>

<body>
    <?php include('./componentes/module/header.php'); ?>
    <div class="fondo">
        <div class="container">
            <div class="registroTitle">
                <h1>Edita tus datos</h1>
            </div>
            <form action="./componentes/module/validation.php" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="name">
                        Nombre
                    </label>
                    <input type="text" name="name" placeholder="<?= $_SESSION["userIn"]["name"] ?>" validate>
                    <?php if(isset($errores["name"])){
                        foreach ( $errores["name"] as $key => $value ){
                            echo "<div style='color:red;'>$value</div>";
                        }
                    } ?>
                </div>
                <div>
                    <label for="lastname">
                        Apellido
                    </label>
                    <input type="text" name="lastname" placeholder="<?= $_SESSION["userIn"]["lastname"] ?>" validate>
                    <?php if(isset($errores["lastname"])){
                        foreach ( $errores["lastname"] as $key => $value ){
                            echo "<div style='color:red;'>$value</div>";
                        }
                    } ?>
                </div>
                <div>
                    <label for="fotoCarnet">
                        Foto de Perfil
                    </label>
                    <input type="file" name="fotoCarnet" validate>
                </div>
                <div>
                    <label for="email">
                        Email
                    </label>
                    <input type="email" name="email" placeholder="<?= $_SESSION["userIn"]["email"] ?>" validate>
                    <?php if(isset($errores["email"])){
                        foreach ( $errores["email"] as $key => $value ){
                            echo "<div style='color:red;'>$value</div>";
                        }
                    } ?>
                </div>
                <div>
                    <label for="pais">
                        Pais
                    </label>
                    <input type="text" name="pais" placeholder="<?= $_SESSION["userIn"]["pais"] ?>" validate>
                </div>
                <div>
                    <label for="provincia">
                        Provincia
                    </label>
                    <input type="text" name="provincia" placeholder="<?= $_SESSION["userIn"]["provincia"] ?>" validate>
                </div>
                <div>
                    <label for="localidad">
                        Localidad
                    </label>
                    <input type="text" name="localidad" placeholder="<?= $_SESSION["userIn"]["localidad"] ?>" validate>
                </div>
                <div>
                    <label for="birthday">
                        Fecha de Nacimiento
                    </label>
                    <input type="date" name="birthday" value="<?= $_SESSION["userIn"]["birthday"] ?>" validate>
                    <?php if(isset($errores["age"])){
                        $ageProblem = $errores["age"];
                        echo "<div style='color:red;'>$ageProblem</div>";
                    } ?>
                </div>
                <button name="btnEdicion" class="waves-effect waves-light btn">Confirmar</button>
                <button name="btnCancelEdicion" class="waves-effect waves-light btn red">Cancelar</button>
            </form>
        </div>
    </div>
    <?php $_SESSION["error"] = []; ?>
    <?php include('./componentes/module/footer.php'); ?>
</body>

</html>