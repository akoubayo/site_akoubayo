<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AnimationC
 *
 * @author akoubayo
 */
class AnimationC extends Controller {
    protected 
            $_id_animations,
            $_noms,
            $_descriptions,
            $_details,
            $_prix_max,
            $_prix_min,
            $_durees,
            $_nb_enfants,
            $_liens,
            $_titres,
            $_h1,
            $_titre_lien;
public  function getId_animations() {
return $this->_id_animations;
}

public  function getNoms() {
return $this->_noms;
}

public  function getDescriptions() {
return $this->_descriptions;
}

public  function getDetails() {
return $this->_details;
}

public  function getPrix_max() {
return $this->_prix_max;
}

public  function getPrix_min() {
return $this->_prix_min;
}

public  function getDurees() {
return $this->_durees;
}

public  function getNb_enfants() {
return $this->_nb_enfants;
}

public  function getLiens() {
return $this->_liens;
}

public  function getTitres() {
return $this->_titres;
}

public  function getH1() {
return $this->_h1;
}

public  function setId_animations($id_animations) {
$this->_id_animations = $id_animations;
}

public  function setNoms($noms) {
$this->_noms = $noms;
}

public  function setDescriptions($descriptions) {
$this->_descriptions = $descriptions;
}

public  function setDetails($details) {
$this->_details = $details;
}

public  function setPrix_max($prix_max) {
$this->_prix_max = $prix_max;
}

public  function setPrix_min($prix_min) {
$this->_prix_min = $prix_min;
}

public  function setDurees($durees) {
$this->_durees = $durees;
}

public  function setNb_enfants($nb_enfants) {
$this->_nb_enfants = $nb_enfants;
}

public  function setLiens($liens) {
$this->_liens = $liens;
}

public  function setTitres($titres) {
$this->_titres = $titres;
}

public  function setH1($h1) {
$this->_h1 = $h1;
}
function getTitre_lien() {
    return $this->_titre_lien;
}

function setTitre_lien($_titre_lien) {
    $this->_titre_lien = $_titre_lien;
}


    
}
