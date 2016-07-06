<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OptionsC
 *
 * @author akoubayo
 */
require_once 'Animations_optionC.php';
class OptionsC extends Animations_optionC{
    protected 
            $_id_options,
            $_noms_option,
            $_prix_opt,
            $_descriptions_opt,
            $_type_option,
            $_nb_client_opt,
            $_offert_client_opt;
public  function getId_options() {
return $this->_id_options;
}

public  function getNoms_option() {
return $this->_noms_option;
}

public  function getPrix_opt() {
    if($this->_offert_client_opt==1){
        $offert="offert";
        return $offert;
    }else{
        return $this->_prix_opt;
    }
}

public  function getDescriptions_opt() {
return $this->_descriptions_opt;
}

function getType_option() {
    return $this->_type_option;
}

function getNb_client_opt() {
    return $this->_nb_client_opt;
}

function getOffert_client_opt() {
    return $this->_offert_client_opt;
}

public  function setId_options($id_options) {
$this->_id_options = $id_options;
}

public  function setNoms_option($noms_option) {
$this->_noms_option = $noms_option;
}

public  function setPrix_opt($prix_opt) {
$this->_prix_opt = $prix_opt;
}

public  function setDescriptions_opt($descriptions_opt) {
$this->_descriptions_opt = $descriptions_opt;
}

function setType_option($type_option) {
    $this->_type_option = $type_option;
}

function setNb_client_opt($quantite_client_opt) {
    $this->_nb_client_opt = $quantite_client_opt;
}

function setOffert_client_opt($offert_client_opt) {
    $this->_offert_client_opt = $offert_client_opt;
}


}
