
<div class="content-fluid ">
  
  <div class="row">
    
    <div class="col-lg-1 bg-black hidden-xs" style="height: 100vh; width: 8vw;">

      <?php  include "partials/asidenav.php"; ?>

      </div>

      <div class="col-lg-11">
      
          <div class="content">

            <div class="box">

              <div class="box-header with-border">
          
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddTrademarks">
                  
                  Agregar empresa desarrolladora

                </button>

              </div>

              <div class="box-body">
                
               <table class="table table-bordered table-striped dt-responsive table1" width="100%">
         
              <thead>
               
               <tr>
                 
                 <th style="width:10px">#</th>
                 <th>Empresa</th>
                 <th>Fecha de creacion</th>
                 <th>Acciones</th>

               </tr> 

              </thead>

              <tbody>

              <?php

                $item = null;
                $value = null;

                $trademarks = ControllerTrademarks::ctrShowTrademarks($item, $value);

                foreach ($trademarks as $key => $value) {
                 
                  echo ' <tr>

                          <td>'.($key+1).'</td>

                          <td class="text-uppercase">'.$value["trademark"].'</td>

                          <td class="text-uppercase">'.$value["date"].'</td>


                          <td>

                            <div class="btn-group">
                                
                              <button class="btn btn-warning btnEditTrademark" idTrademark="'.$value["id"].'" data-toggle="modal" data-target="#modalEditTrademark"><i class="fa fa-pencil"></i></button>

                              <button class="btn btn-danger btnDeleteTrademark" idTrademark="'.$value["id"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAddTrademarks" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar empresa</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="newTrademark" placeholder="Ingresar empresa" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar empresa</button>

        </div>

        <?php

          $createTrademarks = new ControllerTrademarks();
          $createTrademarks -> ctrCreateTrademarks();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditTrademark" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editTrademark" id="editTrademark" required>

                 <input type="hidden"  name="idTrademark" id="idTrademark" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      <?php

          $editTrademarks = new ControllerTrademarks();
          $editTrademarks -> ctrEditTrademarks();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $deleteTrademarks = new ControllerTrademarks();
  $deleteTrademarks -> ctrDeleteTrademarks();

?>


