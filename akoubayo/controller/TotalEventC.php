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
class TotalEventC extends Controller {
    protected 
            $_id_event,
            $_bool_annule,
            $_num_devis,
            $_num_facture,
            $_animation_id,
            $_parent_id,
            $_nb_enfant,
            $_date_facture,
            $_date_devis,
            $_date_heure,
            $_date_calendar,
            $_etat,
            $_comment_event,
            $_nb_demi_heure,
            $_frais_transport,
            $_bool_devis,
            $_bool_facture,
            $_bool_info,
            $_in_budget,
            $_bool_paid_animateur,
            $_bool_questionnaire,
            $_id_parent,
            $_civilite,
            $_nom_parent,
            $_prenom_parent,
            $_info_adr,
            $_adresse_parent,
            $_zip_parent,
            $_ville_parent,
            $_fixe_parent,
            $_port_parent,
            $_email_parent,
            $_comment_parent,
            $_inter_parent,
            $_code_parent,
            $_etage_parent,
            $_gare_parent,
            $_id_animation,
            $_nom_animation,
            $_duree_animation,
            $_nb_enfant_animation,
            $_prix_enfant_animation,
            $_tarif_animateur,
            $_tarif_ferie,
            $_tarif_animation,
            $_tarif_demi_heure,
            $_visible_animation,
            $_id_enfant,
            $_prenom_enfant,
            $_sexe_enfant,
            $_date_naissance,
            $_comment_enfant,
            $_tarif_tot,
            $_animateur,
            $_old_option,
            $_client_option,
            $_longitude_parent,
            $_latitude_parent,
            $_new_enfant,
            $_new_parent_id,
            $_chercher_com,
            $_region,
            $_bool_accompte;
    
    function getId_event() {
        return $this->_id_event;
    }

    function getBool_annule() {
        return $this->_bool_annule;
    }

    function getNum_devis() {
        return $this->_num_devis;
    }

    function getNum_facture() {
        return $this->_num_facture;
    }

    function getAnimation_id() {
        return $this->_animation_id;
    }



    function getNb_enfant() {
        return $this->_nb_enfant;
    }

    function getDate_facture() {
        return $this->_date_facture;
    }

    function getDate_devis() {
        $jour=date('N',  $this->_date_devis);
        $jour=outils::convertSemaineFull($jour);
        $jour.=' '.date('d M Y');
        return $jour;
    }

    function getDate_heure() {
        return $this->_date_heure;
    }

    function getDate_calendar() {
        return $this->_date_calendar;
    }

    function getEtat() {
        return $this->_etat;
    }

    function getComment_event() {
        return $this->_comment_event;
    }

    function getNb_demi_heure() {
        return $this->_nb_demi_heure;
    }

    function getFrais_transport() {
        return $this->_frais_transport;
    }

    function getBool_devis() {
        return $this->_bool_devis;
    }

    function getBool_facture() {
        return $this->_bool_facture;
    }

    function getBool_info() {
        return $this->_bool_info;
    }

    function getIn_budget() {
        return $this->_in_budget;
    }

    function getBool_paid_animateur() {
        return $this->_bool_paid_animateur;
    }

    function getBool_questionnaire() {
        return $this->_bool_questionnaire;
    }

    function getId_parent() {
        return $this->_id_parent;
    }

    function getCivilite() {
        return $this->_civilite;
    }

    function getNom_parent() {
        return $this->_nom_parent;
    }

    function getPrenom_parent() {
        return $this->_prenom_parent;
    }

    function getInfo_adr() {
        return $this->_info_adr;
    }

    function getAdresse_parent() {
        return $this->_adresse_parent;
    }

    function getZip_parent() {
        return $this->_zip_parent;
    }

    function getVille_parent() {
        return $this->_ville_parent;
    }

    function getFixe_parent() {
        return $this->_fixe_parent;
    }

    function getPort_parent() {
        return $this->_port_parent;
    }

    function getEmail_parent() {
        return $this->_email_parent;
    }

    function getComment_parent() {
        return $this->_comment_parent;
    }

    function getInter_parent() {
        return $this->_inter_parent;
    }

    function getCode_parent() {
        return $this->_code_parent;
    }
    
    function getEtage_parent() {
        return $this->_etage_parent;
    }

