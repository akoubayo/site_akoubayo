<?php
if(isset($_GET['r']) && isset($_GET['s'])){
    $mois=$_GET['r'];
    $year=$_GET['s'];
    $currentTime=strtotime('01-'.$mois.'-'.$year);
    $currentTime2=date('m', strtotime('+1 month', $currentTime ));
    if($currentTime2 == 01)
        $currentTime2 =  strtotime('01-'.$currentTime2.'-'.($year+1));
    else
        $currentTime2 =  strtotime('01-'.$currentTime2.'-'.$year);
}else{
    $mois=date('m');
    $year=date('Y');
    $currentTime=strtotime('01-'.$mois.'-'.$year);
    $currentTime2=date('m', strtotime('+1 month', $currentTime ));
    if($currentTime2 == 01)
        $currentTime2=  strtotime('01-'.$currentTime2.'-'.($year+1));
    else
        $currentTime2=  strtotime('01-'.$currentTime2.'-'.$year);
}
$model =  Model::load("TotalEventM");
$d=array(
    "conditions"=>"id_parent=client_enfant.parent_id AND id_enfant=client_event.parent_id AND id_animation=animation_id AND client_event.new_parent_id=0 AND date_heure BETWEEN '$currentTime' AND '$currentTime2'",
    "order"=>"date_heure ASC"
);
$planning=$model->find($d,$db);
if(isset($planning)){
$planning= new ArrayObject($planning);     
$d=array(
    "table"=>"client_event,client_parent,admin_animation",
    "conditions"=>"client_event.new_parent_id=id_parent AND id_animation=animation_id AND client_event.new_parent_id>0  AND date_heure BETWEEN '$currentTime' AND '$currentTime2'",
    "order"=>"date_heure ASC"
);
$planning2=$model->find($d,$db);  
if(isset($planning2)){
    $count=count($planning2);
    $i=0;
    while ($i<$count){
        $planning->append($planning2[$i]);
        $i++;
    }
}
$planning->uasort('comparer');
}      
else 
{
    $d=array(
    "table"=>"client_event,client_parent,admin_animation",
    "conditions"=>"client_event.new_parent_id=id_parent AND id_animation=animation_id AND client_event.new_parent_id>0  AND date_heure BETWEEN '$currentTime' AND '$currentTime2'",
    "order"=>"date_heure ASC"
);
$planning=$model->find($d,$db); 

}

function comparer($a, $b) {
  return $a->getDate_heure() > $b->getDate_heure();
} 

//*************************   Modification de l'évènement   *************
if(isset($_POST['modif_event'])){
    $post=  outils::postVerif($_POST);
    $d=array(
        "id_event"=>$post['id_event'],
        "animation_id"=>$post['animation_id'],
        "nb_demi_heure"=>$post['nb_demi_heure'],
        "date_calendar"=>strtotime($post['date']),
        "date_heure"=>  strtotime($post['date'].' '.$post['date_heure']),
        "nb_enfant"=> $post['nb_enfant'],
        "frais_transport"=> $post['frais_transport'],
        "comment_event"=>"$post[comment_event]",
        
    );
    $modif=  Model::load("ClientEventM");
    $mod=$modif->save($d,$db);
    header('location:admin-gestion.html');
}


