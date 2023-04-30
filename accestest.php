<?php 
try{
    $bdd=new PDO("mysql:host=localhost;dbname=educative","root","",array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

}
catch (Exception $e){
    die('erreur des connexion :'.$e->getMessage());
}
?>