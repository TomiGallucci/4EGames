<?php 

  $errores = isset($_SESSION["error"])? $_SESSION["error"]: [];
  $goodData = isset($_SESSION["dataCorrect"])? $_SESSION["dataCorrect"]: [];

?>
<div id="back"></div>

<div class="register-box btn-danger" style="width: 50vw;">
  
  <div class="register-logo">4EGAMES</div>

  <div class="register-box-body">

       <h4 class="text-title">Registrarse en 4EGames</h4>

      <form method="post" role="form" action="" enctype="multipart/form-data">
      
        <div class="box-body">
            
            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input-lg" name="newEmail" value="<?php if(isset($goodData["email"])) echo $goodData["email"]; ?>" placeholder="Ingresar email" id="newEmail" required>
               
              </div>
                 <?php if(isset($errores["email"])){
                        foreach ( $errores["email"] as $key => $value ){
                            echo "<li style='color:red;'><small>$value</small></li>";
                        }
                    } ?>
            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group password">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="newPassword" id="newPassword" value="" placeholder="Ingresar contraseña" required>
            
              </div>
              <?php if(isset($errores["password"])){
                        foreach ( $errores["password"] as $key => $value ){
                            echo "<li style='color:red;'><small>$value</small></li>";
                        }
                } ?>
                
            </div>
            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="newVerifyPassword" id="newVerifyPassword" placeholder="Repetir contraseña" required>
             
              </div>
                
            </div>

              <div class="form-group">
              
              <div class="input-group">
              
                  <input type="checkbox" class="minimal" name="newTyCandP" required>Acepto los <a href="">Términos y condiciones</a> y acepto la  <a href="">Política de privacidad</a>
             
              </div>
                
            </div>
        
          <div class="register-footer">

          <button type="button" class="btn btn-default" onClick="redireccionar()">Salir</button>


          <button type="submit" class="btn btn-danger pull-right">Crear</button>

        </div>

      </form>
    
      <?php 

        $createUser = new ControllerUsers();

        $createUser -> ctrCreateUser();

       ?>
    
  </div>

</div>
<?php 

  if(isset($_SESSION["sessionOn"])){

    if($_SESSION["sessionOn"] == "ok")
    {

        $_SESSION["error"] = []; 
        $_SESSION["dataCorrect"] = [];

    }

  

  }

?>