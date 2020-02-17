
<div class="content-fluid ">
  
  <div class="row">
    
    <div class="col-lg-1 bg-black hidden-xs" style="height: 100vh; width: 8vw;">

      <?php  include "partials/asidenav.php"; ?>

      </div>

      <div class="col-lg-11">
      
          <div class="content">

            <div class="box">

                <div class="box-header with-border">
  
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddOfferDay">
                  
                  Agregar producto del dia

                </button>

              </div>

              <div class="box-body">
                
               <table class="table table-bordered table-striped dt-responsive table1" width="100%">
                 
                <thead>
                 
                  <tr>
                   
                   <th style="width:10px">#</th>
                   <th>Imagen</th>
                   <th>Titulo</th>
                   <th>Precio con descuento</th>
                   <th>Descuento</th>
                   <th>Fecha limite</th>
                   <th>Agregado</th>
                   <th>Acciones</th>
                   
                 </tr> 

                </thead>
                <tbody>
                  
                  <?php 


                    $item = null;
                    $value = null;
                    $offerday = ControllerOfferday::ctrShowOfferday($item,$value);

                    if($offerday){

                      foreach ($offerday as $key => $value) {
                    

                    $item = "id";
                    $value = $value["product_id"];
                    $order = "id";
                    $products = ControllerProducts::ctrShowProducts($item,$value,$order);

                        echo '<tr>
                                  <td>'.($key+1).'</td>
                                  <td><img src="'.$products["image"].'" width="40px"></td>
                                  <td>'.$products["title"].'</td>
                                  <td>'.$value["price_discount"].'</td>
                                  <td>'.$value["discount"].'</td>
                                  <td>'.$value["date_limit"].'</td>
                                  <td>'.$value["date"].'</td>
                                  <td><div class="btn-group"><a href="create-offer"><button class="btn btn-warning btnEditOfferday" productId="'.$value["id"].'" data-toggle="modal" data-target="#modalEditOfferDay"><i class="fa fa-pencil"></i></button></a><a href="edit-offer"><button class="btn btn-danger btnDeleteOfferday" productId="'.$value["id"].'" code="'.$value["code"].'" image="'.$value["image"].'"><i class="fa fa-times"></i></button></a></div></td>

                              </tr>'; 

                      }

                    }

                  ?>

                </tbody>


            </table>

      </div>

    </div>

  </section>

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

                <input type="text" class="form-control input-lg" name="newCategory" placeholder="Ingresar categoría" required>

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

        <?php

          $createCategory = new ControllerCategories();
          $createCategory -> ctrCreateCategory();

        ?>

      </form>

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

          $editCategory = new ControllerCategories();
          $editCategory -> ctrEditCategory();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $deleteCategory = new ControllerCategories();
  $deleteCategory -> ctrDeleteCategory();

?>


