<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author Akoubayo
 */
class Mail {
    static function Devis($event,$option,$users,$db){
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
                                
$message=array();       
$message_html='<div style="width: 100%;">
<img src="http://www.akoubayo.fr/webroot/image/Akoubayo2.png" width="450px"/>
<p>
Bonjour Mme '.ucfirst($event[0]->getNom_parent()).',<br/>
vous venez d\'effectuez une pré réservation pour l\'anniversaire de <strong>'.$prenomHtml.'</strong>
qui aura lieu le <span style="color: #339900;font-weight: bolder;font-size: 18px;">'.outils::convertSemaineFull(date('N',$event[0]->getDate_heure())).' '.  date('d',$event[0]->getDate_heure()).' '.outils::convertMoisFull(date('m',$event[0]->getDate_heure())).' à '.date('H\Hi',$event[0]->getDate_heure()).'</span>.
</p>
<p style="text-align: center">
    Vous avez choisi l\'animation : <span style="color: #339900;font-weight: bolder;font-size: 18px;text-decoration: underline  ">"'.$event[0]->getNom_animation().'"</span>
</p>
<p>
    <u>Pour que la réservation soit complète merci de  :</u>
</p>
<ul>
    <li>daté et signé le devis que vous trouverez en pièce jointe</li>
    <li>d\'éditer un chèque d\'accompte de 50€ à l\'odre de la société AKOUBAYO</li>
</ul>
 <u>Renvoyez le tout à :</u><br/>
    <p style="font-style:  italic;font-size: 18px;text-align: center;">
        Société AKOUBAYO<br/>
        Mr Altman Damien<br/>
        27 rue jean baptiste potin<br/>
        92170 vanves
    </p>
    <p>
        Dès réception de votre courrier, nous vous en informerons par email.
    </p>
    <hr style="width: 60%;"/>
    <p style="text-align: center;">
    Et en attendant le grand jour n\'hésitez à consulter nos options.
    </p>
    '.$option.'
    <hr style="width: 60%;"/>
    <p>
    Si vous avez la moindre question n\'hésitez pas à nous contacter au 06 45 79 87 55.
    </p>
    <p>
    Nous vous souhaitons une agréable journée,<br/>
    cordialement l\'équipe d\'Akoubayo.
    </p>
    <p style="margin-top: 10px;margin-left: 15px">
        <img src="http://www.akoubayo.fr/webroot/image/lutin_1.PNG" width="90px" style="float: left"/>
        <p style="margin-left: 155px;margin-top: 75px;">
            <span style="font-size: x-large">Société Akoubayo</span><br/>
            Mr Altman Damien<br/>
            <span style="font-size: larger ">Tel :</span> 06 45 79 87 55<br/>
            <span style="font-size: larger">Mail :</span> akoubayofamily@gmail.com
        </p>
    </p>
    
</div>';
$message_txt="";
$sujet='Devis pour l\'anniversaire du '.outils::convertSemaineFull(date('N',$event[0]->getDate_heure())).' '.  date('d',$event[0]->getDate_heure()).' '.outils::convertMoisFull(date('m',$event[0]->getDate_heure())).' à '.date('H\Hi',$event[0]->getDate_heure()).'';
$message[2]=$message_html;
$message[1]=$message_txt;
$message[0]=$sujet;
return $message;
    }
    
static function mailFac($event,$option,$users,$db){
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
                                
$message=array();       
$message_html='<div style="width: 100%;">
<img src="http://www.akoubayo.fr/webroot/image/Akoubayo2.png" width="450px"/>
<p>
Bonjour Mme '.ucfirst($event[0]->getNom_parent()).',<br/>
voici la facture pour l\'anniversaire de <strong>'.$prenomHtml.'</strong>
qui a eu lieu le <span style="color: #339900;font-weight: bolder;font-size: 18px;">'.outils::convertSemaineFull(date('N',$event[0]->getDate_heure())).' '.  date('d',$event[0]->getDate_heure()).' '.outils::convertMoisFull(date('m',$event[0]->getDate_heure())).' à '.date('H\Hi',$event[0]->getDate_heure()).'</span>.
</p>
<p>
  Merci pour la confiance que vous nous avez accordée et en espérant avoir été à la hauteur de vos attentes.  
</p>
<p>
Si l\'animation de votre enfant vous à plu je vous invite à nous laisser un commentaire</br>
sur <span style="font-weght:bolder"><a href="http://www.akoubayo.fr/Livreor.html"><i>notre livre d\'or </i></a></span>afin que nous puissions continuer à faire de belles animations pour les enfants.
</p>
<p>
A bientot,
Les lutins d\Akoubayo.
</p>
    
</div>';
$message_txt="";
$sujet='Facture N°'.$event[0]->getNum_facture().' : AKOUBAYO';
$message[2]=$message_html;
$message[1]=$message_txt;
$message[0]=$sujet;
return $message;
    }
    
static function mailCheque($event,$option,$users,$db){
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
                                
$message=array();       
$message_html='<div style="width: 100%;">
<img src="http://www.akoubayo.fr/webroot/image/Akoubayo2.png" width="450px"/>
<p>
Bonjour Mme '.ucfirst($event[0]->getNom_parent()).',<br/>
je vous informe que nous avons bien reçu le devis signé accompagné du chèque d\'accompte de 50€.<br/>
La date du <strong>'.outils::convertSemaineFull(date('N',$event[0]->getDate_heure())).' '.  date('d',$event[0]->getDate_heure()).' '.outils::convertMoisFull(date('m',$event[0]->getDate_heure())).' à '.date('H\Hi',$event[0]->getDate_heure()).'</strong>
est bien réservé pour <strong>'.$prenomHtml.'</strong>.<br/>
Nous vous enverrons un mail la veille de l\'animation pour vous confirmer toutes les informations et vous donner le prénom de l\'animateur<br/>
<p>
Si vous avez la moindre question n\'hésitez pas à nous contacter au 06.45.79.87.55.<br/>
Cordialement,<br/>
Damien Altman.
</p>    
</div>';
$message_txt="";
$sujet='Akoubayo : Information sur l\'animation du : '.outils::convertSemaineFull(date('N',$event[0]->getDate_heure())).' '.  date('d',$event[0]->getDate_heure()).' '.outils::convertMoisFull(date('m',$event[0]->getDate_heure()));
$message[2]=$message_html;
$message[1]=$message_txt;
$message[0]=$sujet;
return $message;
    }  
    
    
static function InfoAnim($event,$option,$users,$db){
                    $event[0]->getFindOldOption($db);
                    $event[0]->getFindOption($db);
                    $event[0]->setNew_enfant($db);
                    $anim=$event[0]->getAnimateur($db);
                    
//********    On vérifi les animateurs                   
$countAnim=  count($anim);
$nomAnim="";
if($countAnim==1){
   $nomAnim="L'animateur qui viendra chez vous s'appelle : <strong>".$anim[0]->getPrenom()."</strong>";
   $nomAnim.="<br/>L'animateur se présentera chez vous 30mn avant le début de l'animation, soit à : <strong>".date('H\Hi',($event[0]->getDate_heure()-1800))."</strong>";
}elseif($countAnim>1){
   $nomAnim="Les animateurs qui viendront chez vous s'appellent : ";
   foreach ($anim as $an){
       $nomAnim.='<strong>'.ucfirst($an->getPrenom())."</strong>, ";
   }
   $nomAnim=substr($nomAnim,0,-11);
   $nomAnim.='<br/>Ils se présenteront chez vous 30mn avant le début de l\'animation, soit à : <strong>'.date('H\Hi',($event[0]->getDate_heure()-1800)).'</strong>';
}
// *******************************************

//*********************   On verifie les enfants ******************
                     
                            $enfant=$event[0]->getNew_enfant();
                            $prenomE="";
                            
                            if($enfant==0){
                                 $prenomE.='<strong>'.ucfirst($event[0]->getPrenom_enfant()).' '.$event[0]->getDate_naissance().' ans,</strong> ';
                            }
                            else{ 
                                foreach ($enfant as $e){
                                    $prenomE.='<strong>'.ucfirst($e->getPrenom_enfant()).' '.outils::age(date('Y',$e->getDate_naissance()),date('m',$e->getDate_naissance()),date('j',$e->getDate_naissance())).' ans,</strong> ';
                                    
                                }
                                $prenomE=substr($prenomE,0,-11);
                            }
// *******************************************
                            
//*********************   On verifie code et interphone ******************
 $codeP=$event[0]->getCode_parent();
 $interP=$event[0]->getInter_Parent();
 $etageP=$event[0]->getEtage_parent();
 $chercherP=$event[0]->getChercher_com();
 $code="Aucun";
 $inter="Aucun";
 $etage=$etageP;
 $chercher='';
 if(!empty($codeP)){
     $code=$code;
 }
 if(!empty($interP)){
     $inter=$interP;
 }
 if($chercherP==1){
     $chercher="<li>Le commédien arrivera à la gare de <strong>".$event[0]->getGare_parent()."</strong>. Il vous appelera quand il sera dans train pour vous dire à quelle gare il arrive et que vous puissiez le reconnaitre</li>";
 }
 
// *******************************************

 
//********   Combien il reste à payer
        if($event[0]->getBool_accompte()==1){
                                    $paye=$event[0]->getTarif_tot()-50;
                                }else{
                                    $paye=$event[0]->getTarif_tot();
                                }
// *******************************************

 
 
//********    On vérifi si il y a des options
if($event[0]->getCountOption()>0){
        $optionClient="";
        foreach ($event[0]->getOption() as $old){
            if($old->getType_option()==0){
                $optionClient.=$old->getNoms_option().", ";
            }
        }
}
if($event[0]->getCountOldOption()>0){
        foreach ($event[0]->getOldOption() as $old){
            $optionClient.=$old->getNom_old_opt().", ";                     
        }
}
if(empty($optionClient)){
    $optionClient="Aucune";
}else{
   $optionClient=substr($optionClient,0,-2);
}

// *******************************************
                               
                                $mail=$users[0]->getEmail_parent();
                                $mailPerso="akoubayofamily@gmail.com";
                                if(!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)){
                                    $passage_ligne = "\r\n";
                                }else{
                                     $passage_ligne = "\n";
                                }
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
                                
$message=array();       
$message_html='<div style="width: 100%;">
<img src="http://www.akoubayo.fr/webroot/image/Akoubayo2.png" width="450px"/>
<p>
Bonjour Mme '.ucfirst($event[0]->getNom_parent()).',<br/>
nous vous confirmons que l\'anniversaire de <strong>'.$prenomHtml.'</strong>
aura bien lieu le : '.outils::convertSemaineFull(date('N',$event[0]->getDate_heure())).' '.  date('d',$event[0]->getDate_heure()).' '.outils::convertMoisFull(date('m',$event[0]->getDate_heure())).' à '.date('H\Hi',$event[0]->getDate_heure()).'
<p>
<strong><u>Afin que tout se déroule pour le mieux merci de vérifier les informations suivantes :<u></strong>
    <ul>
        <li>Vous fêtez l\'anniversaire de : '.$prenomE.' </li>
        <li>Vous avez choisi l\'animation : <strong><i>'.$event[0]->getNom_animation().'<i></strong></li>
        <li> L\'animation aura lieu le : <strong>'.outils::convertSemaineFull(date('N',$event[0]->getDate_heure())).' '.  date('d',$event[0]->getDate_heure()).' '.outils::convertMoisFull(date('m',$event[0]->getDate_heure())).'</strong></li>
        <li>L\'animation débute à : <strong>'.date('H\Hi',$event[0]->getDate_heure()).'</strong></li>
        <li>L\'animation se déroule à l\'adresse suivante : <strong>'.$event[0]->getAdresse_parent().' '.$event[0]->getZip_parent().' '.$event[0]->getVille_parent().'</strong></li>
        <li>Code pour entrer : '.$code.'</li>
        <li>Interphone : '.$inter.'</li>
        <li>Etage: '.$etage.'</li>
        '.$chercher.'
        <li>Les options :<strong>'.$optionClient.'</strong></li>
        <li>Réglement à effectuer auprès du commédien (Chèque ou espèce): '.$paye.'€</li>    
    </ul>
</p>

<p>
'.$nomAnim.'
</p>
    <hr style="width: 60%;"/>
    <p>
    Si vous avez la moindre question n\'hésitez pas à nous contacter au 06 45 79 87 55.
    </p>
    <p>
    Nous vous souhaitons une agréable journée,<br/>
    cordialement l\'équipe d\'Akoubayo.
    </p>
    <p style="margin-top: 10px;margin-left: 15px">
        <img src="http://www.akoubayo.fr/webroot/image/lutin_1.PNG" width="90px" style="float: left"/>
        <p style="margin-left: 155px;margin-top: 75px;">
            <span style="font-size: x-large">Société Akoubayo</span><br/>
            Mr Altman Damien<br/>
            <span style="font-size: larger ">Tel :</span> 06 45 79 87 55<br/>
            <span style="font-size: larger">Mail :</span> akoubayofamily@gmail.com
        </p>
    </p>
    
</div>';
$message_txt="";
$sujet='Récapitulatif pour l\'anniversaire du :  '.outils::convertSemaineFull(date('N',$event[0]->getDate_heure())).' '.  date('d',$event[0]->getDate_heure()).' '.outils::convertMoisFull(date('m',$event[0]->getDate_heure())).' à '.date('H\Hi',$event[0]->getDate_heure()).'';
$message[2]=$message_html;
$message[1]=$message_txt;
$message[0]=$sujet;
return $message;
    }  
    
