<div id="back"></div>


<div class="login-box btn-danger" style="width: 50vw;">
  
  <div class="login-logo">

    4EGames

  </div>

  <div class="login-box-body box" width="100vw;" style="background: gray">

    

      <div class="box-header">
         <p class="login-box-msg">Ingresar a 4EGames</p>
      </div>
      <div class="box-body">

          <form method="post">

          <div class="form-group">
            
            <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 
               <input type="text" class="form-control" placeholder="Email" name="inputEmail" required>

            </div>
         


          </div>

          <div class="form-group">
          
            <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
                <input type="password" class="form-control" placeholder="Contraseña" name="inputPassword" required>
            </div>
           
  
          </div>

          <div class="row">
           
            <div class="col-xs-12">

              <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
            
            </div>

          </div>


        </form>

        <?php 

        $login = new ControllerUsers();
        $login -> ctrLoginUser();

        ?>

      </div>

      <div class="box-footer">

        <div class="text-title text-center">Registrarse</div>
       
          <p class="login-box-msg">En caso de no tener cuenta, haz click en el siguiente enlance. 
             <a href="register-page">Registrarse aqui</a>
          </p>
       
        </div>
  </div>

</div>