//*************************   Ajout d'option   *****************
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
    header('location:admin-gestion.html');
}
/*************************   Ajout Animateur    ***********************/
if(isset($_POST['idEvent'])){
    $i=0;
    $count=$_POST['compte'];
    $model=  Model::load("ClientAnimateurM");
    while ($i<$count){
        if(isset($_POST['placement'.$i])){
            $d=array(
                "conditions"=>"event_id=".$_POST['idEvent']." AND users_id=".$_POST['idUsers'.$i]
            );
            $find=$model->find($d,$db);
            if(isset($find)){
                $d=array(
                    "id_client_animateur"=>$find[0]->getId_client_animateur(),
                    "bool_client_anim"=>0,
                );
                $save=$model->save($d,$db);
            }else{
                $d=array(
                    "users_id"=>$_POST['idUsers'.$i],
                    "event_id"=>$_POST['idEvent'],
                    "bool_client_anim"=>0
                );
                $save=$model->save($d,$db);
            }
            $placement=  Model::load('PlanningAnimM');
            $d=array(
                "id_planning_anim"=>$_POST['idPlanning'.$i],
                "bool_placement"=>1,
            );
            $plac=$placement->save($d,$db);
        }elseif (!isset($_POST['placement'.$i]) && $_POST['update'.$i]==1) {
                $d=array(
                    "conditions"=>"event_id=".$_POST['idEvent']." AND users_id=".$_POST['idUsers'.$i]
                );
                $find=$model->find($d,$db);
                if(isset($find)){
                    $d=array(
                    "id_client_animateur"=>$find[0]->getId_client_animateur(),
                    "bool_client_anim"=>1,
                    );
                    $save=$model->save($d,$db);
                    $placement=  Model::load('PlanningAnimM');
            $d=array(
                "id_planning_anim"=>$_POST['idPlanning'.$i],
                "bool_placement"=>0,
            );
            $plac=$placement->save($d,$db);
                }
        }
        $i++;
    }
    $model=  Model::load('ClientEventM');
    $d=array(
        "id_event"=>$_POST['idEvent'],
        "bool_info"=>0
    );
    $info=$model->save($d,$db);
    if(isset($_POST['mois']) && isset($_POST['annee'])){
        header('location:admin-gestion_'.$_POST['mois'].'_'.$_POST['annee'].'.html');
    }else{
    header('location:admin-gestion.html');
    }
 
}

/**************  Envoie de mail   ****************/

