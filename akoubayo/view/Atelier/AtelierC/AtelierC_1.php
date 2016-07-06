<?php

if (isset($_GET['l'])) {
    $maq = $_GET['l'];
} else {
    $maq = "Fiches-maquillage";
}

function allFiches($nomAtelier, $db) {
    $fiche = Model::load("FicheM");
    $d = array(
        "table" => "fiches,ateliers",
        "conditions" => "atelier_id=id_atelier AND nom_atelier=\"$nomAtelier\""
    );
    $fiche = $fiche->find($d, $db);

    return $fiche;
}

function allphoto($atelier, $db) {

    $photoFiches = Model::load("ImageM");
    $d = array(
        "table" => "ateliers,images",
        "conditions" => "ateliers_id=id_atelier AND index_fiche=1 AND nom_atelier=\"$atelier\""
    );
    $photoFiches = $photoFiches->find($d, $db);
    return $photoFiches;
}

function photoFiche($fiche, $db) {
    $photoFiche = Model::load("ImageM");
    $d = array(
        "table" => "images,fiches",
        "conditions" => "id_fiche=fiches_id AND fiches.titre=\"$fiche\" AND index_fiche=1"
    );
    $photoFiche = $photoFiche->find($d, $db);
    return $photoFiche;
}

$ficheMaquillage = allFiches($maq, $db);
if (empty($ficheMaquillage[0])) {
    header("Location:pro.html");
}
$phot = allphoto($maq, $db);
?>