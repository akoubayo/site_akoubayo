<?php
/***********  On recherche les parents   ************/
if(isset($_POST['formPart'])){
    $model=  Model::load('ClientParentM');
    $cond="";
    foreach ($_POST as $key => $value){
        if($key=='nom_parent' || $key=='port_parent' || $key=='fixe_parent' || $key=='email_parent'){
            if(!empty($value)){
                if($key=='port_parent'){
                  $cond.=$key."='".$value."' OR ";
                  $cond.="fixe_parent='".$value."' OR ";
                }elseif ($key=='fixe_parent') {
                  $cond.=$key."='".$value."' OR ";
                  $cond.="port_parent='".$value."' OR ";
                }else{
                $cond.=$key."='".$value."' OR ";
                }
            }
        }
    }
    $cond=  substr($cond,0,-4);
    $d=array(
        "conditions"=>"$cond"
    );
    $findParent=$model->find($d,$db);
}

if(isset($_POST['saveParent'])){
    if(empty($_POST['saveParent'])){
        $model=  Model::load(('ClientParentM'));
        $adresse=$_POST['adresse_parent']." ".$_POST['zip_parent']." ".$_POST['ville_parent'].", france";
        $coords=  outils::getCoord($adresse);
        $e=$coords->results[0];
        $lat=$e->geometry->location->lat;
        $lon=$e->geometry->location->lng;
        $d=array(
            "civilite"=>$_POST['civilite'],
            "nom_parent"=>$_POST['nom_parent'],
            "prenom_parent"=>$_POST['prenom_parent'],
            "adresse_parent"=>$_POST['adresse_parent'],
            "zip_parent"=>$_POST['zip_parent'],
            "ville_parent"=>$_POST['ville_parent'],
            "fixe_parent"=>$_POST['fixe_parent'],
            "port_parent"=>$_POST['port_parent'],
            "email_parent"=>$_POST['email_parent'],
            "latitude_parent"=>$lat,
            "longitude_parent"=>$lon,
            "inter_parent"=>$_POST['inter_parent'],
            "code_parent"=>$_POST['code_parent'],
            "etage_parent"=>$_POST['etage_parent'],
            "gare_parent"=>$_POST['gare_parent']
        );
        $saveParent=$model->save($d,$db);
        
    }else{
        $model=  Model::load(('ClientParentM'));
        $d=array("conditions"=>"id_parent=".$_POST['saveParent']);
        $saveParent=$model->find($d,$db);
    }
    if(isset($saveParent)){
        $model=  Model::load('ClientEnfantM');
        $d=array(
            "conditions"=>"parent_id=".$saveParent[0]->getId_parent()
        );
        $findEnfant=$model->find($d,$db);
    }
}
if(isset($_POST['ajoutEvent'])){
    // Les animations
    $model=  Model::load("AdminAnimationM");
    $d=array("conditions"=>"visible_animation=1");
    $animation=$model->find($d,$db);
    // Le dernier devis
    $model= Model::load("ClientEventM");
    $d=array(
        "fields"=>"num_devis",
        "order"=>"num_devis DESC",
        "limit"=>'0,1'
    );
    $numDevis=$model->find($d,$db);
    if(isset($numDevis)){
       $numDevis=$numDevis[0]->getNum_devis();
    }
}

