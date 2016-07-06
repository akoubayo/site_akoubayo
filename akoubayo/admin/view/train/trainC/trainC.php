<?php
// *********************    Enregistrement des trains en base de données
require_once './bin/PHPExcel/Classes/PHPExcel/IOFactory.php';
if(isset($_FILES['fichierssss']) ) // si formulaire soumis
{
  $content_dir = './webroot/train/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['fichier']['tmp_name'];
    if( !is_uploaded_file($tmp_file) )
    {
        exit();
    }
    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['fichier']['name'];
    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit();
    }
    $model=  Model::load("TrainPeriodeM");
    if($_POST['modif_periode']==0){
        $dPeriode=array(
            "nom_periode"=>$_POST["nom_periode"],
            "date_deb_periode"=>  strtotime($_POST["date_deb_periode"]),
            "date_fin_periode"=> strtotime($_POST["date_fin_periode"]),
        );
        $idPeriode=$model->save($dPeriode,$db);
        if(isset($idPeriode)){
            $idPeriode=$idPeriode[0]->getId_train_periode();
        }
    }else{
        $idPeriode=$_POST['modif_periode'];
    }
    // Chargement du fichier Excel
$objPHPExcel = PHPExcel_IOFactory::load("./webroot/train/".$name_file);

$sheet = $objPHPExcel->getSheet(0);
$j=0;
// On boucle sur les lignes
foreach($sheet->getRowIterator() as $row) {
 $i=0;
 $j++;
 $d=array();
   // On boucle sur les cellule de la ligne
foreach ($row->getCellIterator() as $cell) {
      $i++;
    if($j>1){
        $c=$cell->getValue();
        if(!empty($c)){
            switch ($i){
                case 1:$d['code_trajet']=$cell->getValue();
                    break;
                case 2:$d['axe']=$cell->getValue();
                    break;
                case 3:$d['anim_num_train']=$cell->getValue();
                    break;
                case 4:$d['anim_num_voiture']=$cell->getValue();
                    break;
                case 5:$d['anim_date']=strtotime(PHPExcel_Calculation_DateTime::DAYOFMONTH($cell->getValue()).'-'.PHPExcel_Calculation_DateTime::MONTHOFYEAR($cell->getValue()).'-'.PHPExcel_Calculation_DateTime::YEAR($cell->getValue())); 
                          $anim_date=PHPExcel_Calculation_DateTime::DAYOFMONTH($cell->getValue()).'-'.PHPExcel_Calculation_DateTime::MONTHOFYEAR($cell->getValue()).'-'.PHPExcel_Calculation_DateTime::YEAR($cell->getValue()); 
                    break;
                case 6:$d['anim_dep']=$cell->getValue();
                    break;
                case 7:$d['anim_arr']=$cell->getValue();
                    break;
                case 8: $d['anim_prise_poste']=strtotime($anim_date.' '.PHPExcel_Calculation_DateTime::HOUROFDAY($cell->getValue()).':'.PHPExcel_Calculation_DateTime::MINUTEOFHOUR($cell->getValue()));
                    break;
                case 9: $d['anim_heure_dep']=strtotime($anim_date.' '.PHPExcel_Calculation_DateTime::HOUROFDAY($cell->getValue()).':'.PHPExcel_Calculation_DateTime::MINUTEOFHOUR($cell->getValue()));
                    break;
                case 10: $d['anim_heure_arr']=strtotime($anim_date.' '.PHPExcel_Calculation_DateTime::HOUROFDAY($cell->getValue()).':'.PHPExcel_Calculation_DateTime::MINUTEOFHOUR($cell->getValue()));
                    break;
                case 11: $d['anim_fin_poste']=strtotime($anim_date.' '.PHPExcel_Calculation_DateTime::HOUROFDAY($cell->getValue()).':'.PHPExcel_Calculation_DateTime::MINUTEOFHOUR($cell->getValue()));
                    break;
                case 12: $d['anim_heure']=round($cell->getValue(),2);
                    break;
                case 13:
                    $recheche=array("'","\/","\\");
                    $replace=array("\\'","","");
                    $d['anim_gares_inter']=  str_replace($recheche,$replace,$cell->getValue());
                    break;
                case 14:$d['hlp_dep_date']=strtotime(PHPExcel_Calculation_DateTime::DAYOFMONTH($cell->getValue()).'-'.PHPExcel_Calculation_DateTime::MONTHOFYEAR($cell->getValue()).'-'.PHPExcel_Calculation_DateTime::YEAR($cell->getValue())); 
                          $hlp_dep_date=PHPExcel_Calculation_DateTime::DAYOFMONTH($cell->getValue()).'-'.PHPExcel_Calculation_DateTime::MONTHOFYEAR($cell->getValue()).'-'.PHPExcel_Calculation_DateTime::YEAR($cell->getValue()); 
                    break;
                case 15:$d['hlp_dep_num_train']=$cell->getValue();
                    break;
                case 16:
                    $recheche=array("'","\/","\\");
                    $replace=array("\\'","","");
                    $d['hlp_dep_dep']=str_replace($recheche,$replace,$cell->getValue());
                    break;
                case 17:
                    $recheche=array("'","\/","\\");
                    $replace=array("\\'","","");
                    $d['hlp_dep_arr']=$cell->getValue();
                    break;
                case 18:$d['hlp_dep_heure_dep']=strtotime($hlp_dep_date.' '.PHPExcel_Calculation_DateTime::HOUROFDAY($cell->getValue()).':'.PHPExcel_Calculation_DateTime::MINUTEOFHOUR($cell->getValue()));
                case 19:$d['hlp_dep_heure_arr']=strtotime($hlp_dep_date.' '.PHPExcel_Calculation_DateTime::HOUROFDAY($cell->getValue()).':'.PHPExcel_Calculation_DateTime::MINUTEOFHOUR($cell->getValue()));
                    break;
                case 20:$d['hlp_dep_heure']=round($cell->getValue(),2);
                    break;
                case 21:$d['hlp_ret_date']=strtotime(PHPExcel_Calculation_DateTime::DAYOFMONTH($cell->getValue()).'-'.PHPExcel_Calculation_DateTime::MONTHOFYEAR($cell->getValue()).'-'.PHPExcel_Calculation_DateTime::YEAR($cell->getValue())); 
                          $hlp_ret_date=PHPExcel_Calculation_DateTime::DAYOFMONTH($cell->getValue()).'-'.PHPExcel_Calculation_DateTime::MONTHOFYEAR($cell->getValue()).'-'.PHPExcel_Calculation_DateTime::YEAR($cell->getValue()); 
                    break;
                case 22:$d['hlp_ret_num_train']=$cell->getValue();
                    break;
                case 23:$recheche=array("'","\/","\\");
                    $replace=array("\\'","","");
                    $d['hlp_ret_dep']=$cell->getValue();
                    break;
                case 24:$recheche=array("'","\/","\\");
                    $replace=array("\\'","","");
                    $d['hlp_ret_arr']=$cell->getValue();
                    break;
                case 25:$d['hlp_ret_heure_dep']=strtotime($hlp_ret_date.' '.PHPExcel_Calculation_DateTime::HOUROFDAY($cell->getValue()).':'.PHPExcel_Calculation_DateTime::MINUTEOFHOUR($cell->getValue()));
                    break;
                case 26:$d['hlp_ret_heure_arr']=strtotime($hlp_ret_date.' '.PHPExcel_Calculation_DateTime::HOUROFDAY($cell->getValue()).':'.PHPExcel_Calculation_DateTime::MINUTEOFHOUR($cell->getValue()));
                    break;
                case 27:$d['hlp_ret_heure']=round($cell->getValue(),2);
                    break;
                case 28:$d['nuit']=$cell->getValue();
                    break;
                default :   
            }
        }
    }
   }
   if(!empty($d)){
        $d['train_periode_id']=$idPeriode;
        $model=  Model::load("trainPlanningM");
        $dFind=array();
        $dFind['conditions']="";
        foreach ($d as $k=>$v){
            $dFind['conditions'].=$k.' = "'.$v.'" AND ';
        }
       
        $dFind['conditions']=  substr($dFind['conditions'],0,-5);

        $find=$model->find($dFind,$db);
        if(!isset($find)){
            $save=$model->save($d,$db);
        }
        if(isset($find)){
            unset($find);
        }
   }
}
header('Location:admin-train.html');    
}
// *********************    Fin de l'enregistrement des trains en base de données

