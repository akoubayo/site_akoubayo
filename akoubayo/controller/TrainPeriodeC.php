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
class TrainPeriodeC extends Controller {
    protected 
            $_id_train_periode,
            $_nom_periode,
            $_date_deb_periode,
            $_date_fin_periode;
    function getId_train_periode() {
        return $this->_id_train_periode;
    }

    function getNom_periode() {
        return $this->_nom_periode;
    }

    function getDate_deb_periode() {
        return $this->_date_deb_periode;
    }

    function getDate_fin_periode() {
        return $this->_date_fin_periode;
    }

    function setId_train_periode($id_train_periode) {
        $this->_id_train_periode = $id_train_periode;
    }

    function setNom_periode($nom_periode) {
        $this->_nom_periode = $nom_periode;
    }

    function setDate_deb_periode($date_deb_periode) {
        $this->_date_deb_periode = $date_deb_periode;
    }

    function setDate_fin_periode($date_fin_periode) {
        $this->_date_fin_periode = $date_fin_periode;
    }


}