    function getGare_parent() {
        return $this->_gare_parent;
    }

        function getId_animation() {
        return $this->_id_animation;
    }

    function getNom_animation() {
        return $this->_nom_animation;
    }

    function getDuree_animation() {
        return $this->_duree_animation;
    }

    function getNb_enfant_animation() {
        return $this->_nb_enfant_animation;
    }

    function getPrix_enfant_animation() {
        return $this->_prix_enfant_animation;
    }

    function getTarif_animateur() {
        return $this->_tarif_animateur;
    }

    function getTarif_ferie() {
        return $this->_tarif_ferie;
    }
    
    function getLongitude_parent() {
        return $this->_longitude_parent;
    }

    function getLatitude_parent() {
        return $this->_latitude_parent;
    }

    function getTarif_animation() {
        $tarif=preg_split("/[:]/",$this->_tarif_animation);
        $tarif=$tarif[(date('N',  $this->_date_heure))-1];
        $tarif=  preg_split("/[\/]/", $tarif);
        if(date("H",$this->_date_heure)<17){$tarif=$tarif[0];} else {$tarif=$tarif[1];}
        return $tarif;
    }

    function getTarif_demi_heure() {
        $tarifDemi=  preg_split("/[:]/",$this->_tarif_demi_heure);
        if($this->_nb_demi_heure<=1){$tarifDemi=$tarifDemi[0];}  else {$tarifDemi=$tarifDemi[1];}
        return $tarifDemi;
    }
    

    function getVisible_animation() {
        return $this->_visible_animation;
    }

    function getId_enfant() {
        return $this->_id_enfant;
    }

    function getParent_id() {
        return $this->_parent_id;
    }

    function getPrenom_enfant() {
        return $this->_prenom_enfant;
    }

    function getSexe_enfant() {
        if($this->_sexe_enfant==0){$sexe="Garcon";}elseif($this->_sexe_enfant==1){$sexe="Fille";}elseif($this->_sexe_enfant>1){$sexe="Jumeaux";}
        return $sexe;
    }

    function getDate_naissance() {
        $date=  (time()-$this->_date_naissance)/3600/24/365;
        
        return round($date);
    }

    function getComment_enfant() {
        return $this->_comment_enfant;
    }
    
    function getTarif_tot(){
        $totEnfant=  $this->_nb_enfant -  $this->_nb_enfant_animation;
        if($totEnfant<=0){$totEnfant=0;}else{$totEnfant=$totEnfant*$this->_prix_enfant_animation;}
        if($this->_old_option==0){$totOld=0;}else{
             $totOld=0;
             foreach ($this->_old_option as $old){
                 $totOld=$totOld+$old->getPrix_old_opt();
             }
        }
        if($this->_client_option==0){$totOption=0;$totPourcOption=0;}else{
             $totOption=0;
             $totPourcOption=0;
             foreach ($this->_client_option as $old){
                 if($old->getPrix_opt()!="offert"){
                    if($old->getType_option()==0){
                    $totOption=$totOption+($old->getPrix_opt()*$old->getNb_client_opt());
                    }else{
                       $totPourcOption=$totPourcOption+$old->getPrix_opt(); 
                    }
                 }
             }
        }
        
        $tot=($this->getTarif_animation()+(($this->getTarif_animation()*$totPourcOption)/100))+($this->getTarif_demi_heure()*$this->_nb_demi_heure)+$totEnfant+$this->_frais_transport+$totOld+$totOption;
        $this->_tarif_tot=$tot;
        return $this->_tarif_tot;
    }
    function getAnimateur($db){
        $model=  Model::load("ClientAnimateurM");
        $d=array(
            "conditions"=>"event_id=$this->_id_event AND bool_client_anim=0"
        );
        $animateur=$model->find($d,$db);
        if(isset($animateur)){
            $model= Model::load("UsersM");
            $d=array();
            $d['conditions']="id_users=";
            foreach ($animateur as $anim){
                $d['conditions'].=$anim->getUsers_id().' OR id_users=';
            }
            $d['conditions']=  substr($d['conditions'],0,-12);
            
            $anima=$model->find($d,$db);
            if(isset($anima)){
                return $anima;
            }else{
                $animateur=0;
                return $animateur;
            }
        }else{
            $animateur=0;
            return $animateur;
        }
    }
    
