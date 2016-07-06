<?php

$model=  Model::load("UsersM");
$d=array(
    "order"=>" visible DESC, prenom ASC"
);
$animateur=$model->find($d,$db);


if(isset($_POST["modif"]) AND count($_POST)>1){
   
    $dM=array();
    $dM['conditions']="id_users=";
    foreach ($_POST as $p =>$on){
        if($p!="modif"){
           $dM["conditions"].=$p.' OR id_users=';
        }
    }
    $dM["conditions"]=  substr($dM['conditions'],0,-12);
    $models=  Model::load("UsersM");
    $modifUsers=$models->find($dM,$db);
    
}

if(isset($_POST['prenom0'])){
    $i=0;
    
    while ($i<$_POST['compte']){
        $d=array(
            "id_users"=>$_POST['id'.$i],
            "droit"=>$_POST['droit'.$i],
            "prenom"=>$_POST['prenom'.$i],
            "nom"=>$_POST['nom'.$i],
            "statut"=>$_POST['statut'.$i],
            "mail"=>$_POST['mail'.$i],
        );
        $modifs=$model->save($d,$db);
    $i++;}
header('location:admin-animateurs.html');
    
}

if(isset($_POST['bloquer']) && count($_POST)>1){
    $dM=array();
    $dCond=array();
    
    foreach ($_POST as $p =>$on){
        if($p!="bloquer"){
           $dCond['conditions']="id_users=".$p;
           $dCond['fields']="visible,id_users";
           $verif=$model->find($dCond,$db);
           if(isset($verif)){
               $verif[0]->getVisible();
               if($verif[0]->getVisible()==0){$change=1;}else{$change=0;}
               
           $dM["id_users"]=$verif[0]->getId_users();
           $dM["visible"]=$change;
           $chan=$model->save($dM,$db);
           }
        }
    }
    header("location:admin-animateurs.html");   
}
//*****************   Ajout anim  *************** 
if(isset($_GET['r']) && $_GET['r']=="new"){
    $pass=$_POST['Aprenom'];
    $pass.=rand(20, 99);
    $passSecure=  outils::password($pass);
    $d=array(
        "prenom"=>$_POST['Aprenom'],
        "nom"=>$_POST['Anom'],
        "droit"=>$_POST['Adroit'],
        "statut"=>$_POST['Astatut'],
        "mail"=>$_POST['Amail'],
        "pass"=>$passSecure
    );
    $new=$model->save($d,$db);
    
    
            $mail=$_POST['Amail'];
            $mailPerso="akoubayofamily@gmail.com";
            $prenom=$_POST['Aprenom'];
            if(!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)){
                    $passage_ligne = "\r\n";
            }else{
                    $passage_ligne = "\n";
            }
            $sujet="Très Important : Info nécessaire pour vous déclarer";
            $message_txt="Bonjour ".$prenom.",".$passage_ligne
                    ."Afin de pouvoir vous déclarer maintenant sur Pole emploie spectacle j'ai besoin de nouveau de tes informations.".$passage_ligne
                    ."J'ai donc crée une page spécial pour centraliser toutes ces informations et ne plus avoir à t'embêter avec ca.".$passage_ligne
                    ."Tu dois simplement te connecter à la page suivante : www.akoubayo.fr/admin.html".$passage_ligne
                    ."Tu rentre en login : $prenom".$passage_ligne
                    ."Tu rentre en mot de pass : $pass (respect les majuscules) $passage_ligne merci de le faire rapidement que j'envoie les infos au comptable $passage_ligne"
                    . "Merci et bonne journée,$passage_ligne Damien";
            $message_html="";

            outils::envoieMail($mail, $sujet, $message_txt, $message_html);
            outils::envoieMail($mailPerso, $sujet, $message_txt, $message_html);
            
        
        header('location:admin-animateurs.html');
}

//*****************   Envoie de Mail  ***************   
    if(isset($_POST['pass'])){
        
        foreach ($_POST as $p => $v){
            if($p!='pass'){
                $dPass=array("conditions"=>"id_users=$p","fields"=>"prenom,mail,id_users");
                $check=$model->find($dPass,$db);
                
                if(isset($check)){
                    $pass=$check[0]->getPrenom();
                    $pass.=rand(20, 99);
                    $passSecure=  outils::password($pass);
                    $dModif=array("id_users"=>$p,"pass"=>"$passSecure");
                    $modifPass=$model->save($dModif,$db);
                    
                }
            $mail=$check[0]->getMail();
            $mailPerso="akoubayofamily@gmail.com";
            $prenom=$check[0]->getPrenom();
            if(!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)){
                    $passage_ligne = "\r\n";
            }else{
                    $passage_ligne = "\n";
            }
            $sujet="Très Important : Info nécessaire pour vous déclarer";
            $message_txt="Bonjour ".$prenom.",".$passage_ligne
                    ."Afin de pouvoir vous déclarer maintenant sur Pole emploie spectacle j'ai besoin de nouveau de tes informations.".$passage_ligne
                    ."J'ai donc crée une page spécial pour centraliser toutes ces informations et ne plus avoir à t'embêter avec ca.".$passage_ligne
                    ."Tu dois simplement te connecter à la page suivante : www.akoubayo.fr/admin.html".$passage_ligne
                    ."Tu rentre en login : $prenom".$passage_ligne
                    ."Tu rentre en mot de pass : $pass (respect les majuscules) $passage_ligne merci de le faire rapidement que j'envoie les infos au comptable $passage_ligne"
                    . "Merci et bonne journée,$passage_ligne Damien";
            $message_html="";

            outils::envoieMail($mail, $sujet, $message_txt, $message_html);
            outils::envoieMail($mailPerso, $sujet, $message_txt, $message_html);
            }
        }
        header('location:admin-animateurs.html');
    }
 //*****************  Fichier ecxel ***************    
    if(isset($_GET['r']) && $_GET['r']=="ecxel"){
        $d=array(
            'conditions'=>'visible=1',
            'order'=>'statut ASC,prenom ASC'
        );
        $ecxel=$model->find($d,$db);
        $titre='"Nom";"Prénom";"Date de naissance";"Num sécu";"Ville naissance";"Dpt naissance";"Adresse";"statut"'."\n";
        $text='';
        
        if(isset($ecxel)){
            foreach ($ecxel as $e){
                $text.='"'.$e->getNom().'";"'.$e->getPrenom().'";"'.$e->getDate_naissance().'";"'.$e->getNum_secu().'";"'.$e->getVille_naissance().'";"'.$e->getDpt_naissance().'";"'.$e->getAdresse().' '.$e->getZip().' '.$e->getVille().'";"'.$e->getNomStatut().'"'."\n";
            }
        }
        $header="anim";
        outils::ecxel($header,$titre,$text);
    }
    
    //**************    Mail des anims   *************
    if(isset($_GET['r']) && $_GET['r']=="mail"){
        $d=array(
            'conditions'=>'visible=1',
            'order'=>'statut ASC,prenom ASC'
        );
        $ecxel=$model->find($d,$db);
        $titre='"Nom";"Prénom";"Mail"'."\n";
        $text='';
        
        if(isset($ecxel)){
            foreach ($ecxel as $e){
                $text.='"'.$e->getNom().'";"'.$e->getPrenom().'";"'.$e->getMail().'"'."\n";
            }
        }
        $header="Mail";
        outils::ecxel($header,$titre,$text);
    }
?>