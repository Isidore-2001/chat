<?php

session_name('synthese_isidore');
session_start();
set_include_path('..'.PATH_SEPARATOR);
require_once('php/common_service.php');
require_once('php/initDataLayer.php');

 const COLOR_REGEXP="/^([A-Za-z]+)$/";

  
  require_once('php/fonctions_parms.php');
   // à compléter

   //require_once('login.php');
  
   

   

 
      produceResult($_SESSION['ident']);
      $data->updatestatus($_SESSION['ident'],'Offline now');
      session_destroy();
      header("location: ../login.php");
 
    
 

?>