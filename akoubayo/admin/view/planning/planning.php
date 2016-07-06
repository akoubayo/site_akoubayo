<?php 
//$currentM= date ('m', strtotime('+1 month'));
$currentM= date ('m');
$currentY= date ('Y');
$currentTime=strtotime('01-'.$currentM.'-'.$currentY);
$first=date('N',$currentTime);
$calcul=date('d-m-Y', strtotime('+1 day', $currentM ));
$mois=date('F');
$i=0;
$y=0;


if($first>1){$first=-($first-1);}else{$first=0;}

?>
<div style="width: 100%;margin-top: 0px;padding-top: 0px;">
    <span style="color:red"><strong>Clique sur la date pour indiquer tes dispos !</strong></span><br/><br/>
    <span style="width: 5%;background-color: green;height: 30px;display: inline-block"></span>
    <span style="width: 15%;height: 30px;display: inline-block"> Dispo</span>
    <span style="width: 5%;background-color: #ff9900;height: 30px;display: inline-block"></span>
    <span style="width: 15%;height: 30px;display: inline-block"> Ne sais pas</span>
    <span style="width: 5%;background-color: #000;height: 30px;display: inline-block"></span>
    <span style="width: 15%;height: 30px;display: inline-block"> Pas dispo</span>
</div>

<div id="calendrier"  class="conteneur" style="width:100%;background-color:#c6c3de;">
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
            $date=date('d-m-Y', strtotime('+'.$first.'day', strtotime('01-'.$currentM.'-'.$currentY)));
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
    
    
</div>
<script>
    $(document).ready(function(){
        $('body').on('click','td[class*=tdDay]',function(){
                var span = $(this);
                var attrSp=$(this).attr('class');
                var donnee ={
                     dateTime : $(this).attr('rel'),
                };
                $.ajax({
                type    : 'POST',
                url     : './admin/view/planning/planningC/ajax.php',
                async	: false,	
                data    : donnee,
                dataType: "json",  
                timeout: 1000,
                success: function(data) {
                        if(data.retour){
                            var dispo=data.retour;
                            if(dispo==1){
                                span.removeClass(attrSp);
                                span.attr("class","tdDay1");
                            }else if(dispo==2){
                                span.removeClass(attrSp);
                                span.attr("class","tdDay2");
                            }else{
                                span.removeClass(attrSp);
                                span.attr("class","tdDay3");
                            }
                        }else{
                            
                        }
                },
                error: function(request, error) { // Info Debuggage si erreur         
                       alert("Erreur : responseText: "+request.responseText);
                },
                });  
        });
        $('body').on('mouseenter','td[class*=tdDay]',function(){
             var attrClass = $(this).attr("class");
             $(this).children('span:first').css('background-color','#9999ff');
             $(this).on('mouseleave',function(){
                 $(this).children('span:first').css('background-color','#ccccff');
                 
             });
        });
        
        
    var next=0;  
    $('body').on('click','#link_precedent',function(){
            
            next=next-1;
            var donnee ={
                next :next
            };
            $('.conteneur').load("./admin/view/planning/planningC/planningAjax.php",donnee); 
    });
    
    $('body').on('click','#link_suivant',function(){
            
            next=next+1;
            var donnee ={
                next :next
            };
            $('.conteneur').load("./admin/view/planning/planningC/planningAjax.php",donnee); 
        });
        
        
    });
   
           

</script>