// Envoie info aux animateurs
if(isset($_POST['action']) && $_POST['action']=='info'){
            $i=0;
            $mailEnvoie='mail-';
            $eventM=  Model::load('TotalEventM');
            $clientAnimM= Model::load('ClientAnimateurM');
            $usersM=  Model::load('UsersM');
            while ($i<$_POST['compte']){
                $model=  Model::load('ClientEventM');
                $d=array("fields=>new_parent_id","conditions"=>"id_event=".$_POST['idEvent'.$i]."");
                $parentId=$model->find($d,$db);
                $parent=$parentId[0]->getNew_parent_id();
                if($parent<=0){
                $d=array("conditions"=>"id_event=".$_POST['idEvent'.$i]." AND id_parent=client_enfant.parent_id AND id_enfant=client_event.parent_id AND id_animation=animation_id"); 
                $event=$eventM->find($d,$db); // On récupère l'event
                }else{
                    if(!isset($event) || isset($event) && count($event)>1){
                        $d=array(
                            "table"=>"client_event,client_parent,admin_animation",
                            "conditions"=>"client_event.new_parent_id=id_parent AND id_animation=animation_id AND id_event=".$_POST['idEvent'.$i]." ",
                            "order"=>"date_heure ASC"
                        );
                        $event=$eventM->find($d,$db);
                    }
                }
                if(isset($event)){
                    $event[0]->getFindOldOption($db);
                    $event[0]->getFindOption($db);
                    $event[0]->setNew_enfant($db);
                    $d=array(
                      "conditions"=>"event_id=".$event[0]->getId_event()." AND bool_client_anim=0"  
                    );
                    $clientAnim=$clientAnimM->find($d,$db); // On récupère les anim assignés à l'event
                    if(isset($clientAnim)){
                        foreach ($clientAnim as $clientA){
                            $d=array(
                                "fields"=>"mail,prenom",
                                "conditions"=>"id_users=".$clientA->getUsers_id(),
                            );
                            $users=$usersM->find($d,$db);// On reupère le mail de chaque utilisateur
                            
                            /************   On ecrit le mail  ****************/
                            if(isset($users)){
                                $mailEnvoie.=$users[0]->getMail().'-';
                                $mail=$users[0]->getMail();
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
                                if($event[0]->getBool_accompte()==1){
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
                                    $prenomTxt.="C'est l'anniversaire de : ".$event[0]->getPrenom_enfant()."".$passage_ligne
                                               ."Qui fête ses : ".$event[0]->getDate_naissance()." ans".$passage_ligne;
                                    $prenomHtml.="C'est l'anniversaire de : ".$event[0]->getPrenom_enfant()."<br/>"
                                               ."Qui fête ses : ".$event[0]->getDate_naissance()." ans <br/>";
                                }else{
                                    foreach ($enfant as $e){
                                        $prenomTxt.= "C'est l'anniversaire de : ".$e->getPrenom_enfant()."".$passage_ligne
                                                      ."Qui fête ses : ".outils::age(date('Y',$e->getDate_naissance()),date('m',$e->getDate_naissance()),date('j',$e->getDate_naissance())).' ans et '.$passage_ligne;
                                        $prenomHtml.= "C'est l'anniversaire de : ".$e->getPrenom_enfant()."<br/>"
                                                      ."Qui fête ses : ".outils::age(date('Y',$e->getDate_naissance()),date('m',$e->getDate_naissance()),date('j',$e->getDate_naissance())).' ans et <br/>';
                                    }
                                    if ($passage_ligne=="\n"){
                                        $prenomTxt=  substr($prenomTxt,0,-5);
                                        $prenomHtml=  substr($prenomHtml,0,-8);
                                    }else{
                                        $prenomTxt=  substr($prenomTxt,0,-7);
                                        $prenomHtml=  substr($prenomHtml,0,-8);
                                    }
                                }
                                $chercherP=$event[0]->getChercher_com();
                                 if($chercherP==1){
                                                $chercherTxt="Les parents viendront te à la gare de ".$event[0]->getGare_parent().". Appel quand tu seras dans train pour vous dire à quelle gare tu arrives et que vous puissiez vous reconnaitre".$passage_ligne."Si toutefois tu décides de venir par toi même appel les parents pour qu'ils ne viennent pas pour rien à la gare".$passage_ligne;
                                                $chercherHtml="Les parents viendront te à la gare de <strong>".$event[0]->getGare_parent()."</strong>. Appel quand tu seras dans train pour vous dire à quelle gare tu arrives et que vous puissiez vous reconnaitre<br/>Si toutefois tu décides de venir par toi même appel les parents pour qu'ils ne viennent pas pour rien à la gare<br/>";
                                 }else{
                                     $chercherTxt="Les parents ne pourront pas venir te chercher à la gare".$passage_ligne." Gare la plus proche :".$passage_ligne;
                                     $chercherHtml="Les parents ne pourront pas venir te chercher à la gare<br/> Gare la plus proche :<strong>".$event[0]->getGare_parent()."</strong>";
                                 }
                                 
                                $sujet="Akoubayo : Information sur l'animation du ".date('d/m/Y',$event[0]->getDate_heure());
                                $message_txt="Bonjour ".$users[0]->getPrenom().",".$passage_ligne
                                             ."Tu as une animation le ".$jour." ".  date('d/m/Y',$event[0]->getDate_heure())."".$passage_ligne
                                             ."Adresse :".$passage_ligne
                                             ."".$event[0]->getAdresse_parent()." ".$event[0]->getZip_parent()." ".$event[0]->getVille_parent()
                                             ."Tel portable : ".$event[0]->getPort_parent()."".$passage_ligne
                                             ."Tel Fixe : ".$event[0]->getFixe_parent()."".$passage_ligne."".$passage_ligne
                                             ."".ucfirst($event[0]->getCivilite())." ".ucfirst($event[0]->getNom_parent())." t'attend à ".  date('H:i',($event[0]->getDate_heure()-1800))."".$passage_ligne
                                             ."Type de l'animation : ".$event[0]->getNom_animation()."".$passage_ligne
                                             ."L'animation commence à : ".date('H:i',$event[0]->getDate_heure())."".$passage_ligne
                                             ."Durée de l'animation : ".($event[0]->getDuree_animation()+($event[0]->getNb_demi_heure()*0.5))."H".$passage_ligne
                                             ."".$prenomTxt
                                             ."Qui fête ses : ".$event[0]->getDate_naissance()." ans".$passage_ligne
                                             ."Il reste à payer : ".$paye."€".$passage_ligne
                                             ."Il y aura enfants ".$event[0]->getNb_enfant()." enfants".$passage_ligne."".$passage_ligne
                                             ."".$chercherTxt
                                             ."Information complémentaire :".$passage_ligne
                                             ."".$event[0]->getComment_event()."".$passage_ligne
                                             ."Les options à donner sont : "
                                             ."".$option."".$oldOption;
                                
                                $message_html="Bonjour ".$users[0]->getPrenom().",<br/><br/>"
                                             ."Tu as une animation le :<span style=color:red><strong>".$jour." ".  date('d/m/Y',$event[0]->getDate_heure())."</strong></span><br/><br/>"
                                             ."<strong>Adresse :</strong><br/>"
                                             ."".$event[0]->getAdresse_parent()." ".$event[0]->getZip_parent()." ".$event[0]->getVille_parent()."<br/>"
                                             ."Tel portable : ".$event[0]->getPort_parent()."<br/>"
                                             ."Tel Fixe : ".$event[0]->getFixe_parent()."<br/><br/>"
                                             ."".ucfirst($event[0]->getCivilite())." ".ucfirst($event[0]->getNom_parent())." t'attend à ".  date('H:i',($event[0]->getDate_heure()-1800))."<br/>"
                                             ."Type de l'animation : ".$event[0]->getNom_animation()."<br/>"
                                             ."L'animation commence à : ".date('H:i',$event[0]->getDate_heure())."<br/>"
                                             ."Durée de l'animation : ".($event[0]->getDuree_animation()+($event[0]->getNb_demi_heure()*0.5))."H<br/>"
                                             ."Jusqu'à : ".date('H:i',$event[0]->getDate_heure()+((($event[0]->getNb_demi_heure()*0.5)*60)*60)+($event[0]->getDuree_animation()*60*60))."<br/>"
                                             ."".$prenomHtml.""
                                             ."Il reste à payer : ".$paye."€<br/>"
                                             ."Il y aura enfants ".$event[0]->getNb_enfant()." enfants<br/><br/>"
                                             ."".$chercherHtml."<br/>"
                                             ."Information complémentaire :<br/>"
                                             ."".$event[0]->getComment_event()."<br/><br/>"
                                             ."Les options à donner sont : <br/>"
                                             ."".$option."<br/>".$oldOption;
                                            outils::envoieMail($mail, $sujet, $message_txt, $message_html);
                                            outils::envoieMail($mailPerso, $sujet, $message_txt, $message_html);
                            }
                        }
                        $model=  Model::load("ClientEventM");
                        $d=array(
                            'id_event'=>$event[0]->getId_event(),
                            'bool_info'=>1
                        );
                        $boolInfo=$model->save($d,$db);
                    }
                }
            $i++;}
            $mailEnvoie=  substr($mailEnvoie,0,-1);
            if(isset($_GET['r'])){
                $mois=$_GET['r'];
            }else{
                $mois=date('m');
            }
                if(isset($_POST['mois']) && isset($_POST['annee'])){
                    header('location:admin-gestion_'.$_POST['mois'].'_'.$_POST['annee'].'.html');
                }else{
                header('location:admin-gestion.html');
                }

}