// *********************    On récupère le planning des trains
$model=  Model::load("TrainPeriodeM");

$d=array(
    "order"=>"id_train_periode DESC"
);

$periodeTrain=$model->find($d,$db);

if(isset($_POST['selectPeriode'])){
    $d=array(
        "conditions"=>"train_periode_id = ".$_POST['selectPeriode'],
        "order"=>"anim_date ASC, anim_prise_poste ASC "
    );
}elseif(isset($periodeTrain)){
    if(!isset($_POST['tri'])){
    $d=array(
        "conditions"=>"train_periode_id = ".$periodeTrain[0]->getId_train_periode(),
        "order"=>"anim_date ASC,code_trajet ASC, anim_prise_poste ASC"
    );
    }else{
        switch ($_POST['tri']) {
        case "date":
                $d=array(
                    "conditions"=>"train_periode_id = ".$periodeTrain[0]->getId_train_periode(),
                    "order"=>"anim_date ASC,anim_prise_poste ASC"
                );
            break;
        case "com":
                $d=array(
                    "conditions"=>"train_periode_id = ".$periodeTrain[0]->getId_train_periode(),
                    "order"=>"anim_id ASC,anim_prise_poste ASC"
                );
            break;
        case "code":
                $d=array(
                    "conditions"=>"train_periode_id = ".$periodeTrain[0]->getId_train_periode(),
                    "order"=>"code_trajet ASC,anim_date ASC, anim_prise_poste ASC"
                );
            break;
        default:
            $d=array(
                    "conditions"=>"train_periode_id = ".$periodeTrain[0]->getId_train_periode(),
                    "order"=>"anim_date ASC,code_trajet ASC, anim_prise_poste ASC"
                );
            break;
        }
    }
}else{
    $d=array();
}
$model=Model::load("TrainPlanningM");
$trainPlanning=$model->find($d,$db);


