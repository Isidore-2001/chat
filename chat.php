<?php
/*
  Si la variable globale $erreurCreation est définie, un message d'erreur est affiché
  dans un paragraphe de classe 'message'
*/
session_name('synthese_isidore');
session_start() ;

if(!isset($_SESSION['ident'])){
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <meta charset="UTF-8"/>
    <title>Création d'utilisateur</title>
     
	<link rel="stylesheet" href="style/style.css" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
	<script src="javascript/login.js"></script>
	<script src="javascript/fetchUtils.js"></script>

</head>
<body>
<div class="wrapper">
<section class="chat-area">
      <header>
      <?php
$id = intval($_GET['user_id']);
$_SESSION['i'] = $res['email'];
set_include_path('..'.PATH_SEPARATOR);
spl_autoload_register(function ($className) {
  include ("php/{$className}.class.php");
});

require_once('php/initDataLayer.php');

$res = $data->info1($id); ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="images/<?php echo $res['image']?>" alt="">
        <div class="details">
          <span><?php 

            
echo $res['nom']; echo ' '; echo $res['prenom']?></span>
          <p><?php echo $res['status'] ?></p>
        </div>
      </header>
      <div class="chat-box">

            
        <?php
$result = $data->getchat($_SESSION['ident'], $res['email']);
$_SESSION['i'] = $res['email'];

$mes = "";
foreach ($result as $i){
  $id = 0;
    if ($i['email1'] == $_SESSION['ident']){
        $texte = 'out';

        $mes.='<div class="chat outgoing">
        
            <div class="details">
                <p>'.$i['texte'].'</p>
            </div>
            
        </div>';
    }

    else{
        $texte = 'in';
        $mes.='<div class="chat incoming">
        <div class="details">
            <p>'.$i['texte'].'</p>
        </div>
        
    </div>';

    }
    $id = $i['message_id'];
  }
    echo $mes;
    

?>
      </div>
      <form action="services/chat-insert.php" class="typing-area">
       
            <input type="text" class="incoming_id" name="id" value="<?php echo $id; ?>" method="post" hidden>
            
        <input type="text" class="incoming_id" name="email" value="<?php echo $res['email']; ?>" method="post" hidden>
        
        <input type="text" name="message" class="input-field" placeholder="Type a message here..."  method="post" autofocus>
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>
</html>