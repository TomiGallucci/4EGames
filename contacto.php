<!DOCTYPE html>
<html lang="en">
<?php include('./componentes/module/head.php') ?>
<body>
	<div class="contact">
		<?php include('./componentes/module/header.php'); ?>
		<section class="contacto">
			<div class="titulo">
				<h1>Contactacte con nosotros!</h1>
			</div>
			<div class="formContacto row">
				<div class="col s4">
					<form method="POST">
							<div class="labelContact">
								<label for="nombreContacto">
									Nombre
								</label>
								<input type="text" name="nombreContado" id="nombreContacto">
							</div>
							<div class="labelContact">
								<label for="emailContacto">
									Email
								</label>
								<input type="email" name="emailContado" id="emailContacto" validate>
							</div>
							<div class="labelContact">
								<label for="asuntoContacto">
									Asunto
								</label>
								<input type="text" name="asuntoContado" id="asuntoContacto" validate>
							</div>
							<div class="labelContact">
								<label for="comentarioContacto">
									Comentario
								</label>
								<textarea name="comentarioContacto" placeholder="Escriba su comentario aqui..!"></textarea>
							</div>
							<button class="btn waves-effect waves-light" type="submit" name="action">
								<i class="material-icons left">send</i>
								Enviar
								<i class="material-icons right">send</i>
							</button>
					</form>
				</div>
				<div class="col s5 flt">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtYXQN51wc_AtFKZidUWZL91LN5T9Cd3D6W5Yj-v89NtnBVSjpeA&s" alt="">
				</div>
			</div>
		</section> 
		<?php include('./componentes/module/footer.php'); ?>
	</div>
</body>
</html>