if(isset($_POST['idEvent'])){
    $i=0;
    $count=$_POST['compte'];
    $model=  Model::load("TrainPlanningM");
    while ($i<$count){
        if(isset($_POST['placement'.$i])){
            $d=array(
                "conditions"=>"id_train_planning=".$_POST['idEvent']
            );
            $find=$model->find($d,$db);
            if(isset($find)){
                $d=array(
                    "id_train_planning"=>$find[0]->getId_train_planning(),
                    "anim_id"=>$_POST['idUsers'.$i],
                    "bool_info"=>0
                );
                $save=$model->save($d,$db);
            }
            $placement=  Model::load('PlanningAnimM');
            if($_POST['date1']==0){
             $d=array(
                "table"=>"admin_planning_anim, admin_planning",
                "conditions"=>"planning_id=id_planning AND users_id=".$_POST['idUsers'.$i]." AND date_planning=".$_POST['date']
            );   
            }else{
            $d=array(
                "table"=>"admin_planning_anim, admin_planning",
                "conditions"=>"planning_id=id_planning AND users_id=".$_POST['idUsers'.$i]." AND date_planning BETWEEN ".$_POST['date1']." AND ".$_POST['date']
            );
            }
            $findId=$placement->find($d,$db);
           
            if(isset($findId)){
                foreach ($findId as $f){
                    $d=array(
                        "id_planning_anim"=>$f->getId_planning_anim(),
                        "bool_placement"=>1,
                    );
                    $plac=$placement->save($d,$db);
                }
            }
        }elseif (!isset($_POST['placement'.$i]) && $_POST['update'.$i]==1) {
             $d=array(
                "conditions"=>"id_train_planning=".$_POST['idEvent']
            );
            $find=$model->find($d,$db);
            $d=array(
                    "id_train_planning"=>$find[0]->getId_train_planning(),
                    "anim_id"=>0,
                    "bool_info"=>0,
                );
                $save=$model->save($d,$db);
                    $placement=  Model::load('PlanningAnimM');
                        $d=array(
                "table"=>"admin_planning_anim, admin_planning",
                "conditions"=>"planning_id=id_planning AND users_id=".$_POST['idUsers'.$i]." AND date_planning BETWEEN ".$_POST['date1']." AND ".$_POST['date']
            );
                       
            $findId=$placement->find($d,$db);
            if(isset($findId)){
               
                foreach ($findId as $f){
                    $d=array(
                        "id_planning_anim"=>$f->getId_planning_anim(),
                        "bool_placement"=>0,
                    );
                    $plac=$placement->save($d,$db);
                }
            }
         }
        
        $i++;
    }
    $model=  Model::load('ClientEventM');
    $d=array(
        "id_event"=>$_POST['idEvent'],
        "bool_info"=>0
    );
    $info=$model->save($d,$db);
    
    header('location:admin-train.html');
    
 
}