if(isset($_POST['action']) && $_POST['action']=='devis'){
            $i=0;
            $mailEnvoie='mail-';
            $eventM=  Model::load('TotalEventM');
            
            while ($i<$_POST['compte']){
                $model=  Model::load('ClientParentM');
                $d=array(
                    "table"=>"client_parent,client_event",
                    "conditions"=>"id_parent=new_parent_id AND id_event=".$_POST['idEvent'.$i].""
                );
                $users=$model->find($d,$db);
                if(!isset($users)){
                    $d=array(
                    "table"=>"client_parent,client_event,client_enfant",
                    "conditions"=>"id_parent=client_enfant.parent_id AND client_event.parent_id=id_enfant AND id_event=".$_POST['idEvent'.$i].""
                );
                $users=$model->find($d,$db);
                }
                
                $mailEnvoie.=$users[0]->getEmail_parent().'-';
                $mail=$users[0]->getEmail_parent();
                $mailPerso="akoubayofamily@gmail.com";
                $d=array("conditions"=>"id_event=".$_POST['idEvent'.$i]." AND id_parent=client_enfant.parent_id AND id_enfant=client_event.parent_id AND id_animation=animation_id"); 
                $event=$eventM->find($d,$db); // On récupère l'event
                if(!isset($event) || isset($event) && count($event)>1){
                    $d=array(
                        "table"=>"client_event,client_parent,admin_animation",
                        "conditions"=>"client_event.new_parent_id=id_parent AND id_animation=animation_id AND id_event=".$_POST['idEvent'.$i]." ",
                        "order"=>"date_heure ASC"
                    );
                    $event=$eventM->find($d,$db);
                }
                if(isset($event)){
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
                    outils::envoieMailPj($mail, $message[0], $message[1], $message[2],'./webroot/devis/devis_'.$event[0]->getNum_devis().'.pdf',$event[0]->getNum_devis().'.pdf');
                    outils::envoieMailPj($mailPerso, $message[0], $message[1], $message[2],'./webroot/devis/devis_'.$event[0]->getNum_devis().'.pdf',$event[0]->getNum_devis().'.pdf');
                    $model=  Model::load("ClientEventM");
                    $d=array(
                        'id_event'=>$event[0]->getId_event(),
                        'bool_devis'=>1
                    );
                    $modifE=$model->save($d,$db);
                   
                }
   
           $i++; }
           $mailEnvoie=  substr($mailEnvoie,0,-1);
            if(isset($_GET['r'])){
                $mois=$_GET['r'];
            }else{
                $mois=date('m');
            }
            header('location:admin-gestion_'.$mois.'_'.$mailEnvoie.'.html');
}
//************  Envoie facture   ************//
if(isset($_POST['action']) && $_POST['action']=='fac'){
            $i=0;
            $mailEnvoie='mail-';
            $eventM=  Model::load('TotalEventM');
          
            while ($i<$_POST['compte']){
                //On vérifie si il y a un numéro de facture
                    $modelFac=  Model::load("ClientEventM");
                    $d=array("conditions"=>"id_event=".$_POST['idEvent'.$i]);
                    $numfac=$modelFac->find($d,$db);
                    if(isset($numfac)){
                        $numFacture=$numfac[0]->getNum_facture();
                        if(empty($numFacture)||$numFacture==0){
                            $annul=$numfac[0]->getBool_annule();
                            if($annul==0){
                            $d=array(
                                "fields"=>"num_facture,id_event",
                                "conditions"=>"bool_annule=0",
                                "order"=>"num_facture DESC", 
                            );
                            $addNum=$modelFac->find($d,$db);
                            $newNum=$addNum[0]->getNum_facture();
                            }else{
                                $newNum= 12222;
                            }
                           
                            $d=array(
                                "id_event"=>$_POST['idEvent'.$i],
                                "num_facture"=>($newNum+1)
                            );
                            $savNum=$modelFac->save($d,$db);
                        }
                    }
                
                $model=  Model::load('ClientParentM');
                $d=array(
                    "table"=>"client_parent,client_event",
                    "conditions"=>"id_parent=new_parent_id AND id_event=".$_POST['idEvent'.$i].""
                );
                $users=$model->find($d,$db);
                if(!isset($users)){
                    $d=array(
                    "table"=>"client_parent,client_event,client_enfant",
                    "conditions"=>"id_parent=client_enfant.parent_id AND client_event.parent_id=id_enfant AND id_event=".$_POST['idEvent'.$i].""
                );
                $users=$model->find($d,$db);
                }

                $mailEnvoie.=$users[0]->getEmail_parent().'-';
                $mail=$users[0]->getEmail_parent();
                $mailPerso="akoubayofamily@gmail.com";
                $d=array("conditions"=>"id_event=".$_POST['idEvent'.$i]." AND id_parent=client_enfant.parent_id AND id_enfant=client_event.parent_id AND id_animation=animation_id");                
                $event=$eventM->find($d,$db); // On récupère l'event
                if(!isset($event) || isset($event) && count($event)>1){
                    $d=array(
                        "table"=>"client_event,client_parent,admin_animation",
                        "conditions"=>"client_event.new_parent_id=id_parent AND id_animation=animation_id AND id_event=".$_POST['idEvent'.$i]." ",
                        "order"=>"date_heure ASC"
                    );
                    $event=$eventM->find($d,$db);
                }
                if(isset($event)){
                    
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
                                        
                    $message=  Mail::mailFac($event, $option, $users, $db);
                    require('./bin/html2pdf/html2pdf.class.php');
                    $content=  outils::facture($event[0]);
                    if(isset($_POST['impFac'])){
                         /*try{
                        $pdf= new HTML2PDF('P','A4','fr');
                        $pdf->pdf->SetDisplayMode('fullpage');
                        $pdf->writeHTML($content);
                        $pdf->Output(''.$event[0]->getNum_facture().'.pdf',false); 
                    } catch (HTML2PDF_exception $e) {
                        die($e);
                    }*/
                     $nom='facture_'.$event[0]->getNum_facture().'';
                     $fichier = './webroot/devis/facture_'.$event[0]->getNum_facture().'.pdf'; // le fichier en question 
                     header('Content-type: application/pdf');
                     header('Content-Disposition:inline; filename="'.$nom.'.pdf"');
                     readfile($fichier);
            }else{
                    try{
                        $pdf= new HTML2PDF('P','A4','fr');
                        $pdf->pdf->SetDisplayMode('fullpage');
                        $pdf->writeHTML($content);
                        $pdf->Output('./webroot/devis/facture_'.$event[0]->getNum_facture().'.pdf','F'); 
                    } catch (HTML2PDF_exception $e) {
                        die($e);
                    }
                    
                    //outils::envoieMailPj($mail, $message[0], $message[1], $message[2],'./webroot/devis/facture_'.$event[0]->getNum_facture().'.pdf','facture_'.$event[0]->getNum_facture().'.pdf');
                    outils::envoieMailPj($mailPerso, $message[0], $message[1], $message[2],'./webroot/devis/facture_'.$event[0]->getNum_facture().'.pdf','facture'.$event[0]->getNum_facture().'.pdf');
                    $model=  Model::load("ClientEventM");
                    $d=array(
                        'id_event'=>$event[0]->getId_event(),
                        'bool_facture'=>1
                    );
                    $modifE=$model->save($d,$db);
                    }
                   
                }
   
           $i++; }
           $mailEnvoie=  substr($mailEnvoie,0,-1);
            if(isset($_GET['r'])){
                $mois=$_GET['r'];
            }else{
                $mois=date('m');
            }
            header('location:admin-gestion_'.$mois.'_2015.html');
}

