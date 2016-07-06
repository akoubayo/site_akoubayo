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

$l = $_GET['l'];
$a = str_replace('-', ' ', $l);

$num = numEtapes($a, $db);

if (empty($num[0])) {
    header("Location:erreur.html");
}
?>