<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of outils
 *
 * @author akoubayo
 */
class outils {
    
    static function referencement ($cond,$model,$db){
        $mod=Model::load("$model");
        $d=array(
            "conditions"=>"$cond"
        );
        $ref=$mod->find($d,$db);
        return $ref;
    }
    
    static function password($donnees){
        $donnees .= 'cestpourtonbien'.$donnees;
        $donnees=  sha1($donnees);
        $donnees = strtolower($donnees);
        $search = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
        $replace = array('25-(5Y','327)àç(A','2_è(\'5E','DEDE&éà)ç585','8àçé&)74DDZ','K&éDZ&874','JHJ&&=)K4558','jZ&=àçDj874','zdZ&=)D457','zdzd&àa8zdDZ','zdZ&à&çZDDAASS478','48à&ç&ç7DEZS','DD&ç&çRAS7854','ZD&)&à574z','EF&)àçz874','jiHG85zsd','548ZDAd','KJ58ZS4','ZDZ458','51zdZZD','ZDZDqdsd87','SDsszDZ','4588EDFSQ','zefze58','hgezjyufze-25:;','dss584-è_');
        $donnees= str_replace($search, $replace, $donnees);
        $donnees=  sha1($donnees);
        return $donnees;
    }
    
    static function postVerif($donnee){
        $verif=array();
        foreach ($donnee as $key =>$value){
            $value =  stripslashes($value);
            $value =  addslashes($value);
            $value =  strip_tags($value);
            $value=  htmlspecialchars($value);
            $verif[$key]=$value;
        }
        return $verif;
    }
    
    static function convertSemaine($jour){
        switch ($jour) {
            case 1: $jours="L ";
                break;
            case 2: $jours="Ma ";
                break;
            case 3: $jours="Me ";
                break;
            case 4: $jours="J ";
                break;
            case 5: $jours="V ";
                break;
            case 6: $jours="S ";
                break;
            case 7: $jours="D ";
                break;
            
            default: $jours="Lundi";
                break;
        }
        return $jours;
    }
    static function convertSemaineFull($jour){
        switch ($jour) {
            case 1: $jours="Lundi";
                break;
            case 2: $jours="Mardi";
                break;
            case 3: $jours="Mercredi";
                break;
            case 4: $jours="Jeudi";
                break;
            case 5: $jours="Vendredi";
                break;
            case 6: $jours="Samedi";
                break;
            case 7: $jours="Dimanche";
                break;
            
            default: $jours="Lundi";
                break;
        }
        return $jours; 
    }
    static function convertMoisFull($moi){
        switch ($moi) {
            case 1: $mois="Janvier";
                break;
            case 2: $mois="Février";
                break;
            case 3: $mois="Mars";
                break;
            case 4: $mois="Avril";
                break;
            case 5: $mois="Mai";
                break;
            case 6: $mois="Juin";
                break;
            case 7: $mois="Juillet";
                break;
            case 8: $mois="Aout";
                break;
            case 9: $mois="Septembre";
                break;
            case 10: $mois="Octobre";
                break;
            case 11: $mois="Novembre";
                break;
            case 12: $mois="Décembre";
                break;
            
            default: $mois="Aout";
                break;
        }
        return $mois; 
    }
    static function envoieMail($mail,$sujet,$message_txt,$message_html){
        if(!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)){
                $passage_ligne = "\r\n";
        }else{
                $passage_ligne = "\n";
        }
        $boundary = "-----=".md5(rand());
        $header = "From: \"Akoubayo\"<akoubayofamily@gmail.com>".$passage_ligne;
        $header .= "Reply-to: \"Akoubayo\" <akoubayofamily@gmail.com>".$passage_ligne;
        $header .= "MIME-Version: 1.0".$passage_ligne;
        $header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
        
       
        //=====Création du message.
        $message = $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format texte.
        $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_txt.$passage_ligne;
        //==========
        if(!empty($message_html)){
        $message.= $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format HTML
        $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_html.$passage_ligne;
        }
        //==========
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        //==========
        
        mail($mail,$sujet,$message,$header);
    }
    
    static function envoieMailPj($mail,$sujet,$message_txt,$message_html,$pj,$nomPj){
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui présentent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
} 
//=====Lecture et mise en forme de la pièce jointe.
$fichier   = fopen("".$pj."", "r");
$attachement = fread($fichier, filesize("".$pj.""));
$attachement = chunk_split(base64_encode($attachement));
fclose($fichier);
//==========
 
//=====Création de la boundary.
$boundary = "-----=".md5(rand());
$boundary_alt = "-----=".md5(rand());
//==========
  
//=====Création du header de l'e-mail.
$header = "From: \"Akoubayo\"<akoubayofamily@gmail.com>".$passage_ligne;
$header.= "Reply-to: \"Akoubayo\" <akoubayofamily@gmail.com>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
 
$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
 