//************  Chèque recu   ************//
if(isset($_POST['action']) && $_POST['action']=='recu'){
            $i=0;
            $mailEnvoie='mail-';
            $eventM=  Model::load('TotalEventM');
            
            while ($i<$_POST['compte']){
                $model=  Model::load('ClientParentM');
                $d=array(
                    "table"=>"client_parent,client_event",
                    "conditions"=>"id_parent=new_parent_id AND id_event=".$_POST['idEvent'.$i].""
                );
                $users=$model->find($d,$db);
                
                if(!isset($users)){
                    $d=array(
                    "table"=>"client_parent,client_event,client_enfant",
                    "conditions"=>"id_parent=client_enfant.parent_id AND client_event.parent_id=id_enfant AND id_event=".$_POST['idEvent'.$i].""
                );
                $users=$model->find($d,$db);
                }
                $mailEnvoie.=$users[0]->getEmail_parent().'-';
                $mail=$users[0]->getEmail_parent();
                $mailPerso="akoubayofamily@gmail.com";
                $d=array("conditions"=>"id_event=".$_POST['idEvent'.$i]." AND id_parent=client_enfant.parent_id AND id_enfant=client_event.parent_id AND id_animation=animation_id"); 
                $event=$eventM->find($d,$db); // On récupère l'event
                if(!isset($event) || isset($event) && count($event)>1){
                    $d=array(
                        "table"=>"client_event,client_parent,admin_animation",
                        "conditions"=>"client_event.new_parent_id=id_parent AND id_animation=animation_id AND id_event=".$_POST['idEvent'.$i]." ",
                        "order"=>"date_heure ASC"
                    );
                    $event=$eventM->find($d,$db);
                }
                if(isset($event)){                   
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
                                
                    $message=  Mail::mailCheque($event, $option, $users, $db);
                    
                    outils::envoieMail($mail, $message[0], $message[1], $message[2],'./webroot/devis/facture_'.$event[0]->getNum_facture().'.pdf','facture_'.$event[0]->getNum_facture().'.pdf');
                    outils::envoieMail($mailPerso, $message[0], $message[1], $message[2],'./webroot/devis/facture_'.$event[0]->getNum_facture().'.pdf','facture'.$event[0]->getNum_facture().'.pdf');
                    $model=  Model::load("ClientEventM");
                    $d=array(
                        'id_event'=>$event[0]->getId_event(),
                        'etat'=>2,
                        'bool_accompte'=>1,
                    );
                    $modifE=$model->save($d,$db);
                   
                }
   
           $i++; }
           $mailEnvoie=  substr($mailEnvoie,0,-1);
            if(isset($_GET['r'])){
                $mois=$_GET['r'];
            }else{
                $mois=date('m');
            }
            header('location:admin-gestion_'.$mois.'_'.$mailEnvoie.'.html');
}


