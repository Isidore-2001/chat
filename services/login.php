<?php 
session_name('synthese_isidore');
session_start();
set_include_path('..'.PATH_SEPARATOR);
require_once('php/common_service.php');
require_once('php/initDataLayer.php');

 
try {
  
  require_once('php/fonctions_parms.php');
   // à compléter


   $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);;
   
   
                              
   $password = $_POST['password'];
   
   if (isset($email) && isset($password) && $_SESSION['ident'] ===NULL){
       $res = $data->login($email, $password);
       
       if (!$res ){
           produceError("L'email ou le password est erroné");
       }
       else{
           produceResult($res);
        $data->updatestatus($email,'Active now');
           $_SESSION['ident'] = $res['email'];
       }
   }

   else{
       produceError(" Saisissez l'email et le password");
   }

}

   catch(PDOException $e){
       produceError($e);
   }

   
?>