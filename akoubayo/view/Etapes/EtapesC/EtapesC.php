<?php

function numEtapes($titre, $db) {
    $numEtapes = Model::load("EtapesM");
    $d = array(
        "table" => "etapes,fiches",
        "conditions" => "fiches_id=id_fiche AND fiches.titre=\"$titre\"",
        "order" => "etapes.numeros_etapes"
    );
    $numEtapes = $numEtapes->find($d, $db);

    return $numEtapes;
}

function photoEtapes($fiche, $num, $db) {
    $photoEtape = Model::load("ImageM");
    $d = array(
        "table" => "etapes,images,fiches",
        "conditions" => "images.etapes_id=id_etapes AND etapes.fiches_id=id_fiche AND fiches.titre=\"$fiche\" AND numeros_etapes=$num"
    );
    $photoEtape = $photoEtape->find($d, $db);

    return $photoEtape;
}

function nomAtelier($id,$db){
    $model = Model::load("AtelierM");
    $d = array(
        "table" => "ateliers,etapes,fiches",
        "conditions" => "id_atelier = atelier_id AND etapes.fiches_id=id_fiche AND fiches_id = ".$id 
    );
    $nomAt = $model->find($d,$db);
    return $nomAt[0]->getNom_atelier();
}

$l = $_GET['l'];
$a = str_replace('-', ' ', $l);

$num = numEtapes($a, $db);

if (empty($num[0])) {
    header("Location:erreur.html");
}
?>