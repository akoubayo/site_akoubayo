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
class UsersC extends Controller {

    protected
            $_id_users,
            $_mail,
            $_nom,
            $_prenom,
            $_pass, 
            $_change_pass, 
            $_time_change, 
            $_tel_fixe,
            $_tel_portable,
            $_adresse,
            $_ville,
            $_zip,
            $_complement_adresse, 
            $_num_secu,
            $_ville_naissance, 
            $_dpt_naissance, 
            $_date_naissance, 
            $_droit, 
            $_valide,
            $_visible,
            $_statut,
            $_distance,
            $_bool_placement,
            $_id_planning_anim;
    function getId_users() {
        return $this->_id_users;
    }

    function getMail() {
        return $this->_mail;
    }

    function getNom() {
        return $this->_nom;
    }

    function getPrenom() {
        return $this->_prenom;
    }

    function getPass() {
        return $this->_pass;
    }

    function getChange_pass() {
        return $this->_change_pass;
    }

    function getTime_change() {
        return $this->_time_change;
    }

    function getTel_fixe() {
        return $this->_tel_fixe;
    }

    function getTel_portable() {
        return $this->_tel_portable;
    }

    function getAdresse() {
        return $this->_adresse;
    }

    function getVille() {
        return $this->_ville;
    }

    function getZip() {
        return $this->_zip;
    }

    function getComplement_adresse() {
        return $this->_complement_adresse;
    }

    function getNum_secu() {
        return $this->_num_secu;
    }

    function getVille_naissance() {
        return $this->_ville_naissace;
    }

    function getDpt_naissance() {
        return $this->_dpt_naissance;
    }

    function getDate_naissance() {
        return $this->_date_naissance;
    }

    function getDroit() {
        return $this->_droit;
    }
    
    function getValide() {
        return $this->_valide;
    }
    
    function getVisible(){
        return $this->_visible;
    }
    
    function getStatut(){
        return $this->_statut;
    }
    
    function getNomStatut(){
        switch ($this->_statut) {
            case 0: $nom="Animateur";
                break;
            case 1: $nom="Comédien";
                break;
            case 2: $nom="Indépendant";
                break;
            

            default: $nom="Animateur";
                break;
        }
        return $nom;
    }
    
    function getDistance() {
        return $this->_distance;
    }
    
    function getBool_placement() {
        return $this->_bool_placement;
    }
    
    function getId_planning_anim() {
        return $this->_id_planning_anim;
    }

    function setId_users($id_users) {
        $this->_id_users = $id_users;
    }

    function setMail($mail) {
        $this->_mail = $mail;
    }

    function setNom($nom) {
        $this->_nom = $nom;
    }

    function setPrenom($prenom) {
        $this->_prenom = $prenom;
    }

    function setPass($pass) {
        $this->_pass = $pass;
    }

    function setChange_pass($change_pass) {
        $this->_change_pass = $change_pass;
    }

    function setTime_change($time_change) {
        $this->_time_change = $time_change;
    }

    function setTel_fixe($tel_fixe) {
        $this->_tel_fixe = $tel_fixe;
    }

    function setTel_portable($tel_portable) {
        $this->_tel_portable = $tel_portable;
    }

    function setAdresse($adresse) {
        $this->_adresse = $adresse;
    }

    function setVille($ville) {
        $this->_ville = $ville;
    }

    function setZip($zip) {
        $this->_zip = $zip;
    }

    function setComplement_adresse($complement_adresse) {
        $this->_complement_adresse = $complement_adresse;
    }

    function setNum_secu($num_secu) {
        $this->_num_secu = $num_secu;
    }

    function setVille_naissance($ville_naissace) {
        $this->_ville_naissace = $ville_naissace;
    }

    function setDpt_naissance($dpt_naissance) {
        $this->_dpt_naissance = $dpt_naissance;
    }

    function setDate_naissance($date_naissance) {
        $date_naissance=date('d/m/Y',$date_naissance);
        $this->_date_naissance = $date_naissance;
    }

    function setDroit($droit) {
        $this->_droit = $droit;
    }
    
    function setValide($valide) {
        $this->_valide = $valide;
    }
    
    function setVisible($visible){
        $this->_visible = $visible;
    }
    
    function setStatut($statut){
        $this->_statut = $statut;
    }

    function setDistance($distance) {
        $this->_distance = $distance;
    }
    
    function setBool_placement($bool_placement) {
        $this->_bool_placement = $bool_placement;
    }

    function setId_planning_anim($id_planning_anim) {
        $this->_id_planning_anim = $id_planning_anim;
    }




}
