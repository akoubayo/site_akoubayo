<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SousmenuC
 *
 * @author akoubayo
 */
class SousMenuC extends Controller {
    protected 
            $_id_ss_menu,
            $_menu_id,
            $_nom_sous,
            $_lien_sous,
            $_ss_titres,
            $_ss_h1,
            $_ss_desc;
public  function getId_ss_menu() {
return $this->_id_ss_menu;
}

public  function getMenu_id() {
return $this->_menu_id;
}

public  function getNom_sous() {
return $this->_nom_sous;
}

public  function getLien_sous() {
return $this->_lien_sous;
}

public  function getSs_titres() {
return $this->_ss_titres;
}

public  function getSs_h1() {
return $this->_ss_h1;
}

public  function getH1() {
return $this->_ss_h1;
}

public function getDescriptions() {
    return $this->_ss_desc;
}

public function getTitres() {
    return $this->_ss_titres;
}

public  function getSs_desc() {
return $this->_ss_desc;
}

public  function setId_ss_menu($id_ss_menu) {
$this->_id_ss_menu = $id_ss_menu;
}

public  function setMenu_id($menu_id) {
$this->_menu_id = $menu_id;
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

public  function setSs_desc($ss_desc) {
$this->_ss_desc = $ss_desc;
}

           
            
}
