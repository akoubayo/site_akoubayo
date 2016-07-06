<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageC
 *
 * @author akoubayo
 */
class ImageC extends Controller {
    protected 
            $_id_images,
            $_noms,
            $_emplacements,
            $_titres,
            $_alt,
            $_fiches_id,
            $_etape_id,
            $_ateliers_id,
            $_options_id,
            $_animations_id,
            $_index_fiche;
public  function getId_images() {
return $this->_id_images;
}

public  function getNoms() {
return $this->_noms;
}

public  function getEmplacements() {
return $this->_emplacements;
}

public  function getTitres() {
return $this->_titres;
}

public  function getAlt() {
return $this->_alt;
}

public  function getFiches_id() {
return $this->_fiches_id;
}

public  function getEtape_id() {
return $this->_etape_id;
}

public  function getAteliers_id() {
return $this->_ateliers_id;
}

public  function getOptions_id() {
return $this->_options_id;
}

public  function getAnimations_id() {
return $this->_animations_id;
}

public  function getIndex_fiche() {
return $this->_index_fiche;
}

public  function setId_images($id_images) {
$this->_id_images = $id_images;
}

public  function setNoms($noms) {
$this->_noms = $noms;
}

public  function setEmplacements($emplacements) {
$this->_emplacements = $emplacements;
}

public  function setTitres($titres) {
$this->_titres = $titres;
}

public  function setAlt($alt) {
$this->_alt = $alt;
}

public  function setFiches_id($fiches_id) {
$this->_fiches_id = $fiches_id;
}

public  function setEtape_id($etape_id) {
$this->_etape_id = $etape_id;
}

public  function setAteliers_id($ateliers_id) {
$this->_ateliers_id = $ateliers_id;
}

public  function setOptions_id($options_id) {
$this->_options_id = $options_id;
}

public  function setAnimations_id($animations_id) {
$this->_animations_id = $animations_id;
}

public  function setIndex_fiche($index_fiche) {
$this->_index_fiche = $index_fiche;
}


}
