<header>

  <nav class="deep-orange lighten-1">
    <div class="nav-wrapper">

      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <?php if (isset($_SESSION["userIn"])) : ?>
          <li>
            <a class="" href="perfilusuario.php">
              <i class="material-icons left">account_box</i>
              <?= $_SESSION["userIn"]["name"] . " " . $_SESSION["userIn"]["lastname"] ?>
            </a>
          </li>
          <li><a href="carrito.php" class=""><i class="material-icons left">add_shopping_cart</i>Carrito</a></li>
          <li><a href="./componentes/module/validation.php?closeSession">Cerrar sesión</a></li>
        <?php else : ?>
          <li style="display:inline-flex">
            <a class="" href="login.php">Iniciar Sesión</a>
            o
            <a class="" href="registro.php">Registrarse</a>
          </li>
        <?php endif; ?>
      </ul>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
        <li><a href="faq.php">F.A.Q</a></li>
        <li><a href="catalogo.php">Catalogo</a></li>
        <li><a href="contacto.php">Contacto</a></li>
      </ul>
    </div>
  </nav>

</header>