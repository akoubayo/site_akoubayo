<?php

$animation = Model::load("AnimationM");
$d = array(
    "conditions" => "liens=\"anniversaire_enfant\""
);
$anim = $animation->find($d, $db);
?>