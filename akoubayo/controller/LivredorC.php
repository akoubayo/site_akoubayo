<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of livredorC
 *
 * @author akoubayo
 */
class LivredorC extends Controller{
    protected 
            $_id_livredor,
            $_pseudos,
            $_ips,
            $_villes,
            $_zips,
            $_dates,
            $_messages,
            $_visibles;
public  function getId_livredor() {
return $this->_id_livredor;
}

public  function getPseudos() {
return $this->_pseudos;
}

public  function getIps() {
return $this->_ips;
}

public  function getVilles() {
return $this->_villes;
}

public  function getZips() {
return $this->_zips;
}

public  function getDates() {
return $this->_dates;
}

public  function getMessages() {
return $this->_messages;
}

public  function getVisibles() {
return $this->_visibles;
}

public  function setId_livredor($id_livredor) {
$this->_id_livredor = $id_livredor;
}

public  function setPseudos($pseudos) {
$this->_pseudos = $pseudos;
}

public  function setIps($ips) {
$this->_ips = $ips;
}

public  function setVilles($villes) {
$this->_villes = $villes;
}

public  function setZips($zips) {
$this->_zips = $zips;
}

public  function setDates($dates) {
$this->_dates = $dates;
}

public  function setMessages($messages) {
$this->_messages = $messages;
}

public  function setVisibles($visibles) {
$this->_visibles = $visibles;
}

    
}
