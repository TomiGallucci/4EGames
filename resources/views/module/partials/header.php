	<nav class="navbar navbar-inverse" style="margin: 0px">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#" style="padding-right: 192px">4EGames</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="<?php echo ($_GET["route"] == "home") ? 'actived1' : '' ?>"><a href="home">Inicio <span class="sr-only">(current)</span></a></li>
	        <li><a href="<?php echo ($_GET["route"] == "gaming") ? 'actived1' : '' ?>">Gaming</a></li>
	        <li><a href="<?php echo ($_GET["route"] == "merchandise") ? 'actived1' : '' ?>">Merchandise</a></li>
	        <li><a href="<?php echo ($_GET["route"] == "faq") ? 'actived1' : '' ?>">F.A.Q</a></li>
	        <li><a href="<?php echo ($_GET["route"] == "contact") ? 'actived1' : '' ?>">Contacto</a></li>
	        
	      </ul>
	      <form class="navbar-form navbar-left">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-danger">Submit</button>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	      	<?php 

	      		if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 1){
	      			echo '<li><a href="admin" class="btn btn-xs">Modo Administrador</a></li>';
	      			echo '<li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta <span class="caret"></span>';
	      		}else{

	      			echo '<li><a href="#"><i class="fa fa-heart"></i></a></li>
					        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
					        <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta <span class="caret"></span>';

	      		}

	      	?>
	          <ul class="dropdown-menu">

				<?php 

					if(isset($_SESSION["sessionOn"]) && $_SESSION["sessionOn"] == 'ok')
					{


						echo '<li style="text-align: center;"><img src="'; echo $_SESSION["photo"].'" class="picture img-thumbnail"></li>';
						echo '<br>';
						
						echo '<li role="separator" class="divider"></li>';

						if(isset($_SESSION["isAdmin"])){
							if ($_SESSION["isAdmin"] == 1) {

								echo '<li  class="text-title text-blue">'.$_SESSION["name"]." ".$_SESSION["lastname"].'<span class="hidden-xs"><a class="btn btn-xs text-black btn-danger" id="btnAdminLg">Administrador</a></span></li>';
								echo '<span class="hidden-md hidden-lg"><a class="btn btn-xs btn-danger text-black" id="btnAdminXs">Administrador</a></span>';

							}else{
								echo '<li  class="text-title text-blue">'.$_SESSION["name"]." ".$_SESSION["lastname"].'</li>';
							}
						}

						echo '<li role="separator" class="divider"></li>';
						echo '<li><a href="profile">Editar perfil</a></li>';
						echo '<li><a href="messages">Mensajes</a></li>';
						echo '<li role="separator" class="divider"></li>';
						echo '<li><a href="exit">Salir</a></li>';
					}else{

					echo '<li><a href="login">Ingresar </a></li>
				          <li><a href="register">Registrarse</a></li>
				          <li><a href="#"><small>¿Necesitas ayuda?</small></a></li>';


					}

				?>

	         
	          
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
