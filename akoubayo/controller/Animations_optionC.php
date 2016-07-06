<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Animations_optionC
 *
 * @author akoubayo
 */
class Animations_optionC extends Controller {
    protected 
            $_id_animations,
            $_id_options,
            $_position;
public  function getId_animations() {
return $this->_id_animations;
}

public  function getId_options() {
return $this->_id_options;
}

public  function getPosition() {
return $this->_position;
}

public  function setId_animations($id_animations) {
$this->_id_animations = $id_animations;
}

public  function setId_options($id_options) {
$this->_id_options = $id_options;
}

public  function setPosition($position) {
$this->_position = $position;
}


}
