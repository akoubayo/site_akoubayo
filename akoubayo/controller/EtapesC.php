<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EtapesC
 *
 * @author akoubayo
 */
class EtapesC extends Controller{
   protected 
           $_id_etapes,
           $_numeros_etapes,
           $_fiches_id,
           $_titre,
           $_texte;
public  function getId_etapes() {
return $this->_id_etapes;
}

public  function getNumeros_etapes() {
return $this->_numeros_etapes;
}

public  function getFiches_id() {
return $this->_fiches_id;
}

public  function getTitre() {
return $this->_titre;
}

public  function getTexte() {
return $this->_texte;
}

public  function setId_etapes($id_etapes) {
$this->_id_etapes = $id_etapes;
}

public  function setNumeros_etapes($numeros_etapes) {
$this->_numeros_etapes = $numeros_etapes;
}

public  function setFiches_id($fiches_id) {
$this->_fiches_id = $fiches_id;
}

public  function setTitre($titre) {
$this->_titre = $titre;
}

public  function setTexte($texte) {
$this->_texte = $texte;
}


}
