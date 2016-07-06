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
class ClientOptionC extends Controller {
    protected 
            $_id_client_option,
            $_event_id,
            $_option_id,
            $_nb_client_opt,
            $_offert_client_opt;
    function getId_client_option() {
        return $this->_id_client_option;
    }

    function getEvent_id() {
        return $this->_event_id;
    }

    function getOption_id() {
        return $this->_option_id;
    }

    function getNb_client_opt() {
        return $this->_nb_client_opt;
    }

    function getOffert_client_opt() {
        return $this->_offert_client_opt;
    }

    function setId_client_option($id_client_option) {
        $this->_id_client_option = $id_client_option;
    }

    function setEvent_id($event_id) {
        $this->_event_id = $event_id;
    }

    function setOption_id($option_id) {
        $this->_option_id = $option_id;
    }

    function setNb_client_opt($nb_client_opt) {
        $this->_nb_client_opt = $nb_client_opt;
    }

    function setOffert_client_opt($offert_client_opt) {
        $this->_offert_client_opt = $offert_client_opt;
    }


}