static function infoTrain($event){
                $mail=$event[0]->getMail();
        if(!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)){
            $passage_ligne = "\r\n";
        }else{
            $passage_ligne = "\n";
        }
    $message=array();       
    $message_html='<div style="width: 100%;">
                    <p>Bonjour '.$event[0]->getPrenom().',<br/>
                       Tu as un spectacle le <strong>'.outils::convertSemaineFull(date('N',$event[0]->getAnim_date())).' '.date('d',$event[0]->getAnim_date()).' '.outils::convertMoisFull(date('m',$event[0]->getAnim_date())).' '.date('Y',$event[0]->getAnim_date()).'</strong>
                       de <strong>'.$event[0]->getAnim_dep().' à '.$event[0]->getAnim_arr().'</strong>.  
                    </p>';
    //  On vérifie si il y a un dep HLP
    if($event[0]->getHlp_dep_date()==0){
      $message_html.='<p>
                         Tu pars en animation de <strong>'.$event[0]->getAnim_dep().' le '.outils::convertSemaineFull(date('N',$event[0]->getAnim_heure_dep())).' '.date('d',$event[0]->getAnim_heure_dep()).' '.outils::convertMoisFull(date('m',$event[0]->getAnim_heure_dep())).' à '.date('H:i',$event[0]->getAnim_heure_dep()).'</strong><br/>
                         Tu arrives d\'animation à <strong>'.$event[0]->getAnim_arr().' à '.date('H:i',$event[0]->getAnim_heure_arr()).'.</strong><br/>
                         Numéros du train : <strong>'.$event[0]->getAnim_num_train().'</strong><br/>
                         Voiture de l\'animation : <strong>'.$event[0]->getAnim_num_voiture().'</strong><br/>
                         Ta prise de poste est à <strong>'.date('H:i',($event[0]->getAnim_prise_poste()-1800)).'</strong>    
                      </p>';
      if($event[0]->getHlp_ret_date()!=0){
         $message_html.='<p>
                            Ton retour est prevue le <strong>'.date('d/m/Y à H:i',$event[0]->getHlp_ret_heure_dep()).'</strong> avec le train <strong>n°'.$event[0]->getHlp_ret_num_train().'</strong><br/>
                            Tu arrives à <strong>'.date('H:i',$event[0]->getHlp_ret_heure_arr()).'</strong>    
                        </p>';
      }
                       
    }else{
       $message_html.='<p>
                         Tu pars en HLP de <strong>'.$event[0]->getHlp_dep_dep().' le '.outils::convertSemaineFull(date('N',$event[0]->getHlp_dep_heure_dep())).' '.date('d',$event[0]->getHlp_dep_heure_dep()).' '.outils::convertMoisFull(date('m',$event[0]->getHlp_dep_heure_dep())).' à '.date('H:i',$event[0]->getHlp_dep_heure_dep()).'</strong><br/>
                         Tu arrives en HLP à <strong>'.$event[0]->getHlp_dep_arr().' à '.date('H:i',$event[0]->getHlp_dep_heure_arr()).'.</strong><br/>
                         Numéros du train : <strong>'.$event[0]->getHlp_dep_num_train().'</strong><br/>
                         Ta prise de poste est à  : <strong>'.date('H:i',($event[0]->getHlp_dep_heure_dep()-3600)).'</strong>    
                       </p>
                       <p>
                         Tu pars en animation de <strong>'.$event[0]->getAnim_dep().' le '.outils::convertSemaineFull(date('N',$event[0]->getAnim_heure_dep())).' '.date('d',$event[0]->getAnim_heure_dep()).' '.outils::convertMoisFull(date('m',$event[0]->getAnim_heure_dep())).' à '.date('H:i',$event[0]->getAnim_heure_dep()).'</strong><br/>
                         Tu arrives d\'animation à <strong>'.$event[0]->getAnim_arr().' à '.date('H:i',$event[0]->getAnim_heure_arr()).'.</strong><br/>
                         Numéros du train : <strong>'.$event[0]->getAnim_num_train().'</strong><br/>
                         Voiture de l\'animation : <strong>'.$event[0]->getAnim_num_voiture().'</strong>
                         Ta prise de poste est à <strong>'.date('H:i',$event[0]->getAnim_prise_poste()).'</strong>    
                       </p>';
           if($event[0]->getHlp_ret_date()!=0){
                $message_html.='<p>
                                   Ton retour est prevue le <strong>'.date('d/m/Y à H:i',$event[0]->getHlp_ret_heure_dep()).' avec le train n°'.$event[0]->getHlp_ret_num_train().'</strong><br/>
                                   Tu arrives à <strong>'.date('H:i',$event[0]->getHlp_ret_heure_arr()).'</strong>    
                               </p>';
           }
    }
    if($event[0]->getNuit()==true){
        $message_html.='<p>
                            Tu as une nuitée de prévu à ';
        if($event[0]->getHlp_dep_date()==0){
            $message_html.=' <strong>'.$event[0]->getAnim_arr().'</strong>';
        }else{
            $message_html.=' <strong>'.$event[0]->getHlp_dep_arr().'</strong>';
        }
        $message_html.='<br/><strong>Penses à bien réserver ton hotel et récupérer un maximum de facture.<strong></p>';
    }
    $message_html.= 'Merci de me <strong>répondre par mail ou texto pour me confirmer</strong> que tu as bien recu toutes les infos.<br/>Bonne journée, Damien</div>';
    $message_txt="";
    $sujet='Spectacle SNCF le :  '.outils::convertSemaineFull(date('N',$event[0]->getAnim_heure_dep())).' '.date('d',$event[0]->getAnim_heure_dep()).' '.outils::convertMoisFull(date('m',$event[0]->getAnim_heure_dep()));
    $message[2]=$message_html;
    $message[1]=$message_txt;
    $message[0]=$sujet;
    return $message;
    }
}
