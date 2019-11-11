<!DOCTYPE html>
<html lang="en">
<?php include('./componentes/module/head.php') ?>
<body>
    <?php include('./componentes/module/header.php'); ?>
    <section class="contacto">
        <div class="formContacto">
            <div class="titulo">
                <h1>Contactacte con nosotros!</h1>
            </div>
            <div class="form">
                <form>
                   <div class="inputsContactos">
                        <div class="labelContact">
                                <label for="nombreContacto">
                                        Nombre
                                </label>
                        </div>
                        <div class="inputContact">
                                <input type="text" name="nombreContado" id="nombreContacto">
                        </div>
                        <div class="labelContact">
                                <label for="emailContacto">
                                        Email
                                </label>
                        </div>
                        <div class="inputContact">
                                <input type="email" name="emailContado" id="emailContacto" validate>
                        </div>
                        <div class="labelContact">
                                <label for="asuntoContacto">
                                        Asunto
                                </label>
                        </div>
                        <div class="inputContact">
                                <input type="text" name="asuntoContado" id="asuntoContacto" validate>
                        </div>
                        <div class="labelContact">
                                <label for="comentarioContacto">
                                        Comentario
                                </label>
                        </div>
                        <div class="inputContact">
                               <textarea name="comentario" rows="10" cols="50">
                                   Escriba su comentario aqui..!
                                </textarea>
                        </div>
                   </div>  
                </form>
            </div>
        </div>
    </section> 
    <?php icluide('./componentes/module/footer.php'); ?>
</body>
</html>