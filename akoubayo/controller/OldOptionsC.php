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
class OldOptionsC extends Controller {
    protected 
            $_id_old_option,
            $_nom_old_opt,
            $_prix_old_opt,
            $_quantite_client_old;
    function getId_old_option() {
        return $this->_id_old_option;
    }

    function getNom_old_opt() {
        return $this->_nom_old_opt;
    }

    function getPrix_old_opt() {
        return $this->_prix_old_opt;
    }
    
    function getQuantite_client_old() {
        return $this->_quantite_client_old;
    }

        function setId_old_option($id_old_option) {
        $this->_id_old_option = $id_old_option;
    }

    function setNom_old_opt($nom_old_opt) {
        $this->_nom_old_opt = $nom_old_opt;
    }

    function setPrix_old_opt($prix_old_opt) {
        $this->_prix_old_opt = $prix_old_opt;
    }
    
    function setQuantite_client_old($quantite_client_old) {
        $this->_quantite_client_old = $quantite_client_old;
    }



}
