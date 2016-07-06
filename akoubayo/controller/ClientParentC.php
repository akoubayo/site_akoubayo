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
class ClientParentC extends Controller {
    protected 
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
            $_longitude_parent,
            $_latitude_parent,
            $_inter_parent,
            $_code_parent,
            $_etage_parent,
            $_gare_parent;
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
    
    function getLongitude_parent() {
        return $this->_longitude_parent;
    }

    function getLatitude_parent() {
        return $this->_latitude_parent;
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
    
    function setLongitude_parent($longitude_parent) {
        $this->_longitude_parent = $longitude_parent;
    }

    function setLatitude_parent($latitude_parent) {
        $this->_latitude_parent = $latitude_parent;
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





}
