<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
<?php 
session_name('synthese_isidore');
session_start() ;

if(!isset($_SESSION['ident'])){
  header("location: login.php");
}
?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>utilisateur</title>
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php

set_include_path('..'.PATH_SEPARATOR);
spl_autoload_register(function ($className) {
  include ("php/{$className}.class.php");
});

require_once('php/initDataLayer.php');

$res = $data->info($_SESSION['ident']); ?>
          <img src="images/<?php echo $res['image']; ?>" alt="">
          <div class="details">
            <span><?php 

            
            echo $res['nom']; echo ' '; echo $res['prenom']?> </span>
            <p><?php echo $res['status'] ?></p>
          </div>
        </div>
        <a href="services/logout.php" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search..." >
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
      <!--
           <a href="#">
              <div class="content">
              <img src="images/isi.jpg" alt="">
              <div class="details">
              <span>Coding Nepal </span>
              <p> This is message</p>
            </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
              <div class="content">
              <img src="images/isi.jpg" alt="">
              <div class="details">
              <span>Coding Nepal </span>
              <p> This is message</p>
            </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
              <div class="content">
              <img src="images/isi.jpg" alt="">
              <div class="details">
              <span>Coding Nepal </span>
              <p> This is message</p>
            </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
              <div class="content">
              <img src="images/isi.jpg" alt="">
              <div class="details">
              <span>Coding Nepal </span>
              <p> This is message</p>
            </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            -->
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>
  <script src="javascript/fetchUtils.js"></script>
</body>
</html>