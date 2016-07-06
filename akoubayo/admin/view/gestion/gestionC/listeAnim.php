<?php
include_once '../../../../core/includeAjax.php';
    if(isset ($_POST['id'])){
        // ***********   On récupère la date de l'évènement   ************
       $model=  Model::load("ClientEventM");
       $d=array(
           "conditions"=>"id_event=".$_POST['id'][0]
       );
       $anim=$model->find($d,$db);
       if(isset($anim)){
           $date=$anim[0]->getDate_calendar();
           $date2=$date-43200;
           
           //****************   On récupère la latitude et la longitude de l'animation
           $model=  Model::load("ClientParentM");
           $d=array(
               "table"=>"client_enfant,client_parent",
               "conditions"=>"id_enfant=".$anim[0]->getParent_id()." AND parent_id = id_parent"
           );
           $parent=$model->find($d,$db);
           if(!isset($parent)){
               $d=array(
               "table"=>"client_enfant,client_parent",
               "conditions"=>"id_parent=".$anim[0]->getNew_parent_id()." AND parent_id = id_parent"
                );
               $parent=$model->find($d,$db);
           }
           
           if($parent[0]->getLatitude_parent()==0){
               $adresse=$parent[0]->getAdresse_parent()." ".$parent[0]->getZip_parent()." ".$parent[0]->getVille_parent().", france";
               $coords=  outils::getCoord($adresse);
               $e=$coords->results[0];
               $lat=$e->geometry->location->lat;
               $lon=$e->geometry->location->lng;
               $d=array(
                   "id_parent"=>$parent[0]->getId_parent(),
                   "latitude_parent"=>$lat,
                   "longitude_parent"=>$lon
               );
               $save=$model->save($d,$db);
              
           }
       }else{
           //header('location:admin-gestion.html');
       }
       
       //***************    On recupère les animateurs disponible *************
       
       $model=  Model::load("UsersM");
       $d=array(
           "table"=>"admin_users,admin_planning,admin_planning_anim",
           "fields"=>"prenom,id_planning_anim",
           "conditions"=>"admin_planning_anim.users_id=id_users AND planning_id=id_planning  AND (date_planning=$date OR date_planning=$date2) AND (dispo=1 OR dispo=2)", 
           );
       $findAnim=$model->find($d,$db);
       //****************   On calcule la distance entre chaque animateur et le lieu de l'event   ***********************
       if(isset($findAnim)){
           $prenom="";
           foreach ($findAnim as $an){
               $prenom.="'".$an->getPrenom()."',";
           }
           $prenom=  substr($prenom,0,-1);
              $d=array(
                 "table"=>"admin_users,admin_planning_anim,admin_planning",
                 "fields"=>"*,get_distance_metres(".$parent[0]->getLatitude_parent().",".$parent[0]->getLongitude_parent().",latitude_anim,longitude_anim) AS distance",
                 "conditions"=>"prenom IN($prenom) AND admin_planning_anim.users_id=id_users AND (date_planning=$date OR date_planning=$date2) AND id_planning=planning_id"
              );
              
// ***********    On affiche les anim dispo  *************
              $km=$model->find($d,$db);
              ?>
                <form action="admin-gestion.html" method="post">
                <table class="parent1">
                    <tr>
                        <th>Animateurs</th>
                        <th>Nb kilomètre</th>
                        <th>Participant à l'animation</th>
                    </tr>
                
              <?php
              if(isset($km)){
                  $i=0;
                  foreach ($km as $k){
                      $model=  Model::load("ClientAnimateurM");
                      $d=array(
                          "conditions"=>"users_id=".$k->getId_users()." AND event_id=".$_POST['id'][0]." AND bool_client_anim=0"
                      );
                              $bool=$model->find($d,$db);
                              if($k->getBool_placement()==1){$tr='style="background-color:red"';}else{$tr="";}
                      ?>
                    <tr <?php echo $tr; ?> >
                        <td><?php echo $k->getPrenom();  ?></td>
                        <td><?php echo round(($k->getDistance()/1000)); ?> Km</td>
                        <?php if(isset($bool)){$checked="checked";$value=1;}else{$checked="";$value=2;} ?>
                        <td><input type="checkbox" name="placement<?php echo $i ?>" value="1" <?php echo $checked; ?>/></td>
                    <input type="text" value="<?php echo $value ?>" name="update<?php echo $i; ?>" style="display: none"/>
                        <input type="text" value="<?php echo $k->getId_users() ?>" name="idUsers<?php echo $i; ?>" style="display: none"/>
                        <input type="text" value="<?php echo $k->getId_planning_anim() ?>" name="idPlanning<?php echo $i; ?>" style="display: none"/>
                    </tr>
                      
                      <?php
                      
                 $i++; }
              }
       }else{
           echo 't';
       }
?>
                </table>
                    <input type="text" value="<?php echo $_POST['id'][0]; ?>" name="idEvent" style="display: none"/>
                    <input type="text" value="<?php echo $i; ?>" name="compte" style="display: none"/>
                    <input type="text" value="<?php echo $_POST['mois']; ?>" name="mois" style="display: none"/>
                    <input type="text" value="<?php echo $_POST['annee']; ?>" name="annee" style="display: none"/>
                    <input type="submit">
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

