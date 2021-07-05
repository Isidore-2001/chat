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
  
   

   
   $i = $_GET[];
   $res = $data->users($_SESSION['ident']);
    $mes = "";
    foreach ($res as $i){
        $mes.= '<a  href="chat.php?user_id='.$i['numusers'].'">
        <div class="content">
        <img src="images/'.$i['image'].'" alt="">
        <div class="details">
        <span>'.$i['nom'].' '.$i['prenom'].' </span>
        <p> This is message</p>
      </div>
      </div>
      <div class="status-dot"><i class="fas fa-circle"></i></div>
      </a>';
    }
    produceResult($mes);


    












?>