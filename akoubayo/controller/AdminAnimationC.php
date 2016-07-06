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
class AdminAnimationC extends Controller {
    protected 
            $_id_animation,
            $_nom_animation,
            $_duree_animation,
            $_nb_enfant_animation,
            $_prix_enfant_animation,
            $_tarif_animateur,
            $_tarif_ferie,
            $_tarif_animation,
            $_tarif_demi_heure,
            $_visible_animation;
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

    function getTarif_animation() {
        return $this->_tarif_animation;
    }

    function getTarif_demi_heure() {
        return $this->_tarif_demi_heure;
    }

    function getVisible_animation() {
        return $this->_visible_animation;
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


}
    