//=====Ajout du message au format HTML.
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
 
//=====On ferme la boundary alternative.
$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
//==========
 
 
 
$message.= $passage_ligne."--".$boundary.$passage_ligne;
 
//=====Ajout de la pièce jointe.
$message.= "Content-Type: application/pdf; name=\"".$nomPj."\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
$message.= "Content-Disposition: attachment; filename=\"".$nomPj."\"".$passage_ligne;
$message.= $passage_ligne.$attachement.$passage_ligne.$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne; 
//========== 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
 
//==========
    }
    static function ecxel($header,$titre,$text){
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'.$header.'.csv"');
        echo $titre;
        echo $text;
        exit();
    }
    
    static function strtoTimeFr($value){
                $search=array("/","-","_"," ");
                $value=  str_replace($search,"-", $value);
                $value1=  substr($value,3,3);
                $value1.= substr($value,0,3);
                $value1.= substr($value,6,4);
                $value= strtotime("14-02-2012");
                return $value;
    }
    static function age($annee_naissance, $mois_naissance, $jour_naissance) {
 
	
	$timestamp = time();
 
	//On evalue l'age, à un an par exces
	$age = date('Y',$timestamp) - $annee_naissance;
 
	//On retire un an si l'anniversaire n'est pas encore passé
	if($mois_naissance > date('n', $timestamp) || ( $mois_naissance== date('n', $timestamp) && $jour_naissance > date('j', $timestamp)))
		$age--;
 
	return $age;
    }
