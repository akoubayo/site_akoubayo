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
class ClientEnfantEventC extends Controller {
    protected 
            $_id_client_enfant_event,
            $_enfant_id,
            $_parent_id;
    
    function getId_client_enfant_event() {
        return $this->_id_client_enfant_event;
    }

    function getEnfant_id() {
        return $this->_enfant_id;
    }

    function getParent_id() {
        return $this->_parent_id;
    }

    function setId_client_enfant_event($id_client_enfant_event) {
        $this->_id_client_enfant_event = $id_client_enfant_event;
    }

    function setEnfant_id($enfant_id) {
        $this->_enfant_id = $enfant_id;
    }

    function setParent_id($parent_id) {
        $this->_parent_id = $parent_id;
    }


}
