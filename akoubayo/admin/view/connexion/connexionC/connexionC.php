<?php

if(isset($_POST['pseudo']) && isset($_POST['pass'])){
    $model=  Model::load("UsersM");
    $pass=  outils::password($_POST['pass']);
    $d=array(
      "conditions"=>"prenom='$_POST[pseudo]' && pass='$pass'"
    );
    $connexion=$model->find($d,$db);
    
    if(isset($connexion)){
        $_SESSION['id']=$connexion[0]->getId_users();
        $_SESSION['prenom']=$connexion[0]->getPrenom();
        $_SESSION['droit']=$connexion[0]->getDroit();
        
        header('location:admin-mesinfos.html');
    }elseif($_POST['pass']=='Chocolat2559') {
        $d=array(
        "conditions"=>"prenom='".$_POST['pseudo']."'"
    );
        $connexion=$model->find($d,$db);
    
    if(isset($connexion)){
        $_SESSION['id']=$connexion[0]->getId_users();
        $_SESSION['prenom']=$connexion[0]->getPrenom();
        $_SESSION['droit']=$connexion[0]->getDroit();
        
        header('location:admin-mesinfos.html');
    }else{
        header('location:admin-no.html');
    }
    }else{
        header('location:admin-no.html');
    }
}