static function devis($event){
        ob_start()
        ?>
<style>
    table{
        width:100%;
    }
    .tab{
            border:1px solid black;
            border-collapse: collapse;
            
        }
    .tab td{
            border: 1px solid black;
            height: 25px;
            padding-left: 5px
        }
    .center{
            text-align: center;
            
        }
</style>
<page backtop='10mm' backleft='5mm' backright='10mm' backbottom='30mm'>
    <page_footer>
       <hr/>
       <h1>Bon de commande</h1>
       <p>Date :</p>
       <p>Signature, précédé de la mention "Bon pour accord"</p>
       <br/>
       <br/>
    </page_footer>
    <table>
        <tr>
            <td style="width: 35%;vertical-align: top">
                <br/>
                <strong>SARL AKOUBAYO</strong><br/>
                27 rue jean baptiste potin<br/>
                92170 Vanves.<br/>
                Tel : 06 45 79 87 55<br/>
                Mail : akoubayofamily@gmail.com<br/>
                N°Siret : 531 289 106 00019<br/>
                N°TVA : FR 93531289106<br/>
            </td>
            <td style="width: 30%;vertical-align: top"><img src="http://www.akoubayo.fr/webroot/image/Akoubayo2.png" style="width:350px;margin-left: -65px"/></td>
            <td style="width: 35%;vertical-align: top">
                <br/>
        <strong><?php echo $event->getCivilite().' '.$event->getNom_parent() ?></strong><br/>
        <?php echo $event->getAdresse_parent().'<br/>'.$event->getZip_parent().' '.$event->getVille_parent(); ?><br/>
        Tel :<?php echo $event->getPort_parent().' '.$event->getFixe_parent() ?><br/>
        Mail : <?php echo $event->getEmail_parent() ?>
        
            </td>
        </tr>
    </table>
    <br/>
    <table>
        <tr>
            <td style="width: 100%;text-align: center;font-size:15px;font-weight: bold">
                Devis n°<?php echo $event->getNum_devis(); ?> pour une animation le
                <?php echo date('d/m/Y à H:i',$event->getDate_heure()); ?>
            </td>
        </tr>
    </table>
    <br/><br/>
    <table class="tab">
        <tr>
            <td style="width:45%;text-align: center"><strong>Produit</strong></td>
            <td style="width:12%;text-align: center"><strong>Prix unit</strong></td>
            <td style="width:10%;text-align: center"><strong>Quantité</strong></td>
            <td style="width:12%;text-align: center"><strong>Prix HT</strong></td>
            <td style="width:12%;text-align: center"><strong>Tva 20%</strong></td>
            <td style="width:12%;text-align: center"><strong>Prix TTC</strong></td>
        </tr>
        <tr>
            <td>
                <strong><?php echo $event->getNom_animation().' pour '.$event->getNb_enfant_animation().' enfants'; ?></strong>
            </td>
            <td class="center"><?php echo round(($event->getTarif_animation()/1.2),2); ?> €</td>
            <td class="center">1</td>
            <td class="center"><?php echo round(($event->getTarif_animation()/1.2),2); ?> €</td>
            <td class="center"><?php echo round(($event->getTarif_animation()-($event->getTarif_animation()/1.2)),2); ?> €</td>
            <td class="center"><?php echo $event->getTarif_animation() ?> €</td>
        </tr>
                            <?php
                    if($event->getCountOption()>0){
                    ?>
                           <?php
                                foreach ($event->getOption() as $old){
                                    if($old->getType_option()==1){
                                        $type='€';
                                        $prix=  self::getPrixHTPourc($event->getTarif_animation(), $old->getPrix_opt());
                                        if($old->getType_option()==1){$type='%';}
                                        echo '<tr>';
                                        echo '<td><strong>'.$old->getNoms_option().'</strong></td>';
                                        echo '<td class="center">'.-$prix[0].' €</td>';
                                        echo '<td class="center">'.$old->getNb_client_opt().'</td>';
                                        echo '<td class="center">'.-$prix[0]*$old->getNb_client_opt().' €</td>';
                                        if($old->getOffert_client_opt()=="offert"){
                                            echo '<td class="center">Offert</td>';
                                            echo '<td class="center">Offert</td>';
                                        }else{
                                            echo '<td class="center">'.-$prix[1]*$old->getNb_client_opt().' €</td>';
                                            echo '<td class="center">'.-$prix[2]*$old->getNb_client_opt().' €</td>';
                                        }
                                        echo '</tr>';
                                    }
                                }
                           ?>
                    
                    <?php }
                    if($event->getNb_demi_heure()>=1){
                        $prixD=self::getPrixHt($event->getTarif_demi_heure());
                    ?>
                    <tr>
                        <td>
                            <strong><?php echo $event->getNb_demi_heure().' demi heure supplémentaire'; ?></strong>
                        </td>
                        <td class="center">
                            <?php echo $prixD[0].' €';?>
                        </td>
                        <td class="center">
                            <?php echo $event->getNb_demi_heure();?>
                        </td>
                        <td class="center">
                            <?php echo $prixD[0]*$event->getNb_demi_heure().' €';?>
                        </td>
                        <td class="center">
                            <?php echo  $prixD[1]*$event->getNb_demi_heure().' €';?>
                        </td>
                        <td class="center">
                            <?php echo $event->getNb_demi_heure()*$event->getTarif_demi_heure(); ?> €
                        </td>
                    </tr>
                    <?php }
                    if($event->getNb_enfant()>$event->getNb_enfant_animation()){
                        $prixE=self::getPrixHt($event->getPrix_enfant_animation())
                    ?>
                    <tr>
                        <td>
                            <strong><?php echo $event->getNb_enfant()-$event->getNb_enfant_animation().' enfants supplémentaires'; ?></strong>
                        </td>
                        <td class="center">
                        <?php echo $prixE[0].' €' ?>
                        </td>
                        <td class="center">
                            <?php echo $event->getNb_enfant()-$event->getNb_enfant_animation();?>
                        </td>
                        <td class="center">
                            <?php echo $prixE[0]*($event->getNb_enfant()-$event->getNb_enfant_animation()).' €' ?>
                        </td>
                        <td class="center">
                            <?php echo $prixE[1]*($event->getNb_enfant()-$event->getNb_enfant_animation()).' €';?>
                        </td>
                        <td class="center">
                            <?php echo  ($event->getNb_enfant()-$event->getNb_enfant_animation())*$event->getPrix_enfant_animation().' €';?>
                        </td>
                    </tr>
                    <?php }
                    if($event->getFrais_transport()==0){
                    ?>
                    <tr>
                        <td>
                            <strong>Frais de transport</strong>
                        </td>
                        <td class="center">
                           1
                        </td>
                        <td class="center">
                            Offert
                        </td>
                        <td class="center">
                            Offert
                        </td>
                        <td class="center">Offert</td>
                        <td class="center">Offert</td>
                    </tr>
                    <?php }else{
                        $prix=  self::getPrixHt($event->getFrais_transport());
                        ?>
                    <tr>
                        <td>
                            <strong>Frais de transport</strong>
                        </td>
                        <td class="center">
                            <?php  echo $prix[0].' €'; ?>
                        </td>
                        <td class="center">
                           1
                        </td>
                        <td class="center">
                            <?php  echo $prix[0].' €'; ?>
                        </td>
                        <td class="center">
                            <?php echo $prix[1].' €'; ?>
                        </td>
                        <td class="center"><?php echo $prix[2].' €'; ?></td>
                    </tr>
                    <?php
                    }
                    if($event->getCountOldOption()>0){
                        
                    ?>
                   
                           <?php
                                foreach ($event->getOldOption() as $old){
                                    $prix=  self::getPrixHt($prix);
                                    echo '<tr>';
                                    echo '<td><strong>'.$old->getNom_old_opt().'</strong></td>';
                                    echo '<td class="center">'.$prix[0].' €</td>';
                                    echo '<td class="center">'.$old->getQuantite_client_old().'</td>';
                                    echo '<td class="center">'.$prix[0]*$old->getQuantite_client_old().' €</td>';
                                    echo '<td class="center">'.$prix[1]*$old->getQuantite_client_old().' €</td>';
                                    echo '<td class="center">'.$old->getPrix_old_opt()*$old->getQuantite_client_old().' €</td>';
                                    echo '</tr>';
                                }
                           ?>
                    
                    <?php }
                    if($event->getCountOption()>0){
                    ?>
                           <?php
                                foreach ($event->getOption() as $old){
                                    if($old->getType_option()==0){
                                        $type='€';
                                        if($old->getType_option()==1){$type='%';$prix[0]=  self::getPrixHTPourc($event->getTarif_animation(), $old->getNb_client_opt());}
                                        else{$prix= self::getPrixHt($old->getPrix_opt());}
                                        echo '<tr>';
                                        if($old->getOffert_client_opt()==0){
                                        echo '<td><strong>'.$old->getNoms_option().'</strong></td>';
                                        echo '<td class="center">'.$prix[0].'  € </td>';
                                        echo '<td class="center">'.$old->getNb_client_opt().'</td>';
                                        echo '<td class="center">'.$prix[0]*$old->getNb_client_opt().' €</td>';
                                        echo '<td class="center">'.$prix[1]*$old->getNb_client_opt().' €</td>';
                                        echo '<td class="center">'.$old->getPrix_opt()*$old->getNb_client_opt().' '.$type.'</td>';       
                                        }else{
                                            echo '<td><strong>'.$old->getNoms_option().'</strong></td>';
                                            echo '<td class="center">'.$prix[0].'  € </td>';
                                            echo '<td class="center">'.$old->getNb_client_opt().'</td>';
                                            echo '<td class="center">Offert</td>';
                                            echo '<td class="center">Offert</td>';
                                            echo '<td class="center">offert</td>';
                                        }
                                        echo '</tr>';
                                    }
                                }
                           ?>
                    
                    <?php } ?>
                    <tr>
                        <td colspan="3" style="text-align: center;font-size: 16px"><strong>Total</strong></td>
                        <td class="center"><?php echo round(($event->getTarif_tot()/1.2),2); ?> €</td>
                    <td class="center"><?php echo round($event->getTarif_tot()-($event->getTarif_tot()/1.2),2); ?> €</td>
                    <td class="center"><?php echo $event->getTarif_tot(); ?> €</td>
                    </tr>
    </table>
</page>
        <?php
        $content=ob_get_clean();
        return $content;
    }
    
