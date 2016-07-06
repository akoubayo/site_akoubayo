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
class AdminMenuC extends Controller{
    protected 
            $_id_menu,
            $_nom_menu,
            $_lien_menu,
            $_position_menu,
            $_sous_menu_admin;
    function getId_menu() {
        return $this->_id_menu;
    }

    function getNom_menu() {
        return $this->_nom_menu;
    }

    function getLien_menu() {
        return $this->_lien_menu;
    }

    function getPosition_menu() {
        return $this->_position_menu;
    }
    
    function getSous_menu_admin() {
        return $this->_sous_menu_admin;
    }

    function setId_menu($id_menu) {
        $this->_id_menu = $id_menu;
    }

    function setNom_menu($nom_menu) {
        $this->_nom_menu = $nom_menu;
    }

    function setLien_menu($lien_menu) {
        $this->_lien_menu = $lien_menu;
    }

    function setPosition_menu($position_menu) {
        $this->_position_menu = $position_menu;
    }
    
    function setSous_menu_admin($sous_menu_admin) {
        $this->_sous_menu_admin = $sous_menu_admin;
    }



}
