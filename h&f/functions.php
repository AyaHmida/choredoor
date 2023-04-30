<?php
function addVisteur($data){
    include "accestest.php";
    $nom=$data['nom'];
    $motpasse=$data['motpasse'];
    $type=$data['type'];
    $req="insert into users(nom,password,type) values('$nom','$motpasse','$type')";
    $res=$bdd->query($req);
    if ($res){
        return true;
    }
    else{
        return false;
    }

}


?>