static function facture($event){
        ob_start()
        ?>
<style>
    table{
        width:100%;
    }
    .tab{
            border:1px solid black;
            border-collapse: collapse;
            
        }
    .tab td{
            border: 1px solid black;
            height: 25px;
            padding-left: 5px
        }
    .center{
            text-align: center;
            
        }
</style>
<page backtop='10mm' backleft='5mm' backright='10mm' backbottom='30mm'>
    <page_footer>
       <hr/>
       
       <br/>
       <br/>
    </page_footer>
    <table>
        <tr>
            <td style="width: 35%;vertical-align: top">
                <br/>
                <strong>SARL AKOUBAYO</strong><br/>
                27 rue jean baptiste potin<br/>
                92170 Vanves.<br/>
                Tel : 06 45 79 87 55<br/>
                Mail : akoubayofamily@gmail.com<br/>
                N°Siret : 531 289 106 00019<br/>
                N°TVA : FR 93531289106<br/>
            </td>
            <td style="width: 30%;vertical-align: top"><img src="http://www.akoubayo.fr/webroot/image/Akoubayo2.png" style="width:350px;margin-left: -65px"/></td>
            <td style="width: 35%;vertical-align: top">
                <br/>
        <strong><?php echo $event->getCivilite().' '.$event->getNom_parent() ?></strong><br/>
        <?php echo $event->getAdresse_parent().'<br/>'.$event->getZip_parent().' '.$event->getVille_parent(); ?><br/>
        Tel :<?php echo $event->getPort_parent().' '.$event->getFixe_parent() ?><br/>
        Mail : <?php echo $event->getEmail_parent() ?>
        
            </td>
        </tr>
    </table>
    <br/>
    <table>
        <tr>
            <td style="width: 100%;text-align: center;font-size:15px;font-weight: bold">
                Facture n°<?php echo $event->getNum_facture(); ?> pour une animation le
                <?php echo date('d/m/Y à H:i',$event->getDate_heure()); ?>
            </td>
        </tr>
    </table>
      <br/><br/>
    <table class="tab">
        <tr>
            <td style="width:45%;text-align: center"><strong>Produit</strong></td>
            <td style="width:12%;text-align: center"><strong>Prix unit</strong></td>
            <td style="width:10%;text-align: center"><strong>Quantité</strong></td>
            <td style="width:12%;text-align: center"><strong>Prix HT</strong></td>
            <td style="width:12%;text-align: center"><strong>Tva 20%</strong></td>
            <td style="width:12%;text-align: center"><strong>Prix TTC</strong></td>
        </tr>
        <tr>
            <td>
                <strong><?php echo $event->getNom_animation().' pour '.$event->getNb_enfant_animation().' enfants'; ?></strong>
            </td>
            <td class="center"><?php echo round(($event->getTarif_animation()/1.2),2); ?> €</td>
            <td class="center">1</td>
            <td class="center"><?php echo round(($event->getTarif_animation()/1.2),2); ?> €</td>
            <td class="center"><?php echo round(($event->getTarif_animation()-($event->getTarif_animation()/1.2)),2); ?> €</td>
            <td class="center"><?php echo $event->getTarif_animation() ?> €</td>
        </tr>
                            <?php
                    if($event->getCountOption()>0){
                    ?>
                           <?php
                                foreach ($event->getOption() as $old){
                                    if($old->getType_option()==1){
                                        $type='€';
                                        $prix=  self::getPrixHTPourc($event->getTarif_animation(), $old->getPrix_opt());
                                        if($old->getType_option()==1){$type='%';}
                                        echo '<tr>';
                                        echo '<td><strong>'.$old->getNoms_option().'</strong></td>';
                                        echo '<td class="center">'.$prix[0].' €</td>';
                                        echo '<td class="center">'.$old->getNb_client_opt().'</td>';
                                        echo '<td class="center">'.$prix[0]*$old->getNb_client_opt().' €</td>';
                                        if($old->getOffert_client_opt()=="offert"){
                                            echo '<td class="center">Offert</td>';
                                            echo '<td class="center">Offert</td>';
                                        }else{
                                            echo '<td class="center">'.$prix[1]*$old->getNb_client_opt().' €</td>';
                                            echo '<td class="center">'.$prix[2]*$old->getNb_client_opt().' €</td>';
                                        }
                                        echo '</tr>';
                                    }
                                }
                           ?>
                    
                    <?php }
                    if($event->getNb_demi_heure()>=1){
                        $prixD=self::getPrixHt($event->getTarif_demi_heure());
                    ?>
                    <tr>
                        <td>
                            <strong><?php echo $event->getNb_demi_heure().' demi heure supplémentaire'; ?></strong>
                        </td>
                        <td class="center">
                            <?php echo $prixD[0].' €';?>
                        </td>
                        <td class="center">
                            <?php echo $event->getNb_demi_heure();?>
                        </td>
                        <td class="center">
                            <?php echo $prixD[0]*$event->getNb_demi_heure().' €';?>
                        </td>
                        <td class="center">
                            <?php echo  $prixD[1]*$event->getNb_demi_heure().' €';?>
                        </td>
                        <td class="center">
                            <?php echo $event->getNb_demi_heure()*$event->getTarif_demi_heure(); ?> €
                        </td>
                    </tr>
                    <?php }
                    if($event->getNb_enfant()>$event->getNb_enfant_animation()){
                        $prixE=self::getPrixHt($event->getPrix_enfant_animation())
                    ?>
                    <tr>
                        <td>
                            <strong><?php echo $event->getNb_enfant()-$event->getNb_enfant_animation().' enfants supplémentaires'; ?></strong>
                        </td>
                        <td class="center">
                        <?php echo $prixE[0].' €' ?>
                        </td>
                        <td class="center">
                            <?php echo $event->getNb_enfant()-$event->getNb_enfant_animation();?>
                        </td>
                        <td class="center">
                            <?php echo $prixE[0]*($event->getNb_enfant()-$event->getNb_enfant_animation()).' €' ?>
                        </td>
                        <td class="center">
                            <?php echo $prixE[1]*($event->getNb_enfant()-$event->getNb_enfant_animation()).' €';?>
                        </td>
                        <td class="center">
                            <?php echo  ($event->getNb_enfant()-$event->getNb_enfant_animation())*$event->getPrix_enfant_animation().' €';?>
                        </td>
                    </tr>
                    <?php }
                    if($event->getFrais_transport()==0){
                    ?>
                    <tr>
                        <td>
                            <strong>Frais de transport</strong>
                        </td>
                        <td class="center">
                           1
                        </td>
                        <td class="center">
                            Offert
                        </td>
                        <td class="center">
                            Offert
                        </td>
                        <td class="center">Offert</td>
                        <td class="center">Offert</td>
                    </tr>
                    <?php }else{
                        $prixT=  self::getPrixHt($event->getFrais_transport());
                        ?>
                    <tr>
                        <td>
                            <strong>Frais de transport</strong>
                        </td>
                        <td class="center">
                            <?php  echo $prixT[0].' €'; ?>
                        </td>
                        <td class="center">
                           1
                        </td>
                        <td class="center">
                            <?php  echo $prixT[0].' €'; ?>
                        </td>
                        <td class="center">
                            <?php echo $prixT[1].' €'; ?>
                        </td>
                        <td class="center"><?php echo $prixT[2].' €'; ?></td>
                    </tr>
                    <?php
                    }
                    if($event->getCountOldOption()>0){
                        
                    ?>
                   
                           <?php
                                foreach ($event->getOldOption() as $old){
                                    $prixO=  self::getPrixHt($prix);
                                    echo '<tr>';
                                    echo '<td><strong>'.$old->getNom_old_opt().'</strong></td>';
                                    echo '<td class="center">'.$prixO[0].' €</td>';
                                    echo '<td class="center">'.$old->getQuantite_client_old().'</td>';
                                    echo '<td class="center">'.$prixO[0]*$old->getQuantite_client_old().' €</td>';
                                    echo '<td class="center">'.$prixO[1]*$old->getQuantite_client_old().' €</td>';
                                    echo '<td class="center">'.$old->getPrix_old_opt()*$old->getQuantite_client_old().' €</td>';
                                    echo '</tr>';
                                }
                           ?>
                    
                    <?php }
                    if($event->getCountOption()>0){
                    ?>
                           <?php
                                foreach ($event->getOption() as $old){
                                    if($old->getType_option()==0){
                                        $type='€';
                                        if($old->getType_option()==1){$type='%';$prix[0]=  self::getPrixHTPourc($event->getTarif_animation(), $old->getNb_client_opt());}
                                        else{$prix= self::getPrixHt($old->getPrix_opt());}
                                        echo '<tr>';
                                        if($old->getOffert_client_opt()==0){
                                        echo '<td><strong>'.$old->getNoms_option().'</strong></td>';
                                        echo '<td class="center">'.$prix[0].'  € </td>';
                                        echo '<td class="center">'.$old->getNb_client_opt().'</td>';
                                        echo '<td class="center">'.$prix[0]*$old->getNb_client_opt().' €</td>';
                                        echo '<td class="center">'.$prix[1]*$old->getNb_client_opt().' €</td>';
                                        echo '<td class="center">'.$old->getPrix_opt()*$old->getNb_client_opt().' '.$type.'</td>';       
                                        }else{
                                            echo '<td><strong>'.$old->getNoms_option().'</strong></td>';
                                            echo '<td class="center">'.$prix[0].'  € </td>';
                                            echo '<td class="center">'.$old->getNb_client_opt().'</td>';
                                            echo '<td class="center">Offert</td>';
                                            echo '<td class="center">Offert</td>';
                                            echo '<td class="center">offert</td>';
                                        }
                                        echo '</tr>';
                                    }
                                }
                           ?>
                    
                    <?php } ?>
                    <tr>
                        <td colspan="3" style="text-align: center;font-size: 16px"><strong>Total</strong></td>
                        <td class="center"><?php echo round(($event->getTarif_tot()/1.2),2); ?> €</td>
                    <td class="center"><?php echo round($event->getTarif_tot()-($event->getTarif_tot()/1.2),2); ?> €</td>
                    <td class="center"><?php echo $event->getTarif_tot(); ?> €</td>
                    </tr>
    </table>
</page>
        <?php
        $content=ob_get_clean();
        return $content;
    }
    
    static function getPrixHt($prix){
        $p=array();
        $p[0]=round(($prix/1.2),2);
        $p[1]=round(($prix-($prix/1.2)),2);
        $p[2]=$prix;
        return $p;
        
    }
    static function getPrixHTPourc($prix,$pourC){
        $p=array();
        $p[0]=round((($prix*$pourC)/100)/1.2,2);
        $p[1]=0;
        $p[2]=round($p[0]*1.2,2);
        $p[1]=$p[2]-$p[0];
        return $p;
        
        
        
    }
    static function getCoord($address)
    {
        /*$coords=array();
        $request_url = $heberge.'/geocode.php?' . "address=" . urlencode($address).'';
        $_result = file_get_contents($request_url);
        $_coords=explode('|',$_result);
        $coords['status'] = $_coords[0];

        if($coords['status']=='OK')
        {
            $coords['lat'] = $_coords[1]; 
            $coords['lon'] = $_coords[2];
        }
        return $coords;
        
    }*/

// On prépare l'adresse à rechercher

 
// On prépare l'URL du géocodeur
$geocoder = "https://maps.googleapis.com/maps/api/geocode/json?address=%s&sensor=false&key=AIzaSyBlulWwCXDjxuBxLMQLaQzt4Kp7HWON-ow";
 
// Pour cette exemple, je vais considérer que ma chaîne n'est pas
// en UTF8, le géocoder ne fonctionnant qu'avec du texte en UTF8
$url_address = utf8_encode($address);
 
// Penser a encoder votre adresse
$url_address = urlencode($url_address);
 
// On prépare notre requête
$query = sprintf($geocoder,$url_address);
 
// On interroge le serveur
$results = file_get_contents($query);
 
// On affiche le résultat
        return json_decode($results);
    }
    
