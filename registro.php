<!DOCTYPE html>
<html lang="en">
<?php include('./componentes/module/head.php') ?>


<?php $errores = isset($_SESSION["error"])? $_SESSION["error"]: [];?>

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
                    <input type="text" name="lastname" validate>
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
                    <?php if(isset($errores["password"])){
                        $imgProblem = $errores["imgProfile"];
                        echo "<div style='color:red;'>$imgProblem</div>";
                    } ?>
                </div>
                <div>
                    <label for="password">
                        Contraseña
                    </label>
                    <input type="password" name="password" validate>
                    <?php if(isset($errores["password"])){
                        foreach ( $errores["password"] as $key => $value ){
                            echo "<div style='color:red;'>$value</div>";
                        }
                    } ?>
                </div>
                <div>
                    <label for="email">
                        Email
                    </label>
                    <input type="email" name="email" validate>
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
                    <?php if(isset($errores["age"])){
                        $ageProblem = $errores["age"];
                        echo "<div style='color:red;'>$ageProblem</div>";
                    } ?>
                </div>
                <button name="btnRegistro" class="waves-effect waves-light btn">Confirmar</button>
                <button name="btnCancelRegistro" class="waves-effect waves-light btn red">Cancelar</button>
            </form>
        </div>
    </div>
    <?php $_SESSION["error"] = []; ?>
    <?php include('./componentes/module/footer.php'); ?>
</body>

</html>