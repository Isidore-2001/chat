<?php
set_include_path('..'.PATH_SEPARATOR);
require_once('php/common_service.php');
require_once('php/initDataLayer.php');

 
try {
  
  require_once('php/fonctions_parms.php');
   // à compléter


   $login = checkString('login');
   
   $nom = checkString('nom');
                              
   $password = checkString('password');
   
   $prenom = checkString('prenom');
   
   $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

   $image = $_FILES['image'];
   
  
  if (!$email){
    produceError("saississez un mail correct");
  }
  if(isset($image) && isset($login) && isset($nom) && isset($password) && isset($prenom) && $email){
    
    $img_name = $image['name'];
    
    $img_type = $image['type'];
    
    $tmp_name = $image['tmp_name'];
    
    $img_explode = explode('.',$img_name);
    $img_ext = end($img_explode);
    
    $extensions = ["jpeg", "png", "jpg"];
    if(in_array($img_ext, $extensions) === true ){
      
        $types = ["image/jpeg", "image/jpg", "image/png"];
        
    if( in_array($img_type, $types) === true ){
            $time = time();
            $new_img_name = $time.$img_name;
    if( move_uploaded_file($tmp_name, "../images/".$new_img_name)){
      
     $users = $data->createUser($login, $password, $nom, $prenom, $new_img_name, $email);
     
     $to      = 'amevigbe41@gmail.com';
     $subject = 'Inscription';
     $message = "Vous venez d'être inscrit au chat 
                pour pouvoir discuter avec vos amis";
     $headers = 'From: amevigbe41@gmail.com' . "\r\n" .
     'Reply-To: '.$email. "\r\n" .
     'X-Mailer: PHP/' . phpversion();

     $mail = mail($to, $subject, $message, $headers);
    

   if (!$users){
    
      produceError("ce login est déjà utlisé par un autre utilisateur");
   }
   
   else{
      produceResult(["login"=>$login]);
   }
  
  }}
}
}
}



  catch  ( ParmsException $e)
  {
   produceError($e);
 } 
    
?>