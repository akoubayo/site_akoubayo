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
class PlanningC extends Controller {
    protected 
            $_id_planning,
            $_date_planning;
    function getId_planning() {
        return $this->_id_planning;
    }

    function getDate_planning() {
        return $this->_date_planning;
    }

    function setId_planning($id_planning) {
        $this->_id_planning = $id_planning;
    }

    function setDate_planning($date_planning) {
        $this->_date_planning = $date_planning;
    }


}
