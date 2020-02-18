 <?php var_dump($_POST); ?>
<div class="content-fluid ">
  
  <div class="row">
    
    <div class="col-lg-1 bg-black hidden-xs" style="height: 100vh; width: 8vw;">

      <?php  include "partials/asidenav.php"; ?>

      </div>

      <div class="col-lg-11">
      
          <div class="content">

            <div class="box">

                <div class="box-header with-border">
  
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddProduct">
                  
                  Agregar producto

                </button>

              </div>

              <div class="box-body">
                
               <table class="table table-bordered table-striped dt-responsive tableProducts" width="100%">
                 
                <thead>
                 
                  <tr>
                   
                   <th style="width:10px">#</th>
                   <th>Imagen</th>
                   <th>Titulo</th>
                   <th>Descripcion</th>
                   <th>Stock</th>
                   <th>Precio DOLLAR</th>
                   <th>Precio EN PESOS + GCIAS</th>
                   <th>Idiomas</th>
                   <th>Categoria</th>
                   <th>Empresa</th>
                   <th>Agregado</th>
                   <th>Acciones</th>
                   
                 </tr> 

                </thead>
                <tbody>
                  
                  <?php 

                    $item = null;
                    $value = null;
                    $order = "id";

                    $products = ControllerProducts::ctrShowProducts($item,$value,$order);

                  

                    if($products){

                       $b = "";


                      foreach ($products as $key => $value) {

                       $a = json_decode($value["categories"], true);

                        foreach ($a as $key => $valuekey) {
                            if($b == ""){ $b = $valuekey["category"]; }else{ $b.= ', '.$valuekey["category"]; }
                        }
                       $d = "";
                       $c = json_decode($value["languages"], true);

                        foreach ($c as $key => $valkey) {
                            if($d == ""){ $d = $valkey["language"]; }else{ $d.= ', '.$valkey["language"]; }
              
                        }
                   
                        $item2= "id";
                        $value2 = $value["trademark"];
                        $trademars = ControllerTrademarks::ctrShowTrademarks($item2,$value2);
                        

                        echo '<tr>
                                  <td>'.($key+1).'</td>
                                  <td><img src="'.$value["image"].'" width="40px"></td>
                                  <td>'.$value["title"].'</td>
                                  <td>'.$value["description"].'</td>
                                  <td>'.$value["stock"].'</td>
                                  <td>'.$value["purchase_price"].'</td>
                                  <td>'.$value["sale_price"].'</td>
                                  <td>'.$d.'</td>';
                 



                                
                              echo '<td>'.$b.'</td>
                                  <td>'. $trademars["trademark"].'</td>
                                  <td>'.$value["date"].'</td>
                                  <td><div class="btn-group"><button class="btn btn-warning btnEditProduct" idProduct="'.$value["id"].'" data-toggle="modal" data-target="#modalEditProduct"><i class="fa fa-pencil"></i></button><button class="btn btn-danger btnEliminarProducto" idProduct="'.$value["id"].'" code="'.$value["code"].'" image="'.$value["image"].'"><i class="fa fa-times"></i></button></div></td>

                              </tr>'; 
                         $d = ""; $b = "";


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
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAddProduct" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" class="was-validated" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg text-uppercase is-invalid" id="newCategories">
                  
                  <option value="">Selecionar categoría</option>

                  <?php

                  $item = null;
                  $value = null;

                  $categories = ControllerCategories::ctrShowCategories($item, $value);

                  foreach ($categories as $key => $value) {
                    
                    echo '<option class="text-uppercase" value="'.$value["id"].'">'.$value["category"].'</option>';
                  }

                  ?>
  
                </select>
                 
              </div>
              <div class="container categories"></div>
             <input type="hidden" id="listCategory" name="listCategories">

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <?php 

                  $item = null;
                  $value = null;
                  $order = "id";

                  $products = ControllerProducts::ctrShowProducts($item,$value,$order);



                  if(!$products){


                      echo '<input type="text" class="form-control" id="newCode" name="newCode" value="1" readonly required>';
                  

                    }else{

                      foreach ($products as $key => $value) {
                        
                       
                      
                      }

                      $codigo = $value["code"] + 1;



                      echo '<input type="text" class="form-control" id="newCode" name="newCode" value="'.$codigo.'" readonly required>';
                  

                    }


                ?>

              </div>

            </div>
                        <!-- ENTRADA PARA SELECCIONAR EMPRESA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg text-uppercase is-invalid" id="newTrademark" name="newTrademark" required>
                  
                  <option value="">Selecionar Empresa</option>

                  <?php

                  $item = null;
                  $value = null;

                  $trademark = ControllerTrademarks::ctrShowTrademarks($item, $value);

                  foreach ($trademark as $key => $value) {
                    
                    echo '<option class="text-uppercase" value="'.$value["id"].'">'.$value["trademark"].'</option>';
                  }

                  ?>
  
                </select>

                 
              </div>
            </div>
            <!-- ENTRADA PARA EL TITULO -->

             <div class="form-group">
                 
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                   <input type="text" class="form-control input-lg is-invalid" name="newTitle" placeholder="Ingresar titulo" required>

                 </div>

             </div>

            <!-- ENTRADA PARA LA DESCRIPCION -->

             <div class="form-group">
              
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                   <textarea name="newDescription" id="newDescription" cols="20" rows="10" style="margin: 0px;width: 511px;height: 56px;" placeholder="Descripcion..."></textarea>

                 </div>

             </div>


             <!-- ENTRADA PARA STOCK -->

             <div class="form-group">
              
                 <div class="input-group">
                 
                   <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                   <input type="number" class="form-control input-lg" name="newStock" min="0" placeholder="Stock" required>

                 </div>

             </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                  <div class="col-xs-12 col-sm-6">
                   
                     <div class="input-group">
                     
                       <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                       <input type="number" class="form-control input-lg" id="newPurchasePrice" name="newPurchasePrice" min="0" step="any" placeholder="Precio de compra" required>
                      
                     </div>

                      <div class="alert alert-warning">Ingrese valor en dolar</div>

                  </div>

                   <!-- ENTRADA PARA PRECIO VENTA -->

                  <div class="col-xs-12 col-sm-6">
                   
                     <div class="input-group">
                     
                       <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                       <input type="number" class="form-control input-lg" id="newSalePrice" name="newSalePrice" min="0" step="any" placeholder="Precio de venta" required>

                     </div>

                  </div>

              </div>
                              <!-- CHECKBOX PARA PORCENTAJE -->
              <div class="form-group row" style="width: 100%">
                    
                  <div class="col-xs-12 col-sm-6">

                     <label>
                        <input type="checkbox" class="minimal percentage" checked>
                        Ganancia en porcentaje
                      </label>
                    
                       <div class="input-group">
                         
                         <input type="number" class="form-control input-lg newPercentage" min="0" value="10" required>

                         <span class="input-group-addon" style="width: 38px"><i class="fa fa-percent"></i></span>

                       </div>

                  </div>
                    
                  <div class="col-xs-12 col-sm-6">
                      
                      <label>
                        <input type="checkbox" class="minimal dolar" checked>
                        Valor del dolar
                      </label>
                  
                    <div class="input-group">
                      
                      <input type="number" class="form-control input-lg newDollar" min="0"step="0.01" value="63.25" required>

                      <span class="input-group-addon" style="width: 38px"><i class="fa fa-usd" ></i></span>

                    </div>

                   </div>

               </div>

              <div class="form-group row">

                 <div class="col-xs-12 col-sm-6">

                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-language"></i></span> 

                      <input type="text" class="form-control input-lg" id="newLanguage" placeholder="Ingresar idioma">
                    
                    </div>

                 </div>

                  <div class="col-xs-12 col-sm-6">

                        <div class="form-group">  

                          <div class="input-group row">

                             <div class="col-xs-12 languages"></div>           
                          </div>

                        </div>

                        <input type="hidden" id="listLanguages" name="listLanguage">

      
                    </div>  

               </div>  
                   <!-- ENTRADA PARA SUBIR FOTO -->

               <div class="form-group">
              
                 <div class="panel">SUBIR IMAGEN</div>

                 <input type="file" class="newPhoto" name="newPhoto">

                 <p class="help-block">Peso máximo de la imagen 5MB</p>

                 <img src="resources/views/img/products/default/anonymous.png" class="img-thumbnail preview" width="100px">

                </div>          
            </div>
            
           

    </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Crear producto</button>

        </div>

      </form>

        <?php
        
          $createProduct = new ControllerProducts();
          $createProduct -> ctrCreateProducts();

        ?>  

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditProduct" class="modal fade" role="dialog">

 <div class="modal-dialog">

  <div class="modal-content">

   <form role="form" method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background:#3c8dbc; color:white">

           <button type="button" class="close" data-dismiss="modal">&times;</button>

           <h4 class="modal-title">Editar producto</h4>

         </div>

        <div class="modal-body">

                <div class="box-body">


                    <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

                        <div class="form-group">
                          
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                            <select class="form-control input-lg text-uppercase is-invalid" id="editCategories" >
                              
                              <option value="">Selecionar categoría</option>

                              <?php

                              $item = null;
                              $value = null;

                              $categories = ControllerCategories::ctrShowCategories($item, $value);

                              foreach ($categories as $key => $value) {
                                
                                echo '<option class="text-uppercase" value="'.$value["id"].'">'.$value["category"].'</option>';
                              }

                              ?>
              
                            </select>
                             
                          </div>
                          <div class="container categories1"></div>
                        </div>

                        <!-- ENTRADA PARA EL CÓDIGO -->
                        
                        <div class="form-group">
                          
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                            <?php 

                              $item = null;
                              $value = null;
                              $order = null;

                              $products = ControllerProducts::ctrShowProducts($item,$value,$order);


                              if(!$products){


                                  echo '<input type="text" class="form-control" id="editCode" name="editCode" value="1" readonly required>';
                              

                                }else{

                                  foreach ($ventas as $key => $value) {
                                    
                                   
                                  
                                  }

                                  $codigo = $value["codigo"] + 1;



                                  echo '<input type="text" class="form-control" id="editCode" name="editCode" value="'.$codigo.'" readonly required>';
                              

                                }


                            ?>

                          </div>

                        </div>
                                    <!-- ENTRADA PARA SELECCIONAR EMPRESA -->

                        <div class="form-group">
                          
                          <div class="input-group">
                          
                            <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                               <input type="text" class="form-control input-lg is-invalid" id="editTrademark" placeholder="Ingresar titulo" readonly>
                               <input type="hidden" name="editTrademarkId" id="editTrademarkId">
                            

                          </div>
                        </div>
                        <!-- ENTRADA PARA EL TITULO -->

                         <div class="form-group">
                             
                             <div class="input-group">
                             
                               <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                               <input type="text" class="form-control input-lg is-invalid" name="editTitle" id="editTitle" placeholder="Ingresar titulo" required>

                             </div>

                         </div>

                        <!-- ENTRADA PARA LA DESCRIPCION -->

                         <div class="form-group">
                          
                             <div class="input-group">
                             
                               <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                               <textarea name="editDescription" id="editDescription" cols="20" rows="10" style="margin: 0px;width: 511px;height: 56px;" placeholder="Descripcion..."></textarea>

                             </div>

                         </div>


                         <!-- ENTRADA PARA STOCK -->

                         <div class="form-group">
                          
                             <div class="input-group">
                             
                               <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                               <input type="number" class="form-control input-lg" name="editStock" id="editStock" min="0" placeholder="Stock" required>

                             </div>

                         </div>

                         <!-- ENTRADA PARA PRECIO COMPRA -->

                         <div class="form-group row">

                              <div class="col-xs-12 col-sm-6">
                               
                                 <div class="input-group">
                                 
                                   <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                                   <input type="number" class="form-control input-lg" id="editPurchasePrice" name="editPurchasePrice" min="0" step="any" placeholder="Precio de compra" required>
                                  
                                 </div>

                                  <div class="alert alert-warning">Ingrese valor en dolar</div>

                              </div>

                               <!-- ENTRADA PARA PRECIO VENTA -->

                              <div class="col-xs-12 col-sm-6">
                               
                                 <div class="input-group">
                                 
                                   <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                                   <input type="number" class="form-control input-lg" id="editSalePrice" name="editSalePrice" min="0" step="any" placeholder="Precio de venta" required>

                                 </div>

                              </div>

                          </div>
                                          <!-- CHECKBOX PARA PORCENTAJE -->
                          <div class="form-group row" style="width: 100%">
                                
                              <div class="col-xs-12 col-sm-6">

                                 <label>
                                    <input type="checkbox" class="minimal percentage" checked>
                                    Ganancia en porcentaje
                                  </label>
                                
                                   <div class="input-group">
                                     
                                     <input type="number" class="form-control input-lg editPercentage" min="0" value="10" required>

                                     <span class="input-group-addon" style="width: 38px"><i class="fa fa-percent"></i></span>

                                   </div>

                              </div>
                                
                              <div class="col-xs-12 col-sm-6">
                                  
                                  <label>
                                    <input type="checkbox" class="minimal dolar" checked>
                                    Valor del dolar
                                  </label>
                              
                                <div class="input-group">
                                  
                                  <input type="number" class="form-control input-lg editDollar" min="0"step="0.01" value="63.25" required>

                                  <span class="input-group-addon" style="width: 38px"><i class="fa fa-usd" ></i></span>

                                </div>

                               </div>

                           </div>

                          <div class="form-group row">

                             <div class="col-xs-12 col-sm-6">

                                <div class="input-group">
                                
                                  <span class="input-group-addon"><i class="fa fa-language"></i></span> 

                                  <input type="text" class="form-control input-lg" id="editLanguages" placeholder="Ingresar idioma">
                                
                                </div>

                             </div>

                              <div class="col-xs-12 col-sm-6">

                                    <div class="form-group">  

                                      <div class="input-group row">

                                                  <div class="col-xs-12 languages1"></div>           
                                      </div>
                                        <input type="hidden" id="editListLanguages" name="listLanguages">
                                    </div>
                  
                                </div>  

                           </div>  
                               <!-- ENTRADA PARA SUBIR FOTO -->

                           <div class="form-group">
                          
                             <div class="panel">SUBIR IMAGEN</div>

                             <input type="file" class="newPhoto" name="editPhoto">

                             <p class="help-block">Peso máximo de la imagen 5MB</p>

                             <img src="resources/views/img/products/default/anonymous.png" class="img-thumbnail preview" width="100px">

                             <input type="hidden" id="actualPhoto" name="actualPhoto">


                            </div>          
                        </div>
                    

        </div>

        <div class="modal-footer">

           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

           <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

   </form>

     <?php

           $editProduct = new ControllerProducts();
           $editProduct -> ctrEditProducts();

        ?>      

   </div>

  </div>

</div>



     <?php

           $deleteProduct = new ControllerProducts();
           $deleteProduct -> ctrDeleteProduct();

        ?>      