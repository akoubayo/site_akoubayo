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
class TrainPlanningC extends Controller {
    protected 
            $_id_train_planning,
            $_code_trajet,
            $_axe,
            $_anim_num_train,
            $_anim_num_voiture,
            $_anim_date,
            $_anim_dep,
            $_anim_arr,
            $_anim_prise_poste,
            $_anim_heure_dep,
            $_anim_heure_arr,
            $_anim_fin_poste,
            $_anim_heure,
            $_anim_gare_inter,
            $_hlp_dep_date,
            $_hlp_dep_num_train,
            $_hlp_dep_dep,
            $_hlp_dep_arr,
            $_hlp_dep_heure_dep,
            $_hlp_dep_heure_arr,
            $_hlp_dep_heure,
            $_hlp_ret_date,
            $_hlp_ret_num_train,
            $_hlp_ret_dep,
            $_hlp_ret_arr,
            $_hlp_ret_heure_dep,
            $_hlp_ret_heure_arr,
            $_hlp_ret_heure,
            $_nuit,
            $_train_periode_id,
            $_anim_id,
            $_prenom,
            $_nom,
            $_tel,
            $_mail,
            $_bool_info,
            $_statut;
    function getId_train_planning() {
        return $this->_id_train_planning;
    }

    function getCode_trajet() {
        return $this->_code_trajet;
    }

    function getAxe() {
        return $this->_axe;
    }

    function getAnim_num_train() {
        return $this->_anim_num_train;
    }

    function getAnim_num_voiture() {
        return $this->_anim_num_voiture;
    }

    function getAnim_date() {
        return $this->_anim_date;
    }

    function getAnim_dep() {
        return $this->_anim_dep;
    }

    function getAnim_arr() {
        return $this->_anim_arr;
    }

    function getAnim_prise_poste() {
        return $this->_anim_prise_poste;
    }

    function getAnim_heure_dep() {
        return $this->_anim_heure_dep;
    }

    function getAnim_heure_arr() {
        return $this->_anim_heure_arr;
    }

    function getAnim_fin_poste() {
        return $this->_anim_fin_poste;
    }

    function getAnim_heure() {
        return $this->_anim_heure;
    }

    function getAnim_gare_inter() {
        return $this->_anim_gare_inter;
    }

    function getHlp_dep_date() {
        return $this->_hlp_dep_date;
    }

    function getHlp_dep_num_train() {
        return $this->_hlp_dep_num_train;
    }

    function getHlp_dep_dep() {
        return $this->_hlp_dep_dep;
    }

    function getHlp_dep_arr() {
        return $this->_hlp_dep_arr;
    }

    function getHlp_dep_heure_dep() {
        return $this->_hlp_dep_heure_dep;
    }

    function getHlp_dep_heure_arr() {
        return $this->_hlp_dep_heure_arr;
    }

    function getHlp_dep_heure() {
        return $this->_hlp_dep_heure;
    }

    function getHlp_ret_date() {
        return $this->_hlp_ret_date;
    }

    function getHlp_ret_num_train() {
        return $this->_hlp_ret_num_train;
    }

    function getHlp_ret_dep() {
        return $this->_hlp_ret_dep;
    }

    function getHlp_ret_arr() {
        return $this->_hlp_ret_arr;
    }

    function getHlp_ret_heure_dep() {
        return $this->_hlp_ret_heure_dep;
    }

    function getHlp_ret_heure_arr() {
        return $this->_hlp_ret_heure_arr;
    }

    function getHlp_ret_heure() {
        return $this->_hlp_ret_heure;
    }

    function getNuit() {
        return $this->_nuit;
    }

    function getTrain_periode_id() {
        return $this->_train_periode_id;
    }
    
    function getAnim_id() {
        if($this->_anim_id==0){
            return "aucun";
        }else{
            return $this->_anim_id;
        }
    }
    
    function getPrenom() {
        return $this->_prenom;
    }

    function getTel() {
        return $this->_tel;
    }
    
    function getMail() {
        return $this->_mail;
    }

    function getBool_info() {
        return $this->_bool_info;
    }
    
    function getStatut(){
        return $this->_statut;
    }
    
    function getNom(){
        return $this->_nom; 
    }
    
    function setId_train_planning($id_train_planning) {
        $this->_id_train_planning = $id_train_planning;
    }