/**************  Envoie de mail   ****************/

// Envoie info aux animateurs
if(isset($_POST['action']) && $_POST['action']=='info'){
            $i=0;
            $model=Model::load("TrainPlanningM");
            $mailPerso="akoubayofamily@gmail.com";
            while ($i<$_POST['compte']){
               $d=array(
                    "conditions"=>'id_train_planning='.$_POST['idEvent'.$i]
               );
                $event=$model->find($d,$db);
                $mail=$event[0]->getMail();
                $message=Mail::infoTrain($event);
   
                outils::envoieMail($mail, $message[0], $message[1], $message[2]);
                outils::envoieMail($mailPerso, $message[0], $message[1], $message[2]);
                $idEvent=$event[0]->getId_train_planning();
                $d=array(
                    "id_train_planning"=>$idEvent,
                    "bool_info"=>1
                );
                $boolInfo=$model->save($d,$db);
            $i++;}
            
    header('location:admin-train.html');
}

// *********    Création du devis **********
if(isset($_POST['envoieDevis'])){
    require('./bin/html2pdf/html2pdf.class.php');
    $model=  Model::load("TrainPlanningM");
    $d=array(
        "conditions"=>"train_periode_id=".$_POST['selectPeriode'],
        "order"=>"anim_date ASC,anim_prise_poste ASC,code_trajet ASC"
    );
    
    $event=$model->find($d,$db);
                    $content=  outils::devisTrain($event);
                    try{
                        $pdf= new HTML2PDF('P','A4','fr');
                        $pdf->pdf->SetDisplayMode('fullpage');
                        $pdf->writeHTML($content);
                        $pdf->Output('./webroot/devis/devisTrain.pdf','F'); 
                    } catch (HTML2PDF_exception $e) {
                        die($e);
                    }
                     $nom='devisTrain';
                     $fichier = './webroot/devis/devisTrain.pdf'; // le fichier en question 
                     header('Content-type: application/pdf');
                     header('Content-Disposition:inline; filename="'.$nom.'.pdf"');
                     readfile($fichier);
}

