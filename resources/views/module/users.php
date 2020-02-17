
<div class="content-fluid ">
  
  <div class="row">
    
    <div class="col-lg-1 bg-black hidden-xs" style="height: 100vh; width: 8vw;">

      <?php  include "partials/asidenav.php"; ?>

      </div>

      <div class="col-lg-11">
      
          <div class="content">

            <div class="box">

              <div class="box-header with-border">

                 <h1>
              
                  Administrar usuarios
                
                </h1>

              </div>

              <div class="box-body">
                
               <table class="table table-bordered table-striped dt-responsive table1" width="100%">
                 
                <thead>
                 
                 <tr>
                   
                   <th style="width:10px">#</th>
                   <th>Nombre y Apellido</th>
                   <th>Email</th>
                   <th>Foto</th>
                   <th>Cumpleaños</th>
                   <th>Estado</th>
                   <th>Último login</th>
                   <th>Acciones</th>

                 </tr> 

                </thead>

                <tbody>

                <?php

                $item = null;
                $value = null;

                $users = ControllerUsers::ctrShowUsers($item, $value);
                

               foreach ($users as $key => $value){
                 
                  echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["name"]." ".$value["lastname"].'</td>
                          <td>'.$value["email"].'</td>';

                          if($value["image"] != ""){

                            echo '<td><img src="'.$value["image"].'" class="img-thumbnail" width="40px"></td>';

                          }else{

                            echo '<td><img src="resources/views/img/users/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                          }

                          echo '<td>'.$value["birthday"].'</td>';

                          if($value["status"] != 0){

                            echo '<td><button class="btn btn-success btn-xs btnActive" idUser="'.$value["id"].'" statusUser="0">Activado</button></td>';

                          }else{

                            echo '<td><button class="btn btn-danger btn-xs btnActive" idUser="'.$value["id"].'" statusUser="1">Desactivado</button></td>';

                          }             


                          echo '<td>'.$value["last_login"].'</td>
                          <td>

                            <div class="btn-group">
                                
                              <button class="btn btn-warning btnEditUser" idUser="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                              <button class="btn btn-danger btnDeleteUser" idUser="'.$value["id"].'" photoUser="'.$value["image"].'" email="'.$value["email"].'"><i class="fa fa-times"></i></button>

                            </div>  

                          </td>

                        </tr>';
                }


                ?> 

                </tbody>

               </table>

              </div>

            </div>

          </div>

      </div>

    </div>
</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="box-body">

             <!-- ENTRADA PARA EL NOMBRE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input-lg" name="editName" placeholder="Nombre"  id="editName" required>
                
              </div>
                
             </div>
           <!-- ENTRADA PARA EL APELLIDO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input-lg" name="editLastname" placeholder="Apellido" id="editLastname" required>
                
              </div>
                
             </div>
            
            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="editEmail" id="editEmail" readonly>

                <input type="hidden" name="editTyc">
        
                
              </div>
                
             </div>


            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="editPassword" placeholder="Nueva contraseña">
                <input type="hidden" name="actualPassword">
            
              </div>
                
            </div>
               <!-- ENTRADA PARA EL CUMPLEAÑOS -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="date" class="form-control input-lg" name="editBirthday" id="editBirthday" required>
                
              </div>
                
             </div>


             <!-- ENTRADA PARA SUBIR FOTO -->
            <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="newPhoto" name="editPhoto">

              <p class="help-block">Peso máximo de la foto 5MB</p>

              <img src="resources/views/img/users/default/anonymous.png" class="img-thumbnail preview" width="100px">

              <input type="hidden" name="actualPhoto" id="actualPhoto">

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
  </div>
</div>
<?php 
  
  $deleteUser = new ControllerUsers();
  $deleteUser -> ctrDeleteUser();
  
 ?>