
<?php
/*
  Si la variable globale $erreurCreation est définie, un message d'erreur est affiché
  dans un paragraphe de classe 'message'
*/
set_include_path('..'.PATH_SEPARATOR);
spl_autoload_register(function ($className) {
  include ("php/{$className}.class.php");
});

require_once('php/initDataLayer.php');
session_name('synthese_isidore');
session_start() ;
/*
if(!isset($_SESSION['ident'])){
	$data->updatestatus($_SESSION['ident'],'Offline now');
}*/
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <meta charset="UTF-8"/>
    <title>Création d'utilisateur</title>
    
	<link rel="stylesheet" href="style/style.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
	<script src="javascript/createUser.js"></script>
	<
	<script src="javascript/fetchUtils.js"></script>

    
</head>
<body>

<div id ="message"></div>
<div class="wrapper">
<section class="form signup">
	<h1 class="text-center">Register</h1>
	<form id = "formulaire" class="registration-form" method="post" action="services/createUser.php" enctype="multipart/form-data" autocomplete="off">
		<div class="field input">
		<div class="error-text"></div>
		<label >
			<span class="label-text">Nom</span>
			<input type="text" name="nom" placeholder="nom">
		</label>
		</div>
		<div class="field input">
		<label >
			<span class="field input">Prenom</span>
			<input type="text"  placeholder="Prenom" name="prenom">
		</label>
	   </div>	
	   <div class="field input">
		<label>
			<span class="field input">Login</span>
			<input type="text" name="login" placeholder="Login">
		</label>
		</div>
		<div class="field input">
		<label class="password" >
			<span class="field input">Password</span>
			
			<input type="password" name="password" placeholder="Password" >
			<i class="fas fa-eye"></i>
			
		</label>
		</div>
		<div class="field input">
        <label class="email" >
			<span class="field input">email</span>
			
			<input type="text" name="email" placeholder="email">
            
			
		</label>
		</div>
		<div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" >
        </div>
		<div class="field button">
			<button class="submit" name="valid" value="bouton_valid">Sign Me Up</button>
		</div>
		<div class="field button" ><button class="submit" name="valid" value=""><a href="login.php">Sign In</a></button>
      
</div>
	</form>
</section>
<script src = "javascript/devoileurmotdepasse.js"></script>
</div>
</body>
</html>