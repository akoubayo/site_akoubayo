<?php
$l = $_GET['l'];
$_SESSION['mail'] = 0;
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

$option = Model::load("OptionsM");
$d = array(
    "table" => "options,animationsoptions,animations",
    "conditions" => "id_animations=animation_id AND options_id=id_options AND noms=\"$z\"",
    "order" => "position"
);
$opt = $option->find($d, $db);


$d = array(
   "conditions" => "liens=\"anniversaire_enfant\""
);
$nomAnims = $animation->find($d, $db);

if(isset($_POST['nom'])){
    
    $v = outils::postVerif($_POST);
    $message_html ='
        <div style="width: 100%;">
            <p>
                Animation : '.$v['nomAnim'].'
            </p>
            <p>
                Nom : '.$v['nom'].'
            </p>
            <p>
                Téléphone : '.$v['tel'].'
            </p>
            <p>
                Date event : '.$v['date'].'
            </p>
            <p>
                Horraire : '.$v['heure'].'
            </p>
            <p>
                Prénom enfant : '.$v['prenom'].'
            </p>
            <p>
                Date naissance : '.$v['dateN'].'
            </p>
            <p>
                Adresse : '.$v['adresse'].'
            </p>
            <p>
                Ville : '.$v['ville'].'
            </p>
            <p>
                Code P : '.$v['codeP'].'
            </p>
        </div>
            ' ;
    $sujet='Demande de'.$v['nom'].' pour le '.$v['date'];
    $message_txt='';
    outils::envoieMail('akoubayofamily@gmail.com', $sujet, $message_txt, $message_html);
    outils::envoieMail('info.alpha-baby@orange.fr', $sujet, $message_txt, $message_html);
    header('Location:./'.$_GET['p'].'-'.$_GET['l'].'_1.html');
}
?>