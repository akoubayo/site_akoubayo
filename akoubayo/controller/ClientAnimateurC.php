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
class ClientAnimateurC extends Controller {
    protected 
            $_id_client_animateur,
            $_users_id,
            $_event_id;
    function getId_client_animateur() {
        return $this->_id_client_animateur;
    }

    function getUsers_id() {
        return $this->_users_id;
    }

    function getEvent_id() {
        return $this->_event_id;
    }

    function setId_client_animateur($id_client_animateur) {
        $this->_id_client_animateur = $id_client_animateur;
    }

    function setUsers_id($users_id) {
        $this->_users_id = $users_id;
    }

    function setEvent_id($event_id) {
        $this->_event_id = $event_id;
    }


}
