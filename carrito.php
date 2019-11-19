<!DOCTYPE html>
<html lang="en">
<?php include('./componentes/module/head.php') ?>
<!-- <link rel="stylesheet" href="provisorio.css"> -->
<body style="background-color:white;">
    <?php include('./componentes/module/header.php'); ?>
    <section class="Carrito">
    <?php include('./componentes/module/productosCarrito.php'); ?>
    <?php include('./componentes/module/productosCarrito.php'); ?>
    <?php include('./componentes/module/productosCarrito.php'); ?>
    <?php include('./componentes/module/productosCarrito.php'); ?>
    <?php include('./componentes/module/productosCarrito.php'); ?>
    <div class="valorTotal row comprarTodo">
    <div class="col s6" style="line-height: 112vh;"><h5>total: precio_prod</h5></div>
        <div class="col s6"><a class="waves-effect waves-light btn"style="margin-top: 2vh;padding: 7%;">Comprar Todo</a></div>
    </div>    
    </section>
    <?php include('./componentes/module/footer.php'); ?>
</body>
</html>