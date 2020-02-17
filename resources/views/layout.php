<?php 

  session_start();


?>
<!DOCTYPE html>
<html lang="en">
  <head>

  <!-- Tell the browser to be responsive to screen width -->

  <meta charset="utf-8">
    
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Titulo -->
  
  <title>4EGames</title>
   <!--=====================================
  PLUGINS DE CSS
  ======================================-->
  <!-- CSSS PROPIOS -->
  <link rel="stylesheet" href="resources/views/css/home.css">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="resources/views/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="resources/views/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="resources/views/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="resources/views/dist/css/AdminLTE.css">
  
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="resources/views/dist/css/skins/_all-skins.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="resources/views/plugins/iCheck/all.css">

   <!-- DataTables -->
  <link rel="stylesheet" href="resources/views/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="resources/views/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  

   <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="resources/views/bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="resources/views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="resources/views/bower_components/fastclick/lib/fastclick.js"></script>
  
  <!-- AdminLTE App -->
  <script src="resources/views/dist/js/adminlte.min.js"></script>
 <!-- iCheck 1.0.1 -->
  <script src="resources/views/plugins/iCheck/icheck.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="resources/views/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- DataTables -->
  <script src="resources/views/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="resources/views/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="resources/views/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="resources/views/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    
  </head>
  
<body>


 <?php


    include "module/partials/header.php";
    echo '<div class="wrapper">';
     if(isset($_GET["route"])){

      if($_GET["route"] == "home" ||
         $_GET["route"] == "login" ||
         $_GET["route"] == "register-page" ||
         $_GET["route"] == "profile" ||
         $_GET["route"] == "admin" ||
         $_GET["route"] == "users" ||
         $_GET["route"] == "categories" ||
         $_GET["route"] == "trademarks" ||
         $_GET["route"] == "products" ||
         $_GET["route"] == "offerday" ||
         $_GET["route"] == "exit"){

        if($_GET["route"] == "admin"){

          include "module/".$_GET["route"].".php";
          
        }else{

        include "module/".$_GET["route"].".php";


        }

      }else{

        include "module/partials/404.php";

      }

    }else{

      include "module/home.php";

    }
    ?>

   </div> 
     
   <script src="resources/views/js/layout.js"></script>
   <script src="resources/views/js/users.js"></script>
   <script src="resources/views/js/countdown.js"></script>
   <script src="resources/views/js/categories.js"></script>
   <script src="resources/views/js/trademarks.js"></script>
   <script src="resources/views/js/products.js"></script>




</body>
</html>