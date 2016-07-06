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
class ClientEventC extends Controller {
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
            $_new_parent_id,
            $_chercher_com,
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

    function getParent_id() {
        return $this->_parent_id;
    }

    function getNb_enfant() {
        return $this->_nb_enfant;
    }

    function getDate_facture() {
        return $this->_date_facture;
    }

    function getDate_devis() {
        return $this->_date_devis;
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
    
    function getNew_parent_id() {
        return $this->_new_parent_id;
    }
    
    function getChercher_com() {
        return $this->_chercher_com;
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

    function setNew_parent_id($new_parent_id) {
        $this->_new_parent_id = $new_parent_id;
    }

    function setChercher_com($chercher_com) {
        $this->_chercher_com = $chercher_com;
    }

    function setBool_accompte($bool_accompte) {
        $this->_bool_accompte = $bool_accompte;
    }





}
