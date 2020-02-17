<section class="content">

    <div class="box">

      <div class="box-header" style="text-align: center">
          
          <h1>Perfil de usuario</h1>

          <?php 

            if(!isset($_SESSION['name'])){

              echo '<span class="alert alert-warning text-center">Complete los datos faltantes</span>'; 

            }

          ?>
          

      </div>

      <div class="box-body">
          
        <form method="post" role="form" action="" enctype="multipart/form-data">
      
        <?php 

        $table = "users";
        $item = "id";
        $value = $_SESSION["id"];

        $answer = ModelUsers::mdlShowUsers($table,$item,$value);



        ?>

        <div class="box-body">

             <!-- ENTRADA PARA EL NOMBRE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input-lg" name="editName" placeholder="Nombre" value="<?php echo $answer['name'] ? $answer['name'] : ''  ?>" id="editName" required>
                
              </div>
                
             </div>
           <!-- ENTRADA PARA EL APELLIDO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input-lg" name="editLastname" value="<?php echo $answer['lastname'] ? $answer['lastname'] : ''  ?>" placeholder="Apellido" id="editLastname" required>
                
              </div>
                
             </div>
            
            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="editEmail" value="<?php echo $answer["email"]; ?>" id="editEmail" readonly>

                <input type="hidden" name="editTyc" value="<?php echo $answer["tyc"]; ?>">
        
                
              </div>
                
             </div>


            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="editPassword" placeholder="Nueva contraseña">
                <input type="hidden" name="actualPassword" value="<?php echo $answer["password"]; ?>">
            
              </div>
                
            </div>
               <!-- ENTRADA PARA EL CUMPLEAÑOS -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="date" class="form-control input-lg" name="editBirthday" value="<?php echo ($answer['birthday'] == '0000-00-00') ? date('Y-m-d') :  $answer['birthday']?>"required>
                
              </div>
                
             </div>


                 <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="newPhoto" name="newPhoto">

              <p class="help-block">Peso máximo de la foto 5MB</p>

              <?php 
                if($answer["image"]) {
                  echo '<img src="'.$answer["image"].'" class="img-thumbnail preview" width="100px">';
                }else {
                  echo '<img src="resources/views/img/users/default/anonymous.png" class="img-thumbnail preview" width="100px">';
                }

              ?>


              <input type="hidden" name="actualPhoto" value="<?php echo $answer['image']; ?>">

            </div>
          
           <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left">Salir</button>

          <button type="submit" class="btn btn-danger pull-right">Guardar usuario</button>

        </div>
    
      </form>
      <?php 

      $editProfile = new ControllerUsers();
      $editProfile -> ctrEditUser();

      ?>

      </div>

    </div>

  </section>