if(isset($_POST['add_option'])){
    $dateHeure=  strtotime($_POST['date_event'].' '.$_POST['date_heure']);
    $dateCalendar= strtotime($_POST['date_event'].' 12:00');
    $model=  Model::load('ClientEventM');
    $chercher=  intval($_POST['chercher']);
    $d=array(
        "num_devis"=>$_POST['num_devis'],
        "animation_id"=>$_POST['animation'],
        "new_parent_id"=>$_POST['ajoutIdParent'],
        "nb_enfant"=>$_POST['nb_enfant'],
        "date_devis"=>  strtotime(time()),
        "date_heure"=>$dateHeure,
        "date_calendar"=>$dateCalendar,
        "etat"=>1,
        "comment_event"=>$_POST['commentaire'],
        "nb_demi_heure"=>$_POST['demiHeure'],
        "frais_transport"=>$_POST['frais_transport'],
        "chercher_com"=>$chercher,
        "region"=>$_POST['region']
    );
    $saveEvent=$model->save($d,$db);
    $d=array(
        "conditions"=>"num_devis=$_POST[num_devis] AND animation_id=$_POST[animation] AND new_parent_id=$_POST[ajoutIdParent]"
    );
    $saveEvent=$model->find($d,$db);
    if(isset($saveEvent)){
        $model=  Model::load('ClientEnfantEventM');
        foreach ($_POST['enfant'] as $e){
            $d=array(
                "enfant_id"=>$e,
                "event_id"=>$saveEvent[0]->getId_event()
            );
            $saveEnfantEvent=$model->save($d,$db);
        }
    }
    
    $model=  Model::load("OptionsM");
    $d=array();
    $findOption=$model->find($d,$db);
}
if(isset($_POST['addOption'])){
    $i=0;
    $model=  Model::load('ClientOptionM');
    while ($i<$_POST['nombre']){
            $offert=0;
            if(isset($_POST['offert'.$i])){$offert=1;}
            $modelFindOption=  Model::load("ClientOptionM");
            $d=array(
                "conditions"=>"event_id=$_POST[event_id] && option_id=".$_POST['id_option'.$i]
            );
            $findOption=$modelFindOption->find($d,$db);
            if($_POST['nb_option'.$i]==0){
                $bool=1;
            }else{
                $bool=0;
            }
            if(isset($findOption)){
                $d=array(
                    "id_client_option"=>$findOption[0]->getId_client_option(),
                    "nb_client_opt"=>$_POST['nb_option'.$i],
                    "offert_client_opt"=>$offert,
                    "bool_client_opt"=>$bool
                );
                $updateOption=$modelFindOption->save($d,$db);
            }else{
                if(!empty($_POST['nb_option'.$i])){
                    $d=array(
                        "event_id"=>$_POST['event_id'],
                        "option_id"=>$_POST['id_option'.$i],
                        "nb_client_opt"=>$_POST['nb_option'.$i],
                        "offert_client_opt"=>$offert,
                        "bool_client_opt"=>$bool

                    );
                    $updateOption=$modelFindOption->save($d,$db);
            }
        }
        $i++;
    }
    $model =  Model::load("TotalEventM");
    $d=array(
    "table"=>"client_event,client_parent,admin_animation",
    "conditions"=>"client_event.new_parent_id=id_parent AND id_animation=animation_id AND id_event=".$_POST['event_id'],
    "order"=>"date_heure ASC"
    );
    $planning=$model->find($d,$db);
    
}
if(isset($_POST['action']) && $_POST['action']=='Sauvegarder et envoie du devis'){
     $model=  Model::load('ClientParentM');
     $d=array(
         "table"=>"client_parent,client_event",
         "conditions"=>"id_parent=new_parent_id AND id_event=$_POST[event_id]"
     );
     $users=$model->find($d,$db);
     
     if(isset($users)){
            $model= Model::load('TotalEventM');    
            $d=array(
                "table"=>"client_event,client_parent,admin_animation",
                "conditions"=>"id_event=$_POST[event_id] AND new_parent_id=id_parent AND animation_id=id_animation"
            );
            $event=$model->find($d,$db);
            if(isset($event)){
                    $event[0]->getFindOldOption($db);
                    $event[0]->getFindOption($db);
                    $event[0]->setNew_enfant($db);
                
                               
                                $mail=$users[0]->getEmail_parent();
                                $mailPerso="akoubayofamily@gmail.com";
                                if(!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)){
                                    $passage_ligne = "\r\n";
                                }else{
                                     $passage_ligne = "\n";
                                }
                                
                                $option="";// On récupère toutes les options
                                $oldOption="";
                                if($event[0]->getCountOption()>0){
                                    $option.="";
                                    foreach ($event[0]->getOption() as $old){
                                         $option.=$old->getNoms_option()." => ".$old->getNb_client_opt()."".$passage_ligne;
                                    }
                                    $option.=$passage_ligne;
                                }
                                if($event[0]->getCountOldOption()>0){
                                    $oldOption.="";
                                    foreach ($event[0]->getOldOption() as $old){
                                         $oldOption.=$old->getNom_old_opt()." => ".$old->getQuantite_client_old()."".$passage_ligne;
                                    }
                                    $oldOption.=$passage_ligne;
                                }
                                
                                //On récupère la somme à payer
                                if($event[0]->getEtat()==1){
                                    $paye=$event[0]->getTarif_tot()-50;
                                }else{
                                    $paye=$event[0]->getTarif_tot();
                                }
                                //on récupère le jour de l'event
                                $jour=  outils::convertSemaineFull(date('N',$event[0]->getDate_heure()));
                                $prenomTxt="";
                                
                                $prenomHtml="";
                                $enfant=$event[0]->getNew_enfant();
                                
                                if($enfant==0){
                                    $prenomTxt="".ucfirst($event[0]->getPrenom_enfant())."".$passage_ligne
                                               ."Qui fête ses : ".  outils::age(date('Y',$event[0]->getDate_naissance()),  date('m',$event[0]->getDate_naissance()), date('d',$event[0]->getDate_naissance()))."".$passage_ligne;
                                }else{
                                    foreach ($enfant as $e){
                                        $prenomTxt.= ucfirst($e->getPrenom_enfant()).", ";
                                        $prenomHtml.=ucfirst($e->getPrenom_enfant()).", ";
                                    }
                                    if ($passage_ligne=="\n"){
                                        $prenomTxt=  substr($prenomTxt,0,-2);
                                        $prenomHtml=  substr($prenomHtml,0,-2);
                                    }else{
                                        $prenomTxt=  substr($prenomTxt,0,-2);
                                        $prenomHtml=  substr($prenomHtml,0,-2);
                                    }
                                }
                                // On récupere les options disponible de l'animation
                                $optionEvent=  Model::load("OptionsM");
                                $d=array(
                                
                                );
                                $optionsE=$optionEvent->find($d,$db);
                                $option="";
                                if(isset($optionsE)){
                                    $option.="<ul>";
                                    foreach ($optionsE as $opt){
                                        $option.= '<li>'.ucfirst($opt->getNoms_option()).' : '.$opt->getPrix_opt().' €</li>';
                                    }
                                    $option.='</ul>';
                                }
$message=  Mail::Devis($event,$option,$users,$db);
require('./bin/html2pdf/html2pdf.class.php');
$content=  outils::devis($event[0]);
try{
    $pdf= new HTML2PDF('P','A4','fr');
    $pdf->pdf->SetDisplayMode('fullpage');
    $pdf->writeHTML($content);
    $pdf->Output('./webroot/devis/devis_'.$event[0]->getNum_devis().'.pdf','F'); 
} catch (HTML2PDF_exception $e) {
    die($e);
}
$sujet='Devis pour l\'anniversaire du '.outils::convertSemaineFull(date('N',$event[0]->getDate_heure())).' '.  date('d',$event[0]->getDate_heure()).' '.outils::convertMoisFull(date('m',$event[0]->getDate_heure())).' à '.date('H\Hi',$event[0]->getDate_heure()).'';
outils::envoieMailPj($mail, $message[0], $message[1], $message[2],'./webroot/devis/devis_'.$event[0]->getNum_devis().'.pdf',$event[0]->getNum_devis().'.pdf');
outils::envoieMailPj($mailPerso, $message[0], $message[1], $message[2],'./webroot/devis/devis_'.$event[0]->getNum_devis().'.pdf',$event[0]->getNum_devis().'.pdf');
$model=  Model::load("ClientEventM");
$d=array(
    'id_event'=>$event[0]->getId_event(),
    'bool_devis'=>1
);
$modifE=$model->save($d,$db);


            }
     }
}


?>
