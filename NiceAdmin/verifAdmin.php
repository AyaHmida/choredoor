<?php
session_start();
if(isset($_POST['nom']) && isset($_POST['password'])  )
{
 // connexion à la base de données
 $db_username = 'root';
 $db_password = '';
 $db_name = 'educative';
 $db_host = 'localhost';
 $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
 or die('could not connect to database');
 
 // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
 // pour éliminer toute attaque de type injection SQL et XSS
 $nom = mysqli_real_escape_string($db,htmlspecialchars($_POST['nom'])); 
 $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
 
 
 if($nom !== "" && $password !== "")
 {
 $requete = "SELECT count(*) FROM  users where type='admin' and
 nom = '".$nom."' and password = '".$password."' ";
 $exec_requete = mysqli_query($db,$requete);
 $reponse = mysqli_fetch_array($exec_requete);
 $count = $reponse['count(*)'];
 if($count!=0) // nom d'utilisateur et mot de passe correctes
 {
 $_SESSION['nom'] = $nom;
 header('Location: users-profile.php');
 }
 else
 {
 header('Location: pages-login.php?erreur=1'); // utilisateur ou mot de passe incorrect
 }
 }
 else
 {
 header('Location: pages-login.php?erreur=2'); // utilisateur ou mot de passe vide
 }
}
else
{
 header('Location: pages-login.php');
}
mysqli_close($db); // fermer la connexion
?>