// *********    Création du Planning **********
if(isset($_POST['envoiePlanning'])){
    require('./bin/html2pdf/html2pdf.class.php');
    $model=  Model::load("TrainPlanningM");
    $d=array(
        "conditions"=>"train_periode_id=".$_POST['selectPeriode'],
        "order"=>"anim_date ASC, code_trajet ASC"
    );
    
    $event=$model->find($d,$db);
                    $content=  outils::planningTrain($event);
                    try{
                        $pdf= new HTML2PDF('L','A4','fr');
                        $pdf->pdf->SetDisplayMode('fullpage');
                        $pdf->writeHTML($content);
                        $pdf->Output('./webroot/devis/PlanningTrain.pdf','F'); 
                    } catch (HTML2PDF_exception $e) {
                        die($e);
                    }
                     $nom='planning';
                     $fichier = './webroot/devis/PlanningTrain.pdf'; // le fichier en question 
                     header('Content-type: application/pdf');
                     header('Content-Disposition:inline; filename="'.$nom.'.pdf"');
                     readfile($fichier);
}
//   ************************    Paye Train   ************************
if(isset($_POST['payeTrain'])){
  
    $year=date('Y');
    $mois=$_POST['payeMois'];
    
    $currentTime=strtotime('01-'.$mois.'-'.$year);
    $currentTime2=date('m', strtotime('+1 month', $currentTime ));
    $currentTime2=  strtotime('01-'.$currentTime2.'-'.$year);
    $currentTime2=$currentTime2-86400;
    $model=  Model::load('TrainPlanningM');
$d=array(
    "conditions"=>"anim_date BETWEEN '$currentTime' AND '$currentTime2' ",
    "order"=>"anim_id ASC"
    
);
$paye=$model->find($d,$db);
$titre='Nom;Prénom;Date animation;Statut;cachet;paye;Note frais;Ticket Resto;Somme à verser'."\n";
        $text='';
        $i=0;
        $tot=0;
        $totNuit=0;
        $totAll=0;
        $totTick=0;
        $totAllTick=0;
        $totAllNuit=0;
        $count=count($paye)-1;
        if(isset($paye)){
            foreach ($paye as $p){
               if($p->getAnim_id()>0){ 
                switch ($p->getStatut()) {
                    case 0:$payeAnim=110;
                        break;
                    case 1:$payeAnim=90;
                        break;
                    case 2:$payeAnim=140;
                        break;
                    default:$payeAnim=90;
                        break;
                }
                if($p->getNuit()==0){
                    $nuit=0;
                    $ticket="1*8€";
                    $tick=8;
                }else{
                    $nuit=55;
                    $ticket="2*8€";
                    $tick=16;
                }
                if($i<$count && $p->getAnim_id()!=$paye[$i+1]->getAnim_id()){
                    $tot+=$payeAnim;
                    $totAll+=$tot;
                    $totNuit+=$nuit;
                    $totAllNuit+=$totNuit;
                    $totTick+=$tick;
                    $totAllTick+=$totTick;
                    $payeTot=$tot+$totNuit+$totTick;
                    $saut="\n".';;;;TOTAL;'.$tot.'€;'.$totNuit.'€;'.$totTick.'€;'.$payeTot.'€'."\n\n";
                    $tot=0;
                    $totNuit=0;
                    $totTick=0;
                }elseif ($i>=$count) {
                    $tot+=$payeAnim;
                    $totAll+=$tot;
                    $totNuit+=$nuit;
                    $totAllNuit+=$totNuit;
                    $totTick+=$tick;
                    $totAllTick+=$totTick;
                    $payeTot=$tot+$totNuit+$totTick;
                    $tickAll=$totAllTick;
                    $nuitAll=$totAllNuit;
                    $saut="\n".';;;;TOTAL;'.$tot.'€;'.$totNuit.'€;'.$totTick.'€;'.$payeTot.'€'."\n\n".';;;;Total des anim;'.$totAll.'€;'.$nuitAll.'€;'.$tickAll.'€';
                    $tot=0;
                    $totNuit=0;
                    $totTick=0;
                }else{
                    $tot+=$payeAnim;
                    $totNuit+=$nuit;
                    $totTick+=$tick;
                    $saut="\n";
                }
                switch ($p->getStatut()){
                    case 0: $statut="Animateur";
                            $cachet="Non";
                        break;
                    case 1: $statut="Commédien";
                            $cachet="Oui 12H";
                        break;
                    case 2: $statut="Auto-entrepreneur";
                            $cachet="Non";
                        break;
                    default :$statut="Animateur";
                             $cachet="Non";
                }
                $text.=''.$p->getNom().';'.$p->getPrenom().';'.date('d-m-Y',$p->getAnim_date()).';'.$statut.';'.$cachet.';'.$payeAnim.'€;'.$nuit.'€;'.$ticket.';'.$saut;
               
            }
             $i++;
          }
        }
        $header="PayeTrain_".outils::convertMoisFull($mois)."_".$year;
        outils::ecxel($header,$titre,$text);
        header('location:admin-train.html');

}
?>