    function setCode_trajet($code_trajet) {
        $this->_code_trajet = $code_trajet;
    }

    function setAxe($axe) {
        $this->_axe = $axe;
    }

    function setAnim_num_train($anim_num_train) {
        $this->_anim_num_train = $anim_num_train;
    }

    function setAnim_num_voiture($anim_num_voiture) {
        $this->_anim_num_voiture = $anim_num_voiture;
    }

    function setAnim_date($anim_date) {
        $this->_anim_date = $anim_date;
    }

    function setAnim_dep($anim_dep) {
        $this->_anim_dep = $anim_dep;
    }

    function setAnim_arr($anim_arr) {
        $this->_anim_arr = $anim_arr;
    }

    function setAnim_prise_poste($anim_prise_poste) {
        $this->_anim_prise_poste = $anim_prise_poste;
    }

    function setAnim_heure_dep($anim_heure_dep) {
        $this->_anim_heure_dep = $anim_heure_dep;
    }

    function setAnim_heure_arr($anim_heure_arr) {
        $this->_anim_heure_arr = $anim_heure_arr;
    }

    function setAnim_fin_poste($anim_fin_poste) {
        $this->_anim_fin_poste = $anim_fin_poste;
    }

    function setAnim_heure($anim_heure) {
        $this->_anim_heure = $anim_heure;
    }

    function setAnim_gare_inter($anim_gare_inter) {
        $this->_anim_gare_inter = $anim_gare_inter;
    }

    function setHlp_dep_date($hlp_dep_date) {
        $this->_hlp_dep_date = $hlp_dep_date;
    }

    function setHlp_dep_num_train($hlp_dep_num_train) {
        $this->_hlp_dep_num_train = $hlp_dep_num_train;
    }

    function setHlp_dep_dep($hlp_dep_dep) {
        $this->_hlp_dep_dep = $hlp_dep_dep;
    }

    function setHlp_dep_arr($hlp_dep_arr) {
        $this->_hlp_dep_arr = $hlp_dep_arr;
    }

    function setHlp_dep_heure_dep($hlp_dep_heure_dep) {
        $this->_hlp_dep_heure_dep = $hlp_dep_heure_dep;
    }

    function setHlp_dep_heure_arr($hlp_dep_heure_arr) {
        $this->_hlp_dep_heure_arr = $hlp_dep_heure_arr;
    }

    function setHlp_dep_heure($hlp_dep_heure) {
        $this->_hlp_dep_heure = $hlp_dep_heure;
    }

    function setHlp_ret_date($hlp_ret_date) {
        $this->_hlp_ret_date = $hlp_ret_date;
    }

    function setHlp_ret_num_train($hlp_ret_num_train) {
        $this->_hlp_ret_num_train = $hlp_ret_num_train;
    }

    function setHlp_ret_dep($hlp_ret_dep) {
        $this->_hlp_ret_dep = $hlp_ret_dep;
    }

    function setHlp_ret_arr($hlp_ret_arr) {
        $this->_hlp_ret_arr = $hlp_ret_arr;
    }

    function setHlp_ret_heure_dep($hlp_ret_heure_dep) {
        $this->_hlp_ret_heure_dep = $hlp_ret_heure_dep;
    }

    function setHlp_ret_heure_arr($hlp_ret_heure_arr) {
        $this->_hlp_ret_heure_arr = $hlp_ret_heure_arr;
    }

    function setHlp_ret_heure($hlp_ret_heure) {
        $this->_hlp_ret_heure = $hlp_ret_heure;
    }

    function setNuit($nuit) {
        $this->_nuit = $nuit;
    }
    
    function setTrain_periode_id($train_periode_id) {
        $this->_train_periode_id = $train_periode_id;
    }

    function setAnim_id($anim_id) {
        $this->_anim_id = $anim_id;
        $model=  Model::load("UsersM");
        $d=array(
            "conditions"=>"id_users=".$anim_id
        );
        $users=$model->find($d,  $this->_db);
        if(isset($users)){
            $this->_prenom=$users[0]->getPrenom();
            $this->_tel="0".$users[0]->getTel_portable();
            $this->_mail=$users[0]->getMail();
            $this->_statut=$users[0]->getStatut();
            $this->_nom=$users[0]->getNom();
        }
    }
    
    function setBool_info($bool_info) {
        $this->_bool_info = $bool_info;
    }




}
