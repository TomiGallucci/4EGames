<?php 

#Requerimos controladores
require_once "controller/layout.controller.php";
require_once "controller/users.controller.php";
require_once "controller/categories.controller.php";
require_once "controller/trademarks.controller.php";
require_once "controller/products.controller.php";




#Requerimos modelos
require_once "models/users.model.php";
require_once "models/categories.model.php";
require_once "models/trademarks.model.php";
require_once "models/products.model.php";





$layout = new ControllerLayout();
$layout -> ctrLayout();