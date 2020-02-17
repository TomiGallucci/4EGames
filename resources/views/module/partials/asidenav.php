<ul class="nav justify-content-end">
  
        <li class="<?php echo ($_GET["route"] == "admin") ? 'actived1' : '' ?>">

        <a href="admin">

        <i class="fa fa-home"></i>
        <span>Home</span>

        </a>
      </li>

        <li class="<?php echo ($_GET["route"] == "users") ? 'actived1' : '' ?>">
        <a href="users">

        <i class="fa fa-user"></i>
        <span>Users</span>

      </a>

      </li>
        <li class="<?php echo ($_GET["route"] == "categories") ? 'actived1' : '' ?>">
      
        <a href="categories">

        <i class="fa fa-th"></i>
        <span>Categories</span>

      </a>

      </li>
      <li class="<?php echo ($_GET["route"] == "trademarkers") ? 'actived1' : '' ?>">
        <a href="trademarks">

        <i class="fa fa-user"></i>
        <span class="text-xs">Developed</span>

      </a>

      </li>
      <li class="<?php echo ($_GET["route"] == "products") ? 'actived1' : '' ?>">
        
      <a href="products">

        <i class="fa fa-product-hunt"></i>
        <span>Products</span>

      </a>

      </li>
      <li class="<?php echo ($_GET["route"] == "offerday") ? 'actived1' : '' ?>">
        
      <a href="offerday">

        <i class="fa fa-product-hunt"></i>
        <span>Offer day</span>

      </a>

      </li>

</ul>