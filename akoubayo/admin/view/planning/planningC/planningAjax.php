<?php
include_once '../../../../core/includeAjax.php';
if(isset($_POST['next'])){$next=$_POST['next'];}  else {$next=0;}
//$currentM= date ('m', strtotime('+1 month'));
$currentM= date ('m');
$currentM=date('m-Y', strtotime('+'.$next.'month'));
$currentTime=strtotime('01-'.$currentM);
$first=date('N',$currentTime);
$mois=date('F',  strtotime('01-'.$currentM));
$i=0;
$y=0;
if($first>1){$first=-($first-1);}else{$first=0;}

?>
    <table class="calendrier">
        <tr style="height: 30px;line-height: 30px;">
	   	<td class="titre_calendrier" colspan="2" style="text-align: left">
		   <a id="link_precedent" href="#">Precedent</a>
		</td>
                <td  colspan="3" style="text-align: center"><?php echo $mois;?></td>
                <td  colspan="2" style="text-align: right">
		   <a id="link_suivant" href="#">Suivant</a>
                </td>
        </tr>
      <tr style="height: 20px;line-height: 20px;">
        <td  class="cell_calendrier" >
        Lun
        </td>
        <td  class="cell_calendrier" >
        Mar.
    	</td>
   		<td  class="cell_calendrier">
		Mer.
		</td>
		<td  class="cell_calendrier">
		Jeu.
		</td>
		<td  class="cell_calendrier" >
 		Ven.
		</td>
		<td  class="cell_calendrier">
		Sam.
		</td>
		<td  class="cell_calendrier">
		Dim.
		</td>
      </tr>
      
      <?php
      $model=  Model::load("PlanningAnimM");
    
      
      while ($i<42){
            $date=date('d-m-Y', strtotime('+'.$first.'day', strtotime('01-'.$currentM.'-2015')));
            $strDate=  strtotime($date);
            $d=array(
                "table"=>"admin_planning,admin_planning_anim",
                "conditions"=>"users_id=$_SESSION[id] AND planning_id=id_planning AND date_planning=$strDate"
            );
             $dispoCss=$model->find($d,$db);
          if(isset($dispoCss)){
              foreach ($dispoCss as $disp){
                  $dis=$disp->getDispo();
                  if($dis==1){$css="tdDay1";}elseif ($dis==2) {$css="tdDay2";}else{$css="tdDay3";}
              }
          }else{
              $css="tdDay";
          }
        
          
          if($y==0){echo '<tr>';}
          echo '<td class="'.$css.'" rel="'.strtotime($date).'">';
          echo '<span class="spanTdDay">'.$date.'</span>';
          
          echo '</td>';
          if($y==6){echo '<tr/>';}
          if($y<6){$y++;}else{$y=0;}
          $i++;$first++;
      }
      ?>
	</table>