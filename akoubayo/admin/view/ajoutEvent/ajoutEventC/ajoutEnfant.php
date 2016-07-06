<?php
include_once '../../../../core/includeAjax.php';
    $dateNaissance=  strtotime($_POST['date_naissance']);
    $model=  Model::load('ClientEnfantM');
    $d=array(
        "parent_id"=>$_POST['parent_id'],
        "prenom_enfant"=>$_POST['prenom_enfant'],
        "sexe_enfant"=>$_POST['prenom_enfant'],
        "date_naissance"=>$dateNaissance
    );
    $saveEnfant=$model->save($d,$db);
    $t=array();
    if(isset($saveEnfant)){
        $t['retour']=1;
        $t['prenom_enfant']=$saveEnfant[0]->getPrenom_enfant();
        $sexe=$saveEnfant[0]->getSexe_enfant();
        if($sexe==0){
            $t['sexe_enfant']="Garcon";
        }else{
            $t['sexe_enfant']="Fille";
        }
        $t['date_enfant']=outils::age(date('Y',$saveEnfant[0]->getDate_naissance()),date('m',$saveEnfant[0]->getDate_naissance()),date('j',$saveEnfant[0]->getDate_naissance()));
        $t['id_enfant']=$saveEnfant[0]->getId_enfant();
    }else{
        $t['retour']=0;
    }
    echo json_encode($t);

?>