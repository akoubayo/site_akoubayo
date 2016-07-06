<?php
include_once '../../../../core/includeAjax.php';
    if(isset ($_POST['id'])){
        $date3=0;
        // ***********   On récupère la date de l'évènement   ************
       $model=  Model::load("TrainPlanningM");
       $d=array(
           "conditions"=>"id_train_planning=".$_POST['id'][0]
       );
       $anim=$model->find($d,$db);
       if(isset($anim)){
           $dateAnim=$anim[0]->getAnim_date();
           $hlpDep=$anim[0]->getHlp_dep_date();
           $idTrainPlanning=$anim[0]->getTrain_periode_id();
           $periode=  Model::load("TrainPeriodeM");
           $d=array(
               "conditions"=>"id_train_periode=".$idTrainPlanning
           );
           $period=$periode->find($d,$db);
           $debPeriode=$period[0]->getDate_deb_periode();
           $finPeriode=$period[0]->getDate_fin_periode();
           if($hlpDep==0){
           $date=$anim[0]->getAnim_date();
           $date2=$date-43200;
           }else{
           $date=$anim[0]->getHlp_dep_date();
           $date2=$date-43200;
           }
           $bool=$anim[0]->getanim_id();
           $totalDate=$dateAnim-$hlpDep;
           if($totalDate==86400){
               $veille=1;
               $date=$anim[0]->getAnim_date();
               $date2=$date-43200;
               $date3=$anim[0]->getHlp_dep_date();
               $date4=$date-43200;
           }else{
               $veille=0;
           }
           
           
           
           //****************   On récupère la latitude et la longitude de l'animation
          
       
       //***************    On recupère les animateurs disponible *************
       
       $model=  Model::load("UsersM");
       if($veille==0){
       $d=array(
           "table"=>"admin_users,admin_planning,admin_planning_anim",
           "fields"=>"id_users,prenom,id_planning_anim,bool_placement",
           "conditions"=>"admin_planning_anim.users_id=id_users AND planning_id=id_planning  AND (date_planning=$date) AND dispo=1", 
           );
        $findAnim=$model->find($d,$db);
       }else{
        $d=array(
           "table"=>"admin_users,admin_planning,admin_planning_anim",
           "fields"=>"id_users,prenom,id_planning_anim,bool_placement",
           "conditions"=>"admin_planning_anim.users_id=id_users AND planning_id=id_planning  AND  date_planning=$date3 AND dispo=1", 
           ); 
         $findAnim=$model->find($d,$db);
         $idUser="";
         if(isset($findAnim)){
             foreach($findAnim as $find){
                 $idUser.=$find->getId_users().',';
            }
            $idUser=substr($idUser,0,-1);
         $d=array(
            "table"=>"admin_users,admin_planning,admin_planning_anim",
            "fields"=>"id_users,prenom,id_planning_anim,bool_placement", 
             "conditions"=>"admin_planning_anim.users_id=id_users AND planning_id=id_planning  AND  users_id IN($idUser) AND date_planning=$date  AND dispo=1", 
         );
         $findAnim=$model->find($d,$db);
         }
         
       }
      

              
// ***********    On affiche les anim dispo  *************
              ?>
                <form action="admin-train.html" method="post">
                <table class="parent1">
                    <tr>
                        <th>Animateurs</th>
                        <th>Nb Placement période</th>
                        <th>Nb Dispo Periode </th>
                        <th>Participant à l'animation</th>
                    </tr>
                
              <?php
              if(isset($findAnim)){
                  $i=0;
                  foreach ($findAnim as $k){
                       if($veille==0){
                              if($k->getBool_placement()==1){$tr='style="background-color:red"';}else{$tr="";}
                      }else{
                          if($k->getBool_placement()==1){
                              $tr='style="background-color:red"'; 
                          }else{
                               $models=  Model::load("UsersM");
                          $d=array(
                            "table"=>"admin_users,admin_planning,admin_planning_anim",
                            "fields"=>"id_users,prenom,id_planning_anim,bool_placement",
                            "conditions"=>"admin_planning_anim.users_id=id_users AND admin_planning_anim.users_id=".$k->getId_users()." AND planning_id=id_planning  AND  date_planning=$date3 AND bool_placement=0", 
                            ); 
                          $findAnimss=$models->find($d,$db);
                            if(isset($findAnimss)){
                                $tr='';
                            }else{
                                $tr='style="background-color:red"';
                            }
                             
                          }
                      }
                              $prenom=$k->getId_users();
                              
//*************                Compte le nombre d'animation qu'il fait   *************
                              $compte=  Model::load("TrainPlanningM");
                              $d=array(
                                  "conditions"=>"anim_id=".$k->getId_users()." AND train_periode_id=".$idTrainPlanning
                              );
                              $count=$compte->count($d,$db);
//*************  On compte le nombre de dispo dans la periode  ************************
                              $dispoP=  Model::load("PlanningAnimM");
                              $d=array(
                                  "table"=>"admin_planning_anim,admin_planning",
                                  "conditions"=>"planning_id=id_planning AND users_id=".$k->getId_users()." AND date_planning BETWEEN ".$debPeriode." AND ".$finPeriode." AND dispo=1"
                              );
                              $dispoPlanning=$dispoP->count($d,$db);
                      ?>
                    <tr <?php echo $tr; ?> >
                        <td><?php echo $k->getPrenom();  ?></td>
                        <?php if($bool==$prenom){$checked="checked";$value=1;}else{$checked="";$value=2;} ?>
                        <td><?php echo $count ?></td>
                        <td><?php echo $dispoPlanning; ?></td>
                        <td><input type="checkbox" name="placement<?php echo $i ?>" value="1" <?php echo $checked; ?>/></td>
                        <input type="text" value="<?php echo $value ?>" name="update<?php echo $i; ?>" style="display: none"/>
                        <input type="text" value="<?php echo $k->getId_users() ?>" name="idUsers<?php echo $i; ?>" style="display: none"/>
                        <input type="text" value="<?php echo $k->getId_planning_anim() ?>" name="idPlanning<?php echo $i; ?>" style="display: none"/>
                        <input type="text" value="<?php echo $veille ?>" name="veille<?php echo $i; ?>" style="display: none"/>
                        
                    </tr>
                      
                      <?php
                      
                 $i++; }
              }
       }else{
           echo 't';
       }
?>
                </table>
                    <input type="text" value="<?php echo $date ?>" name="date" style="display: none"/>
                    <input type="text" value="<?php echo $date3 ?>" name="date1" style="display: none"/>
                    <input type="text" value="<?php echo $_POST['id'][0]; ?>" name="idEvent" style="display: none"/>
                    <input type="text" value="<?php echo $i; ?>" name="compte" style="display: none"/>
                    <input type="text" value="<?php echo $_POST['mois']; ?>" name="mois" style="display: none"/>
                    <input type="text" value="<?php echo $_POST['annee']; ?>" name="annee" style="display: none"/>
                    <input type="submit"/>
                </form>
<?php
                    
    }
    
/*$model=  Model::load("UsersM");
$d=array(
    "conditions"=>"visible=1",
);
$lat=$model->find($d,$db);
$i=0;    
if(isset($lat)){
    foreach ($lat as $l){
        $zip=$l->getZip();
        if(!empty($zip)){
            
        $adresse=$l->getAdresse()." ".$l->getZip()." ".$l->getVille().", france";
        $coords=  outils::getCoord($adresse);
        $e=$coords->results[0];
        $lat=$e->geometry->location->lat;
        $lon=$e->geometry->location->lng;
            $d=array(
                "id_users"=>$l->getId_users(),
                "latitude_anim"=>$lat,
                "longitude_anim"=>$lon
            );
        $save=$model->save($d,$db);   
    echo $l->getPrenom()." => lat :".$lat." et long :".$lon."test<br/>";
    $i++;
        if($i%5==0){
        usleep(1000000); 
    }    
    
        }
    }
}*/

    ?>

