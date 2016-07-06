<?php
function parent($id,$db){
    $model = Model::load("ClientEnfantM");
    $d = array(
        "fields" => "parent_id",
        "conditions" => "id_enfant = $id"
    );
    $name = $model->find($d,$db);
    if(isset($name)){
        $model = Model::load("ClientParentM");
        $d = array(
            "conditions" => "id_parent = ".$name[0]->getParent_id(),
        );
        $name = $model->find($d,$db);
    }
    return $name;
}
function parent1($id,$db){
    $model = Model::load("ClientParentM");
    $d = array(
        "conditions" => "id_parent = $id"
    );
    $name = $model->find($d,$db);
    return $name;
}

$model = Model::load("TotalEventM");
$d = array(
  
  "conditions" => "id_parent=client_enfant.parent_id AND id_enfant=client_event.parent_id AND id_animation=animation_id AND client_event.new_parent_id=0 ",  
  "order"=>"client_event.parent_id ASC"  
);
$parent = $model->find($d,$db);

if (isset($parent)) {
    $j = 0;
    $i = 1;
    $y = 0;
    $z = 0;
    $recu = 0;
    $text ="";
    $saut="\n";
    foreach ($parent as $p) {
        if ($p->getParent_id() != 0) {
            $name = parent($p->getParent_id(), $db);
            if(isset($name)){
                if($y == 1)
                    $recu = 1;
                else
                    $recu = 0;
                if($p->getEtat()==0){
                    
                    $sommeB = $p->getTarif_tot();
                    $somme = 0;
                    $annule = 1;
                }
                else{
                    $sommeB = 0;
                    $somme = $p->getTarif_tot();
                    $annule = 0;
                }
               $text .=''.$name[0]->getCivilite().' '.$name[0]->getNom_parent().';'.$name[0]->getZip_parent().';'.date('d/m/Y',$p->getDate_calendar()).';'.$y.';'.$recu.';'.$somme.';'.$annule.';'.$sommeB.$saut;
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
                $text .=''.$name[0]->getCivilite().' '.$name[0]->getNom_parent().';'.$name[0]->getZip_parent().';'.date('d/m/Y',$p->getDate_calendar()).';'.$y.$saut;
            if ($parent[$i]->getNew_parent_id() == $parent[$i - 1]->getNew_parent_id()) {
                $y++; $z++;
            }
            else
                $y = 0;
            
            }
            $i++;
   
}
$text .= 'Nombre d\'animation total =>'.$i.';Nombre de récurrence =>'.$z;
 $titre='Nom;CodeP;Date animation;réccurence anim;recurence client;Prix Anim;Black;'."\n";
 $header="recurrence";
 outils::ecxel($header,$titre,$text);
 
}