//************  Dernière info avant anim  ************//
if(isset($_POST['action']) && $_POST['action']=='animInfo'){
            $i=0;
            $mailEnvoie='mail-';
            $eventM=  Model::load('TotalEventM');
            
            while ($i<$_POST['compte']){
                $model=  Model::load('ClientEventM');
                $d=array("fields=>new_parent_id","conditions"=>"id_event=".$_POST['idEvent'.$i]."");
                $parentId=$model->find($d,$db);
                $parent=$parentId[0]->getNew_parent_id();
                $model=  Model::load('ClientParentM');
                if($parent>0){
                $d=array(
                    "table"=>"client_parent,client_event",
                    "conditions"=>"id_parent=new_parent_id AND id_event=".$_POST['idEvent'.$i].""
                );
                $users=$model->find($d,$db);
                }else{
                    $d=array(
                    "table"=>"client_parent,client_event,client_enfant",
                    "conditions"=>"id_parent=client_enfant.parent_id AND client_event.parent_id=id_enfant AND id_event=".$_POST['idEvent'.$i].""
                );
                $users=$model->find($d,$db);
                }
                $mail=$users[0]->getEmail_parent();
                $mailPerso="akoubayofamily@gmail.com";
                $d=array("conditions"=>"id_event=".$_POST['idEvent'.$i]." AND id_parent=client_enfant.parent_id AND id_enfant=client_event.parent_id AND id_animation=animation_id"); 
                $event=$eventM->find($d,$db); // On récupère l'event
                if(!isset($event) || isset($event) && count($event)>1){
                    $d=array(
                        "table"=>"client_event,client_parent,admin_animation",
                        "conditions"=>"client_event.new_parent_id=id_parent AND id_animation=animation_id AND id_event=".$_POST['idEvent'.$i]." ",
                        "order"=>"date_heure ASC"
                    );
                    $event=$eventM->find($d,$db);
                }
                if(isset($event)){
                    $anim=$event[0]->getAnimateur($db);
                    if($anim==0){
                        $mailEnvoie.='ManqueAnim'.$users[0]->getEmail_parent().'-';
                    }else{
                        $mailEnvoie.=$users[0]->getEmail_parent().'-';
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
                                
                    $message=  Mail::InfoAnim($event, $option, $users, $db);
                    
                    outils::envoieMail($mail, $message[0], $message[1], $message[2],'./webroot/devis/facture_'.$event[0]->getNum_facture().'.pdf','facture_'.$event[0]->getNum_facture().'.pdf');
                    outils::envoieMail($mailPerso, $message[0], $message[1], $message[2],'./webroot/devis/facture_'.$event[0]->getNum_facture().'.pdf','facture'.$event[0]->getNum_facture().'.pdf');
                    $model=  Model::load("ClientEventM");
                    $d=array(
                        'id_event'=>$event[0]->getId_event(),
                        'etat'=>4
                    );
                    $modifE=$model->save($d,$db);
                   
                    }
                }
   
           $i++; }
           $mailEnvoie=  substr($mailEnvoie,0,-1);
            if(isset($_GET['r'])){
                $mois=$_GET['r'];
            }else{
                $mois=date('m');
            }
            header('location:admin-gestion_'.$mois.'_'.$mailEnvoie.'.html');
}
//************  Animation terminé  ************//
if(isset($_POST['action']) && $_POST['action']=='fin'){
        $model=  Model::load("ClientEventM");
        $i=0;
        while ($i<$_POST['compte']){
                    $d=array(
                        'id_event'=>$_POST['idEvent'.$i],
                        'etat'=>3,
                        'bool_annule'=>0
                    );
                    $modifE=$model->save($d,$db);
        $i++;}
         header('location:admin-gestion.html');
}
//************  Annulation animation  ************//
if(isset($_POST['action']) && $_POST['action']=='annul'){
        $model=  Model::load("ClientEventM");
        $i=0;
        while ($i<$_POST['compte']){
                    $d=array(
                        'id_event'=>$_POST['idEvent'.$i],
                        'etat'=>5,
                        'bool_annule'=>1
                    );
                    $modifE=$model->save($d,$db);
        $i++;}
         header('location:admin-gestion.html');
         
}

if(isset($_POST['dateGestion'])){
    header('location:admin-gestion_'.$_POST['dateGestion'].'_'.$_POST['anneeGestion'].'.html');
}

//******************    Telecharger les paye   ***********************

if(isset($_POST['text'])){
outils::ecxel($_POST['header'],$_POST['titre'],$_POST['text']);
header('location:admin-gestion.html');
}