    function getCountOldOption(){
        if($this->_old_option==0){
            $nbOption=0;
            return $nbOption;
        }else{
            $nbOption=  count($this->_old_option);
            return $nbOption;
        }
    }
    function getOldOption(){
        return $this->_old_option;
    }
    function getFindOldOption($db){
        $model=  Model::load("OldOptionsM");
        $d=array(
            "table"=>"old_options,old_client_option",
            "conditions"=>"$this->_id_event=event_id AND old_option_id=id_old_option"
        );
        $option=$model->find($d,$db);
        if(isset($option)){
             $this->_old_option=$option;
        }else{
            $option=0;
             $this->_old_option=$option;
        }
    }
    
    function getFindOption($db){
        $model=  Model::load("OptionsM");
        $d=array(
            "table"=>"client_option,options",
            "conditions"=>"$this->_id_event=event_id AND option_id=id_options AND bool_client_opt=0"
        );
        $option=$model->find($d,$db);
        if(isset($option)){
           
            $this->_client_option=$option;
            
        }else{
            $option=0;
            $this->_client_option=$option;
        }
    }
    function getCountOption(){
        if($this->_client_option==0){
            $nbOption=0;
            return $nbOption;
        }else{
            $nbOption=  count($this->_client_option);
            return $nbOption;
        }
    }
    function getOption(){
        return $this->_client_option;
    }
    function getNew_enfant() {
        return $this->_new_enfant;
    }
    
    function getNew_parent_id() {
        return $this->_new_parent_id;
    }
    
    function getChercher_com() {
        return $this->_chercher_com;
    }
    
    function getRegion() {
        switch ($this->_region) {
            case 0: $region ="paris";
                break;
            case 1: $region ="Lyon";
                break;
            default: $region ="paris";
                break;
        }
        return $region;
    }
    function getBool_accompte() {
        return $this->_bool_accompte;
    }

    function setId_event($id_event) {
        $this->_id_event = $id_event;
    }

    function setBool_annule($bool_annule) {
        $this->_bool_annule = $bool_annule;
    }

    function setNum_devis($num_devis) {
        $this->_num_devis = $num_devis;
    }

    function setNum_facture($num_facture) {
        $this->_num_facture = $num_facture;
    }

    function setAnimation_id($animation_id) {
        $this->_animation_id = $animation_id;
    }

    function setParent_id($parent_id) {
        $this->_parent_id = $parent_id;
    }

    function setNb_enfant($nb_enfant) {
        $this->_nb_enfant = $nb_enfant;
    }

    function setDate_facture($date_facture) {
        $this->_date_facture = $date_facture;
    }

    function setDate_devis($date_devis) {
        $this->_date_devis = $date_devis;
    }

    function setDate_heure($date_heure) {
        $this->_date_heure = $date_heure;
    }

    function setDate_calendar($date_calendar) {
        $this->_date_calendar = $date_calendar;
    }

    function setEtat($etat) {
        $this->_etat = $etat;
    }

    function setComment_event($comment_event) {
        $this->_comment_event = $comment_event;
    }

    function setNb_demi_heure($nb_demi_heure) {
        $this->_nb_demi_heure = $nb_demi_heure;
    }

    function setFrais_transport($frais_transport) {
        $this->_frais_transport = $frais_transport;
    }

    function setBool_devis($bool_devis) {
        $this->_bool_devis = $bool_devis;
    }

    function setBool_facture($bool_facture) {
        $this->_bool_facture = $bool_facture;
    }

    function setBool_info($bool_info) {
        $this->_bool_info = $bool_info;
    }

    function setIn_budget($in_budget) {
        $this->_in_budget = $in_budget;
    }

    function setBool_paid_animateur($bool_paid_animateur) {
        $this->_bool_paid_animateur = $bool_paid_animateur;
    }

    function setBool_questionnaire($bool_questionnaire) {
        $this->_bool_questionnaire = $bool_questionnaire;
    }

    function setId_parent($id_parent) {
        $this->_id_parent = $id_parent;
    }

    function setCivilite($civilite) {
        $this->_civilite = $civilite;
    }

    function setNom_parent($nom_parent) {
        $this->_nom_parent = $nom_parent;
    }

    function setPrenom_parent($prenom_parent) {
        $this->_prenom_parent = $prenom_parent;
    }

