<?php

function countAll($db) {
    $livre = Model::load("LivredorM");
    $d = array(
        "conditions" => "visibles=0",
    );
    $countAll = $livre->count($d, $db);
    return $countAll;
}

function allMessages($limitmin, $limitmax, $db) {
    $messages = Model::load("LivredorM");
    $d = array(
        "conditions" => "visibles=0",
        "limit" => "$limitmin,$limitmax",
        "order" => "dates DESC"
    );
    $messages = $messages->find($d, $db);
    return $messages;
}

function insertMessage($message, $db) {
    $saveMessage = Model::load("LivredorM");
    $date = time();
    $d = array(
        "pseudos" => $message["pseudos"],
        "villes" => $message["villes"],
        "zips" => $message["zips"],
        "messages" => $message["messages"],
        "visibles" => $message["visibles"],
        "dates" => $date
    );
    $save = $saveMessage->save($d, $db);
}

if (isset($_POST['pseudos'])) {
    $_SESSION['pseudos'] = $_POST['pseudos'];
} else {
    $_SESSION['pseudos'] = "";
};
if (isset($_POST['villes'])) {
    $_SESSION['villes'] = $_POST['villes'];
} else {
    $_SESSION['villes'] = "";
};
if (isset($_POST['zips'])) {
    $_SESSION['zips'] = $_POST['zips'];
} else {
    $_SESSION['zips'] = "";
};
if (isset($_POST['messages'])) {
    $_SESSION['messages'] = $_POST['messages'];
} else {
    $_SESSION['messages'] = "";
};
if (isset($_POST['test'])) {
    if ($_POST['test'] == $_SESSION['resultat']) {
        $_POST['visibles'] = 0;
    } else {
        $_POST['visibles'] = 1;
    }
}
$nb1 = rand(0, 9);
$nb2 = rand(0, 9);
$resultat = $nb1 + $nb2;
$a = (int) $resultat;
$_SESSION['resultat'] = $resultat;

if (isset($_POST['pseudos']) && isset($_POST['messages']) && !empty($_POST['pseudos']) && !empty($_POST['messages'])) {

    $message = outils::postVerif($_POST);

    $m = insertMessage($message, $db);
}
?>
