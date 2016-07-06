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
class ClientEnfantC extends Controller {
    protected 
            $_id_enfant,
            $_parent_id,
            $_prenom_enfant,
            $_sexe_enfant,
            $_date_naissance,
            $_comment_enfant;
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
        return $this->_sexe_enfant;
    }

    function getDate_naissance() {
        return $this->_date_naissance;
    }

    function getComment_enfant() {
        return $this->_comment_enfant;
    }

    function setId_enfant($id_enfant) {
        $this->_id_enfant = $id_enfant;
    }

    function setParent_id($parent_id) {
        $this->_parent_id = $parent_id;
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


}
