<?php

function afficherFiche($atelier, $db) {
    $fiche = Model::load("FicheM");
    $d = array(
        "table" => "ateliers,fiches",
        "conditions" => "atelier_id=id_atelier AND nom_atelier=\"$atelier\""
    );
    $ff = $fiche->find($d, $db);
    $f = count($ff);
    $f = $f - 1;
    $rand = rand(0, $f);
    $fic = $ff[$rand];


    return $fic;
}

// Affichage des commentaires
$model = Model::load("LivredorM");
$d = array(
    "conditions" => "visibles=0",
    "order" => "dates DESC",
    "limit" => "0,10"
);
$avis = $model->find($d, $db);
?> 