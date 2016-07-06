<?php

if (isset($parent)) {
    $j = 0;
    $i = 1;
    $y = 0;
    $z = 0;
    $text ="";
    $saut="\n";
    foreach ($parent as $p) {
        if ($p->getParent_id() != 0) {
            $name = parent($p->getParent_id(), $db);
            if(isset($name)){
               echo $j.' :'.$p->getParent_id().' => '.$name[0]->getCivilite().' '.$name[0]->getNom_parent().' '.$name[0]->getZip_parent().' => '.date('d/m/Y',$p->getDate_calendar()).' NB =>'.$y.'<br/>';
               $text .=''.$name[0]->getCivilite().' '.$name[0]->getNom_parent().';'.$name[0]->getZip_parent().';'.date('d/m/Y',$p->getDate_calendar()).';'.$y.';'.$p->get_tarif_tot().';'.$p->get_bool_annule().$saut;
            if (isset($parent[$i]) && $parent[$i]->getParent_id() == $parent[$i - 1]->getParent_id()) {
                $y++; $z++;
            }
            else
                $y = 0;
            
            }
            $j++;
        }
        $i++;
    }
    
    $j = $j;
    $i = 1;
    $y = 0;
    $z = $z;
    foreach ($parent as $p) {   
     $name = parent($p->getNew_parent_id(), $db);
            if(isset($name)){
               echo $j.' :'.$p->getParent_id().' => '.$name[0]->getCivilite().' '.$name[0]->getNom_parent().' '.$name[0]->getZip_parent().' => '.date('d/m/Y',$p->getDate_calendar()).' NB =>'.$y.'<br/>';  
            if ($parent[$i]->getNew_parent_id() == $parent[$i - 1]->getNew_parent_id()) {
                $y++; $z++;
            }
            else
                $y = 0;
            
            }
            $i++;
   
}
 echo $z;
 $titre='Nom;CodeP;Date animation;Nb de réccurence;Prix Anim;Black'."\n";
 $header="recurrence";
 outils::ecxel($header,$titre,$text);
 
}
?>
