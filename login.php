<?php
/*
  Si la variable globale $erreurCreation est définie, un message d'erreur est affiché
  dans un paragraphe de classe 'message'
*/
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
	<section class="form signup">
	<h1 class="">Connexion</h1>
	<form id = "formulaire" class="registration-form" method="post" action="services/login.php">
	
		<div class="field input">
		<div class="error-text"></div>
			<label class="field input">
				<span class="label-text">email</span>
				<input type="text" name="email" placeholder="email">
			</label>
		</div>
	 	<div class="field input">
			<label class="password" >
				<span class="label-text" >Password</span>
				
				<input type="password" name="password" placeholder="password">
				<i class="fas fa-eye"></i>
				
			</label>
		</div>
		<div class="field button">
			<button class="submit" name="valid" value="bouton_valid">Se connecter</button>
		</div>
		<div class="field button"><button class="submit" name="valid" value=""><a href="index.php">S'inscrire</a></button>
      
</div>
	</form>
	</section>
</div>
</body>
</html>