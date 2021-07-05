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
  
   
   
   $exp_email = $_POST['email'];
   $id = $_POST['id'];
   $res = $data->getchat($_SESSION['ident'], $exp_email);
    $mes = "";
    foreach ($res as $i){
        if ($i['email1'] == $_SESSION['ident']){
            $texte = 'out';

            $mes.='<div class="chat outgoing">
            
                <div class="details">
                    <p id='.$i['message_id'].'>'.$i['texte'].'</p>
                </div>
            </div>';
        }

        else{
            $texte = 'in';
            $mes.='<div class="chat incoming">
            <div class="details">
            <p id='.$i['message_id'].'>'.$i['texte'].'</p>
            </div>
        </div>';

        }}

        produceResult($mes);
