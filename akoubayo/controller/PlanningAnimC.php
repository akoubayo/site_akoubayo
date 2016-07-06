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
class PlanningAnimC extends Controller {
    protected 
            $_id_planning_anim,
            $_planning_id,
            $_users_id,
            $_dispo;
    function getId_planning_anim() {
        return $this->_id_planning_anim;
    }

    function getPlanning_id() {
        return $this->_planning_id;
    }

    function getUsers_id() {
        return $this->_users_id;
    }

    function getDispo() {
        return $this->_dispo;
    }

    function setId_planning_anim($id_planning_anim) {
        $this->_id_planning_anim = $id_planning_anim;
    }

    function setPlanning_id($planning_id) {
        $this->_planning_id = $planning_id;
    }

    function setUsers_id($users_id) {
        $this->_users_id = $users_id;
    }

    function setDispo($dispo) {
        $this->_dispo = $dispo;
    }


}
