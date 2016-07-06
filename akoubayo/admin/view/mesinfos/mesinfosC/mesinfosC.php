<?php
    $model=  Model::load("UsersM");
    $d=array(
        "conditions"=>"prenom='$_SESSION[prenom]' && id_users='$_SESSION[id]'"
    );
    $info=$model->find($d,$db);
    if(!isset($info)){
        session_destroy();
        header('location:admin.html');
    }
    
    // On modifie les infos de l'utilisateur.
    if(isset($_POST['modif'])){
        $protec =  outils::postVerif($_POST);
        $d=array();
        $d['id_users']=$_SESSION['id'];
        foreach ($protec as $key => $value){
            if($key!="modif" && $key!="date_naissance" && $key!="num_secu"){
                $d[$key]=$value;
            }elseif($key=="date_naissance"){
                $search=array("/","-","_"," ");
                $value=  str_replace($search,"-", $value);
                $value= strtotime($value);
                
                $d[$key]=$value;
            }elseif ($key=="num_secu") {
                $search=array(" ");
                $value=  str_replace($search,"", $value);
                $d[$key]=$value;
            }
        }
        $count= count($d);
        if($count >1){
        $model=  Model::load("UsersM");
        $save= $model->save($d,$db);
        }
        $model=  Model::load("UsersM");
        $d = array(
            "conditions" => "id_users = $_SESSION[id]",
        );
        $parent = $model->find($d,$db);
        if (isset($parent))
        {
            $adresse=$parent[0]->getAdresse()." ".$parent[0]->getZip()." ".$parent[0]->getVille().", france";
            $coords =  outils::getCoord($adresse);
            $e=$coords->results[0];
            $lat=$e->geometry->location->lat;
            $lon=$e->geometry->location->lng;
            $d=array(
                "id_users"=>$parent[0]->getId_users(),
                "latitude_anim"=>$lat,
                "longitude_anim"=>$lon
            );
            $save=$model->save($d,$db);
        }
        header('Location:admin-mesinfos.html');
       
    }

?>
