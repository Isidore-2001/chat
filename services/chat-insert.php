<?php 
session_name('synthese_isidore');
session_start();
set_include_path('..'.PATH_SEPARATOR);
require_once('php/common_service.php');
require_once('php/initDataLayer.php');

 
try {
  
  require_once('php/fonctions_parms.php');
   // à compléter

   
   $message = checkString('message');
   $email1 = $_SESSION['ident'];
   $exp_email = checkString('email');
   
               
   
   
   if (isset($email1) && isset($exp_email) && isset($message) && preg_match(COLOR_REGEXP,$message)){
       $res = $data->chatinsert( $email1,  $exp_email,  $message );
       
       if (!$res ){
           produceError("Problème1");
       }
       else{
           produceResult($res);
        
       }
   }
   
   else{
       produceError("Vous n'êtes pas connecté");
   }

}

   catch(PDOException $e){
       produceError($e);
   }

   
?>