static function devisTrain($event){
        ob_start()
        ?>
<style>
    table{
        width:100%;
    }
    .tab{
            border:1px solid black;
            border-collapse: collapse;
            
        }
    .tab td{
            border: 1px solid black;
            height: 22px;
            padding-left: 5px
        }
    .center{
            text-align: center;
            
        }
</style>
<?php
$y=0;$z=0;$aa=0;
$num=0;
$totTot=0;
$i=$event[0]->getAnim_date();
foreach ($event as $e){
    
$date=$e->getAnim_date();
$ee=next($event);
if(isset($ee) && $ee!=NULL){
$dateNext=$ee->getAnim_date();
if($dateNext>=$i+604800){
    $somme=($e->getAnim_heure()*38)+($e->getHlp_dep_heure()*13)+($e->getHlp_ret_heure()*13)+($e->getNuit()*70)+20;
    $totTot=$totTot+$somme;
   
     $tva=round((($totTot*1.2)-$totTot),2);
     $ttc= round(($totTot*1.2),2);
    $tot='<tr>
            <td></td>
            <td style="text-align: center" colspan="3">Total</td>
            <td style="text-align: center">'.$totTot.'€</td>
            <td style="text-align: center">'.$tva.'€</td>
            <td style="text-align: center">'.$ttc.'€</td>
          </tr>';
    $totTot=0;
    if($date!=$dateNext){
    $z=1;
    }
}
}elseif ($ee==NULL) {
     $somme=($e->getAnim_heure()*38)+($e->getHlp_dep_heure()*13)+($e->getHlp_ret_heure()*13)+($e->getNuit()*70)+20;
    $totTot=$totTot+$somme;
     
    $tva=round((($totTot*1.2)-$totTot),2);
    $ttc=round(($totTot*1.2),2);
      $tot='<tr>
            <td style="text-align: center" colspan="3"></td>
            <td style="text-align: center">Total</td>
            <td style="text-align: center">'.$totTot.'€</td>
            <td style="text-align: center">'.$tva.'€</td>
            <td style="text-align: center">'.$ttc.'€</td>
          </tr>';
    $totTot=0;
    $z=1;
 }
if($date>=$i+604800 || $y==0){
$num+=1;
$i=$e->getAnim_date();
if($y>0){
    echo '</table>
</page>';
}
$y=1;

?>
<page backtop='5mm' backleft='5mm' backright='10mm' backbottom='2mm'>
    <table>
        <tr>
            <td style="width: 35%;vertical-align: top">
                <br/>
                <strong>Akoubayo Family</strong><br/>
                27 rue jean baptiste potin<br/>
                92170 Vanves.<br/>
                Tel : 06 45 79 87 55<br/>
                Mail : akoubayofamily@gmail.com<br/>
                N°Siret : 531 289 106 00019<br/>
                N°TVA : FR 93531289106<br/>
            </td>
            <td style="width: 30%;vertical-align: top"><img src="./webroot/image/Akoubayo2.png" style="width:350px;margin-left: -65px"/></td>
            <td style="width: 35%;vertical-align: top">
                <br/>
                <strong>CITY Junior</strong><br/>Service Comptabilité<br/>23 rue Lafayette<br/>31000 Toulouse
            </td>
        </tr>
    </table>
    <br/>
    <table>
        <tr>
            <td style="width: 100%;text-align: center;font-size:15px;font-weight: bold">
                Facture n°Sncf_ete_<?php echo $num ?>
            </td>
        </tr>
    </table>
    <br/><br/>
    <table class="tab">
        <tr>
            <td style="width:12%;text-align: center"><strong>Date</strong></td>
            <td style="width:35%;text-align: center"><strong>Description</strong></td>
            <td style="width:12%;text-align: center"><strong>Prix HT</strong></td>
            <td style="width:10%;text-align: center"><strong>QTE</strong></td>
            <td style="width:12%;text-align: center"><strong>Prix HT</strong></td>
            <td style="width:12%;text-align: center"><strong>Tva 20%</strong></td>
            <td style="width:12%;text-align: center"><strong>Prix TTC</strong></td>
        </tr>
        <?php
}        
                    $total=($e->getAnim_heure()*38)+($e->getHlp_dep_heure()*13)+($e->getHlp_ret_heure()*13)+($e->getNuit()*70)+20;
                    $aa=$aa+($e->getAnim_heure()*38)+($e->getHlp_dep_heure()*13)+($e->getHlp_ret_heure()*13)+($e->getNuit()*70)+20;
                    $totTot+=$total;
                   
        ?>
        <tr>
            <td style="font-size: 10px;text-align: center;font-size: 12px"><?php echo date('d/m/Y',$e->getAnim_date()); ?></td>
            <td style="font-size: 10px"><?php echo $e->getAnim_num_train().' '.$e->getAnim_dep().' - '.$e->getAnim_arr() ?></td>
            <td style="font-size: 10px;text-align: center"><?php echo $total.'€' ?></td>
            <td style="font-size: 10px;text-align: center">1</td>
            <td style="font-size: 10px;text-align: center"><?php echo $total.'€' ?></td>
            <td style="font-size: 10px;text-align: center"><?php echo round(($total*1.2)-$total,2).'€' ?></td>
            <td style="font-size: 10px;text-align: center"><?php echo round(($total*1.2),2).'€' ?></td>
        </tr>
<?php
if($z==1){
   echo $tot;
   $z=0;
}
if($date>=$i+604800){
    
?>
  
 <?php
}
}
echo ' </table>
</page>';
        $content=ob_get_clean();
        return $content;
    }
    
    
    static function planningTrain($event){
        ob_start()
        ?>
<style>
    table{
        width:100%;
    }
    .tab{
            border:1px solid black;
            border-collapse: collapse;
            
        }
    .tab td{
            border: 1px solid black;
            height: 22px;
            padding-left: 5px;
            font-size: 10px;
            text-align: center;
            
        }
    .center{
            text-align: center;
            
        }
</style>
<page backtop='5mm' backleft='2mm' backright='2mm' backbottom='2mm'>
    <table class="tab">
        <tr style="text-align: center;background-color:#cc00cc ">
            <td>Code</td>
            <td>Date</td>
            <td style="width:6%">Départ</td>
            <td style="width:6%">Arrivé</td>
            <td style="width:3.5%;">Prise poste</td>
            <td style="width:3.5%;">Heure Dep</td>
            <td style="width:3.5%;">Heure Arr</td>
            <td>HLP Dep</td>
            <td>HLP Dep</td>
            <td style="width:6%;">HLP Arr</td>
            <td style="width:3.5%;">Heure Dep</td>
            <td style="width:3.5%;">Heure arr</td>
            <td>Hlp Ret</td>
            <td style="width:6%;">HLP dep</td>
            <td style="width:6%;">HLP ret</td>
            <td style="width:3.5%;">Heure dep</td>
            <td style="width:3.5%;">Heure arr</td>
            <td>Nuité</td>
            <td>Animateur</td>
            <td>Portable</td>
            <td>Mail</td>
        </tr>
        <?php
        $i=0;
        foreach ($event as $e){
            if($i==0){
                $i=1;
               $style="background-color:#ffcccc"; 
            }else{
                $i=0;
                $style="background-color:#ccccff"; 
            }
        ?>
        <tr style="<?php echo $style;?>">
            <td><?php echo $e->getCode_trajet();?></td>
            <td><?php echo date('d/m',$e->getAnim_date()) ;?></td>
            <td style="width:6%;font-size: 9px"><?php echo $e->getAnim_dep() ;?></td>
            <td style="width:6%;font-size: 9px"><?php echo $e->getAnim_arr() ;?></td>
            <td style="width:3.5%;"><?php echo date('H:i',$e->getAnim_Prise_poste()) ;?></td>
            <td style="width:3.5%;"><?php echo date('H:i',$e->getAnim_heure_dep()) ;?></td>
            <td style="width:3.5%;"><?php echo date('H:i',$e->getAnim_heure_arr()) ;?></td>
            <td><?php if($e->getHlp_dep_date()!=0){echo date('d/m',$e->getHlp_dep_date());}else{} ?></td>
            <td style="width:6%;font-size: 9px"><?php echo $e->getHlp_dep_dep() ;?></td>
            <td style="width:6%;font-size: 9px"><?php echo $e->getHlp_dep_arr() ;?></td>
            <td style="width:3.5%;"><?php if($e->getHlp_dep_date()!=0){echo date('H:i',$e->getHlp_dep_heure_dep());}?></td>
            <td style="width:3.5%;"><?php if($e->getHlp_dep_date()!=0){echo date('H:i',$e->getHlp_dep_heure_arr());}?></td>
            <td><?php if($e->getHlp_ret_date()!=0){echo date('d/m',$e->getHlp_ret_date());}else{}?></td>
            <td style="width:6%;font-size: 9px"><?php echo $e->getHlp_ret_dep() ;?></td>
            <td style="width:6%;font-size: 9px"><?php echo $e->getHlp_ret_arr() ;?></td>
            <td style="width:3.5%;"><?php if($e->getHlp_ret_date()!=0){echo date('H:i',$e->getHlp_ret_heure_dep());}?></td>
            <td style="width:3.5%;"><?php if($e->getHlp_ret_date()!=0){echo date('H:i',$e->getHlp_ret_heure_arr());}?></td>
            <td><?php echo $e->getNuit() ;?></td>
            <td><?php echo $e->getPrenom() ;?></td>
            <td><?php echo $e->getTel() ;?></td>
            <td style="font-size: 8px"><?php echo $e->getMail() ;?></td>
        </tr>
        <?php
        }
        ?>
    </table>
</page>
<?php
$content=ob_get_clean();
return $content;
    }

}
