<?php

if (!isset($_GET['l'])) {
    $animation = Model::load("AnimationM");
    $d = array(
        "conditions" => "liens!=\"anniversaire_enfant\""
    );
    $anim = $animation->find($d, $db);
} elseif (isset($_GET['l']) && substr($_GET['l'], 0, 4) != "anim") {
    $animation = Model::load("AnimationM");
    switch (substr($_GET['l'], 0, 3)) {
        case "arb":$nom = "arbre de noel";
            break;
        case "res":$nom = "restaurant";
            break;
        case "cen":$nom = "centre commercial";
            break;
        default :$nom = "arbre de noel";
            break;
    }
    $d = array(
        "conditions" => "liens=\"$nom\""
    );
    $anim = $animation->find($d, $db);
}


if (isset($_GET['l']) && substr($_GET['l'], 0, 4) == "anim") {
    $l = substr($_GET['l'], 5);

    $search = array('-', 'é');
    $replace = array(' ', 'a');

    $z = str_replace($search, $replace, $l);

    $animation = Model::load("AnimationM");
    $d = array(
        "conditions" => "noms=\"$z\""
    );
    $anim = $animation->find($d, $db);

    if (empty($anim[0])) {
        header("Location:erreur.html");
    }
}
?>

