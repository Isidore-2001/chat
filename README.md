# chat

# Création d'une application de   Chat

Dans cette application de chat j'ai utilisé : 
 <ul><li>JavaScript (Sans le Jquery)</li>
 <li>Php</li> 
 <li>JSON</li> 
 <li>HTML</li> 
 <li>CSS</li>

Le but est d'appliquer les connaissances de l'utilisation de L'API fetch appris au cours de Technologie du Web 2 
de l'Université pour dévélopper un site web de tchat .

# Les déroulements 

<ul>
<li>
Modélisation de la base de donnée (De CMD vers MLD) </li>
<li>Mise en place des vues</li>
<li>Connexion à la base de donnée</li>
<div>Pour la base de donnée j'ai utilisé celui fourni par l'Université de lille utilisant le langage d'interrogation de base de donnée 
Postgresql</div>
<li>Mise en place des fonctions et une classe principale regroupant toutes les méthodes utiles</li>
<li>Mise en place des différents services par exemples</li>
<ul><li>Un service pour récupérer tous les utilisateurs dans la base de donnée </li>
<li>Un service pour la connexion d'un utilisateur</li>
<li>Un service pour l'enregistrement d'un uitilisateur </li></ul>
...
<li>Mise en place des fichiers javaScript pour traiter les données reçu par le fichier Json</li>
<li>Réglage des différents bugs</li>
</ul>

# Utilisation
Pour utiliser le code source télécharger le .
Ensuite importer le fichier sql dans votre PhpAdmin, adapté le si nécessaire 
Et mettez vos informations de connexion dans le fichier webtp_dsn.txt.

# Problème
 

Le problème rencontré est que le fait de lancer à chaque fois des requêtes en JavaScript 
surchargeait le serveur. Ce qui fait que les applications de chat actuelle utilise plus 
les WebSockets