    function setInfo_adr($info_adr) {
        $this->_info_adr = $info_adr;
    }

    function setAdresse_parent($adresse_parent) {
        $this->_adresse_parent = $adresse_parent;
    }

    function setZip_parent($zip_parent) {
        $this->_zip_parent = $zip_parent;
    }

    function setVille_parent($ville_parent) {
        $this->_ville_parent = $ville_parent;
    }

    function setFixe_parent($fixe_parent) {
        $this->_fixe_parent = $fixe_parent;
    }

    function setPort_parent($port_parent) {
        $this->_port_parent = $port_parent;
    }

    function setEmail_parent($email_parent) {
        $this->_email_parent = $email_parent;
    }

    function setComment_parent($comment_parent) {
        $this->_comment_parent = $comment_parent;
    }

    function setInter_parent($inter_parent) {
        $this->_inter_parent = $inter_parent;
    }

    function setCode_parent($code_parent) {
        $this->_code_parent = $code_parent;
    }
    
    function setEtage_parent($etage_parent) {
        $this->_etage_parent = $etage_parent;
    }

    function setGare_parent($gare_parent) {
        $this->_gare_parent = $gare_parent;
    }

        function setId_animation($id_animation) {
        $this->_id_animation = $id_animation;
    }

    function setNom_animation($nom_animation) {
        $this->_nom_animation = $nom_animation;
    }

    function setDuree_animation($duree_animation) {
        $this->_duree_animation = $duree_animation;
    }

    function setNb_enfant_animation($nb_enfant_animation) {
        $this->_nb_enfant_animation = $nb_enfant_animation;
    }

    function setPrix_enfant_animation($prix_enfant_animation) {
        $this->_prix_enfant_animation = $prix_enfant_animation;
    }

    function setTarif_animateur($tarif_animateur) {
        $this->_tarif_animateur = $tarif_animateur;
    }

    function setTarif_ferie($tarif_ferie) {
        $this->_tarif_ferie = $tarif_ferie;
    }

    function setTarif_animation($tarif_animation) {
        $this->_tarif_animation = $tarif_animation;
    }

    function setTarif_demi_heure($tarif_demi_heure) {
        $this->_tarif_demi_heure = $tarif_demi_heure;
    }

    function setVisible_animation($visible_animation) {
        $this->_visible_animation = $visible_animation;
    }

    function setId_enfant($id_enfant) {
        $this->_id_enfant = $id_enfant;
    }


    function setPrenom_enfant($prenom_enfant) {
        $this->_prenom_enfant = $prenom_enfant;
    }

    function setSexe_enfant($sexe_enfant) {
        $this->_sexe_enfant = $sexe_enfant;
    }

    function setDate_naissance($date_naissance) {
        $this->_date_naissance = $date_naissance;
    }

    function setComment_enfant($comment_enfant) {
        $this->_comment_enfant = $comment_enfant;
    }
    
    function setLongitude_parent($longitude_parent) {
        $this->_longitude_parent = $longitude_parent;
    }

    function setLatitude_parent($latitude_parent) {
        $this->_latitude_parent = $latitude_parent;
    }
    
    function setNew_enfant($db) {
        $model=  Model::load('ClientEventM');
                $d=array(
                    "conditions"=>"id_event=$this->_id_event"
                    );
                $parentId=$model->find($d,$db);
                $parent=$parentId[0]->getNew_parent_id();
                if($parent>0){
                    $model=  Model::load("ClientEnfantM");
                    $d=array(
                        "table"=>"client_enfant,client_enfant_event",
                        "conditions"=>"event_id=$this->_id_event AND enfant_id=id_enfant"
                    );
                    $enfant=$model->find($d,$db);
        }
        if(isset($enfant)){
            return $this->_new_enfant=$enfant;
        }else{
            $enfant=0;
            return $this->_new_enfant=$enfant;
        }
    }

    function setNew_parent_id($new_parent_id) {
        $this->_new_parent_id = $new_parent_id;
    }

    function setChercher_com($chercher_com) {
        $this->_chercher_com = $chercher_com;
    }

    function setRegion($region) {
        $this->_region = $region;
    }
    
    function setBool_accompte($bool_accompte) {
        $this->_bool_accompte = $bool_accompte;
    }


    





}
