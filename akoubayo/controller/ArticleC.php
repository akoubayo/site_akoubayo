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
class ArticleC extends Controller {
    protected 
            $_id_article,
            $_position,
            $_visible,
            $_datetime,
            $_auteur,
            $_titre,
            $_description,
            $_texte,
            $_url,
            $_titre_h,
            $_info_page,
            $_keyword;
    function getId_article() {
        return $this->_id_article;
    }

    function getPosition() {
        return $this->_position;
    }

    function getVisible() {
        return $this->_visible;
    }

    function getDatetime() {
        return $this->_datetime;
    }

    function getAuteur() {
        return $this->_auteur;
    }

    function getTitre() {
        return $this->_titre;
    }

    function getDescription() {
        return $this->_description;
    }

    function getTexte() {
        return $this->_texte;
    }

    function getUrl() {
        return $this->_url;
    }

    function getTitre_h() {
        return $this->_titre_h;
    }

    function getInfo_page() {
        return $this->_info_page;
    }

    function getKeyword() {
        return $this->_keyword;
    }

    function setId_article($id_article) {
        $this->_id_article = $id_article;
    }

    function setPosition($position) {
        $this->_position = $position;
    }

    function setVisible($visible) {
        $this->_visible = $visible;
    }

    function setDatetime($datetime) {
        $this->_datetime = $datetime;
    }

    function setAuteur($auteur) {
        $this->_auteur = $auteur;
    }

    function setTitre($titre) {
        $this->_titre = $titre;
    }

    function setDescription($description) {
        $this->_description = $description;
    }

    function setTexte($texte) {
        $this->_texte = $texte;
    }

    function setUrl($url) {
        $this->_url = $url;
    }

    function setTitre_h($titre_h) {
        $this->_titre_h = $titre_h;
    }

    function setInfo_page($info_page) {
        $this->_info_page = $info_page;
    }

    function setKeyword($keyword) {
        $this->_keyword = $keyword;
    }


}
