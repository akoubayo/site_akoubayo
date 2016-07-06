<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AtelierC
 *
 * @author akoubayo
 */
class AtelierC extends Controller{
    protected 
            $_id_atelier,
            $_nom_atelier,
            $_titres,
            $_descriptions,
            $_h1;
    
public  function getId_atelier() {
return $this->_id_atelier;
}

public  function getNom_atelier() {
return $this->_nom_atelier;
}

public  function setId_atelier($id_atelier) {
$this->_id_atelier = $id_atelier;
}

public  function setNom_atelier($nom_atelier) {
$this->_nom_atelier = $nom_atelier;
}
public  function getTitres() {
return $this->_titres;
}

public  function getDescriptions() {
return $this->_descriptions;
}

public  function getH1() {
return $this->_h1;
}

public  function setTitres($titres) {
$this->_titres = $titres;
}

public  function setDescriptions($descriptions) {
$this->_descriptions = $descriptions;
}

public  function setH1($h1) {
$this->_h1 = $h1;
}



}
