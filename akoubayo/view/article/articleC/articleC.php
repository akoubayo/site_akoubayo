<?php

$model = Model::load("ArticleM");
$d = array(
    "conditions" => "visible=1",
    "order" => "datetime DESC"
);
$article = $model->find($d, $db);

