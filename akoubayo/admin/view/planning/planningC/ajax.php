<?php
include_once '../../../../core/includeAjax.php';


if(isset($_POST["dateTime"])){    
    $t=array();
    $plannings= Model::load("PlanningM");
    $d=array(
        "conditions"=>"date_planning=$_POST[dateTime]"
    );
    $testDateT=$plannings->find($d,$db);
    if(!isset($testDateT)){
        $d=array("date_planning"=>$_POST["dateTime"]);
        $idDate=$plannings->save($d,$db);
        $idDate=$idDate[0]->getId_planning();
    }else{
        $idDate=$testDateT[0]->getId_planning();
    }
    
    
    $plannings= Model::load("PlanningAnimM");
    $d=array(
        "table"=>"admin_planning_anim,admin_planning",
        "conditions"=>"id_planning=$idDate AND planning_id=id_planning AND date_planning=$_POST[dateTime] AND users_id=$_SESSION[id] "
    );
    $planning=$plannings->find($d,$db);
    if(!isset($planning)){
        $d1=array(
            "planning_id"=>$idDate,
            "users_id"=>$_SESSION['id'],
            "dispo"=>1
        );
        $saveDate=$plannings->save($d1,$db);
    }else{
        $dispo=$planning[0]->getDispo();
        if($dispo>=3){$dispo=1;}else{$dispo=$dispo+1;}
        $d1=array(
            "id_planning_anim"=>$planning[0]->getId_planning_anim(),
            "dispo"=>$dispo
        );
        $saveDate=$plannings->save($d1,$db);
        $saveDate=$plannings->find($d,$db);
    }
    
    $t['retour']=$saveDate[0]->getDispo();
    echo json_encode($t);
}
?>
