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
class PayeAnimateurC extends Controller{
    protected 
            $_users_id,
            $_event_id,
            $_date_heure,
            $_animation_id,
            $_nom,
            $_prenom,
            $_paye_anim,
            $_nom_anim,
            $_statut,
            $_nb_demi_heure;
    function getUsers_id() {
        return $this->_users_id;
    }

    function getEvent_id() {
        return $this->_event_id;
    }

    function getDate_heure() {
        return $this->_date_heure;
    }

    function getAnimation_id() {
        return $this->_animation_id;
    }

    function getNom() {
        return $this->_nom;
    }

    function getPrenom() {
        return $this->_prenom;
    }

    function getPaye_anim() {
        $model=  Model::load("AdminAnimationM");
        $d=array(
            "fields"=>"tarif_animateur,nom_animation",
            "conditions"=>"id_animation=".$this->_animation_id,
        );
        $paye=$model->find($d,$this->_db);
        $tarif=preg_split("/[:]/",$paye[0]->getTarif_animateur());
        $tarif=$tarif[$this->_statut];
        $demi=  $this->_nb_demi_heure*5;
        $tarif=$tarif+$demi;
        $this->_paye_anim=$tarif;
        $this->_nom_anim=$paye[0]->getNom_animation();
        return $this->_paye_anim;
    }

    function getNom_anim() {
        return $this->_nom_anim;
    }
    
    function getStatut() {
        return $this->_statut;
    }

        function setUsers_id($users_id) {
        $this->_users_id = $users_id;
        $model=  Model::load("UsersM");
        $d=array(
           "conditions"=>"id_users=".$this->_users_id
        );
        $users=$model->find($d,$this->_db);
        if(isset($users)){
            $this->_nom=$users[0]->getNom();
            $this->_prenom=$users[0]->getPrenom();
            $this->_statut=$users[0]->getStatut();
        }
    }

    function setEvent_id($event_id) {
        $this->_event_id = $event_id;
    }

    function setDate_heure($date_heure) {
        $this->_date_heure = $date_heure;
    }
    
    function setAnimation_id($animation_id) {
        $this->_animation_id = $animation_id;
    }
    
    function setNb_demi_heure($nb_demi_heure) {
        $this->_nb_demi_heure = $nb_demi_heure;
    }


}
