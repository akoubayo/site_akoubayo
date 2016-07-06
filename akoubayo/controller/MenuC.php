<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuC
 *
 * @author akoubayo
 */
class MenuC extends Controller{
    protected 
            $_id_menu,
            $_nom,
            $_position,
            $_lien_pages,
            $_ss_menu,
            $_titres,
            $_h1,
            $_descriptions,
            $_nom_sous,
            $_lien_sous,
            $_ss_titres,
            $_ss_h1,
            $_ss_descriptions,
            $_nb_sous_menu;
    
public  function getNb_sous_menu() {
return $this->_nb_sous_menu;
}
           
public  function getId_menu() {
return $this->_id_menu;
}

public  function getNom() {
return $this->_nom;
}

public  function getPosition() {
return $this->_position;
}

public  function getLien_pages() {
return $this->_lien_pages;
}

public  function getSs_menu() {
return $this->_ss_menu;
}

public  function getTitres() {
return $this->_titres;
}

public  function getH1() {
return $this->_h1;
}

public  function getDescriptions() {
return $this->_descriptions;
}

public  function getNom_sous($i) {
return $this->_nom_sous[$i];
}

public  function getLien_sous($i) {
return $this->_lien_sous[$i];
}

public  function getSs_titres() {
return $this->_ss_titres;
}

public  function getSs_h1() {
return $this->_ss_h1;
}

public  function getSs_descriptions() {
return $this->_ss_descriptions;
}

public  function setId_menu($id_menu) {
$this->_id_menu = $id_menu;
}

public  function setNom($nom) {
$this->_nom = $nom;
}

public  function setPosition($position) {
$this->_position = $position;
}

public  function setLien_pages($lien_pages) {
$this->_lien_pages = $lien_pages;
}

public  function setSs_menu($ss_menu) {

$this->_ss_menu = $ss_menu;
if($this->_ss_menu>0){
    $sousMenu=Model::load("SousMenuM");
    $d=array(
        "conditions"=>"menu_id=".$this->_id_menu
        );
    $sousMenu=$sousMenu->find($d,$this->_db);
    if(isset($sousMenu)){
        $i=0;
        foreach ($sousMenu as $ss){
        $this->_lien_sous[$i]=$ss->getLien_sous();
        $this->_nom_sous[$i]=$ss->getNom_sous();
        $i++;
        }
        $this->_nb_sous_menu=$i;
    }
}
}

public  function setTitres($titres) {
$this->_titres = $titres;
}

public  function setH1($h1) {
$this->_h1 = $h1;
}

public  function setDescriptions($descriptions) {
$this->_descriptions = $descriptions;
}

public  function setNom_sous($nom_sous) {
$this->_nom_sous = $nom_sous;
}

public  function setLien_sous($lien_sous) {
$this->_lien_sous = $lien_sous;
}

public  function setSs_titres($ss_titres) {
$this->_ss_titres = $ss_titres;
}

public  function setSs_h1($ss_h1) {
$this->_ss_h1 = $ss_h1;
}

public  function setSs_descriptions($ss_descriptions) {
$this->_ss_descriptions = $ss_descriptions;
}

           
}