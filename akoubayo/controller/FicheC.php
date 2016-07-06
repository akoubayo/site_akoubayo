<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FicheC
 *
 * @author akoubayo
 */
class FicheC extends Controller{
    protected 
            $_id_fiche,
            $_atelier_id,
            $_titre,
            $_contenu,
            $_titres,
            $_descriptions,
            $_h1,
            $_image;
    
public  function getId_fiche() {
return $this->_id_fiche;
}

public  function getAtelier_id() {
return $this->_atelier_id;
}

public  function getTitre() {
return $this->_titre;
}

public  function getContenu() {
return $this->_contenu;
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
public  function getImage() {
return $this->_image;
}
public  function setAtelier_id($atelier_id) {
$atelier_id=(int)$atelier_id;
$this->_atelier_id = $atelier_id;
$this->setImage();
}
public  function setId_fiche($id_fiche) {
$this->_id_fiche = $id_fiche;
}

public  function setImage() {
if($_SERVER['SERVER_NAME']=='localhost'){
            $db = new PDO('mysql:host=localhost:8889;dbname=akoubayo', 'root', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
            $db->exec("SET CHARACTER SET utf8");
        }
        else{
            $db = new PDO('mysql:host=mysql51-37.bdb;dbname=akoubayoshop', 'akoubayoshop', 'allant2559');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
            $db->exec("SET CHARACTER SET utf8");
        }
$image=Model::load("ImageM");
$d=array(
    "conditions"=>"ateliers_id=$this->_atelier_id AND fiches_id=$this->_id_fiche AND index_fiche=1"
);
$img=$image->find($d,$db);
$this->_image=$img;

}




public  function setTitre($titre) {
$this->_titre = $titre;
}

public  function setContenu($contenu) {
$this->_contenu = $contenu;
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
