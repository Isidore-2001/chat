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
  
   

   $search = $_GET['search'];
   $res = $data->search($_SESSION['ident'], $search);
    $mes = "";
    foreach ($res as $i){
      $mes3 = "";
      $email = $data->getemail($i['numusers']);
      $mes2 = $data->getchat($_SESSION['ident'], $email);
      $mes2 = $mes2[count($mes2)-1];
      if(strlen($mes2['texte']) > 28 ){
     $mes3.=substr($mes2['texte'], 0, 28) . '...';
   }
   else{
    $mes3 = $mes2['texte'];
   }
        $mes.= '<a  href="chat.php?user_id='.$i['numusers'].'">
        <div class="content">
        <img src="images/'.$i['image'].'" alt="">
        <div class="details">
        <span>'.$i['nom'].' '.$i['prenom'].' </span>
        <p>'.$mes3.'</p>
      </div>
      </div>
      <div class="status-dot"><i class="fas fa-circle"></i></div>
      </a>';
    }
    produceResult($mes);


    ?>
