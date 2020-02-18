
<div class="content-fluid ">
  
    <div class="row">
    
          <div class="col-lg-1 bg-black hidden-xs" style="height: 100vh; width: 8vw;">

             <?php  include "partials/asidenav.php"; ?>

          </div>

          <div class="col-lg-8" style="height: 100vh;">
          
              <div class="content">

                <div class="box">

                    <div class="box-header with-border">
      
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddOfferDay">
                      
                      Agregar producto del dia

                    </button>

                  </div>

                  <div class="box-body">
                    
                       <table class="table table-bordered table-striped dt-responsive tableOfferday" width="100%">
                         
                        <thead>
                         
                          <tr>
                           
                           <th style="width:10px">#</th>
                           <th>Imagen</th>
                           <th>Titulo</th>
                           <th>Precio con descuento</th>
                           <th>Descuento</th>
                           <th>Fecha limite</th>
                           <th>Agregado</th>
                           <th>Estado</th>
                           <th>Acciones</th>
                           
                         </tr> 

                        </thead>                      

                    </table>

                 </div>
     
             </div>  
            </div>
        </div>
        <div class="col-lg-3" style="height: 100vh;">
         
                <div id="clock" style="margin: 0 158px"></div>

         </div>

    </div>
</div>
<!--=====================================
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAddOfferDay" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar categoría</h4>

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
                
                <select class="form-control input-lg text-uppercase is-invalid" name="newProducts" id="newProducts">
                  
                  <option value="">Selecionar JUEGO OFERTADO DEL DIA</option>

                  <?php

                  $item = null;
                  $value = null;
                  $order = "id";

                  $products = ControllerProducts::ctrShowProducts($item, $value, $order);

                  foreach ($products as $key => $value) {
                    
                    echo '<option class="text-uppercase" value="'.$value["id"].'">'.$value["title"].'</option>';
                  }

                  ?>
  
                </select>
       
              </div>

            </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                  <div class="col-xs-12 col-sm-6">
                   
                     
                     <label>
                        <input type="checkbox" class="minimal percentage" checked>
                        DESCUENTO
                      </label>
                    
                       <div class="input-group">
                         
                         <input type="number" class="form-control input-lg newPercentage" name="newPercentage" min="0" value="10" required>

                         <span class="input-group-addon" style="width: 38px"><i class="fa fa-percent"></i></span>

                       </div>
                      
                     </div>
            
                     <div class="col-xs-12 col-sm-6">
                       <label>
                        PRECIO CON DESCUENTO
                      </label>
                         <div class="input-group">
                         
                           <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                           <input type="number" class="form-control input-lg" id="newDiscountPrice" name="newDiscountPrice" priceReal="" min="0" step="any" placeholder="Precio de venta" required>

                         </div>

                      </div>

                  </div>

                   <div class="form-group">
              
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="reservationtime">
                          <input type="hidden" name="timeEnd" id="timeEnd">
                        </div>

                    </div>

                 
              </div>


  
          </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar categoría</button>

        </div>

      

      </form>
        <?php

          $createOfferDay = new ControllerOfferday();
          $createOfferDay -> ctrCreateOfferday();

        ?>
    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditOfferDay" class="modal fade" role="dialog">
  
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

                <input type="text" class="form-control input-lg" name="editCategory" id="editCategory" required>

                 <input type="hidden"  name="idCategory" id="idCategory" required>

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

          $editOfferday= new ControllerOfferday();
          $editOfferday-> ctrEditOfferday();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $deleteOfferday= new ControllerOfferday();
  $deleteOfferday-> ctrDeleteOfferday();

?>


