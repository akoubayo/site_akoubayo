<?php
include_once '../../../../core/includeAjax.php';
    if(isset ($_POST['id'])){
        $modelEvent=  Model::load("ClientEventM");
        $d=array("conditions"=>"id_event=".$_POST['id'][0]);
        $event=$modelEvent->find($d,$db);
        if(isset($event)){
            
            foreach ($event as $e){
    
?>

<form action="admin-gestion.html" method="post" class="form1">
    <span class="spanForm1">
        Animation : 
    </span>
    <input type="text" value="<?php echo $e->getId_event() ?>" name="id_event" style="display: none"/>
    <select name="animation_id">
        <?php
            $modelAnim=  Model::load("AdminAnimationM");
            $d=array("conditions"=>"visible_animation=1");
            $anim=$modelAnim->find($d,$db);
            foreach ($anim as $a){
                if($a->getId_animation()==$e->getAnimation_id()){
                    echo '<option value="'.$a->getId_animation().'" selected>'.$a->getNom_animation().'</option>';
                }else{
                    echo '<option value="'.$a->getId_animation().'">'.$a->getNom_animation().'</option>';
                }
            }
        ?>
    </select><br/><br/>
    <span class="spanForm1">Demi Heure :</span>
    <select name="nb_demi_heure">
        <?php
            $i=0;
            $y=0;
            $z=0;
            while ($y<6){
                    $echo=  floor($y).' H '.$i.'0' ;
                    if($i==0){$i=3;}else{$i=0;}
                    if($z==$e->getNb_demi_heure()){
                        echo '<option value="'.$z.'" selected>'.$echo.'</option>';
                    }else{
                        echo '<option value="'.$z.'">'.$echo.'</option>';
                    }
            $y=$y+0.5;$z++;}
        ?>
    </select><br/><br/>
    <span class="spanForm1">
        Date : 
    </span>
    <input type="text" name="date" value="<?php echo date('d-m-Y',$e->getDate_heure()); ?>"/><br/><br/>
    <span class="spanForm1">
        Heure : 
    </span>
    <input type="text" name="date_heure" value="<?php echo date('H:i',$e->getDate_heure()); ?>"/><br/><br/>
    <span class="spanForm1">
        Nb enfants : 
    </span>
    <input type="text" name="nb_enfant" value="<?php echo $e->getNb_enfant(); ?>"/><br/><br/>
    <span class="spanForm1">
        Frais transport : 
    </span>
    <input type="text" name="frais_transport" value="<?php echo $e->getFrais_transport(); ?>"/><br/><br/>
    <span class="spanForm1">
       Commentaire : 
    </span>
    <textarea name="comment_event"><?php echo $e->getComment_event(); ?></textarea><br/><br/>    
    <input name="modif_event" type="text" value="modif" style="display: none"/>
    <input type="submit" class="submit"/>
</form>

<?php
            }
        }
    }
?>
