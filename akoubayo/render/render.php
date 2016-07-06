<?php
$image = Model::load('ImageM');
$d = array("conditions" => "animations_id>0");
$count = $image->count($d, $db);
$d = array(
    "conditions" => "animations_id>0",
    "limit" => "0,5"
);
$image = $image->find($d, $db);
if (!isset($title)) {
    $title = 'Organisation animation pour enfant à domicile';
    $desc = 'Nous organisons l\'anniversaire de votre enfant à votre domicile sur Paris, Ile de France et Lyon';
    $h1 = 'Animations pour enfant, anniversaire à domicile, arbre de noël...';
}
if (isset($_GET['p'])) {
    switch ($_GET['p']) {
        case "Anniversaire":
            $model = "MenuM";
            $cond = "nom=\"les animations\"";
            break;
        case "Animations": $model = "AnimationM";
            $sea = "-";
            $rep = " ";
            $getL = str_replace($sea, $rep, $_GET['l']);
            $cond = "noms=\"$getL\"";
            break;

        case "pro": if (!isset($_GET['l'])) {
                $model = "MenuM";
                $cond = "nom=\"professionnel\"";
            } elseif (substr($_GET['l'], 0, 4) == "anim") {
                $model = "AnimationM";
                $sea = "-";
                $rep = " ";
                $getL = str_replace($sea, $rep, $_GET['l']);
                $getL = substr($getL, 5);
                $cond = "noms=\"$getL \"";
            } else {
                $model = "AnimationM";
                $sea = array("-", "_");
                $rep = " ";
                $getL = str_replace($sea, $rep, $_GET['l']);
                $cond = "liens=\"$getL\"";
            }
            break;
        case "Livreor":
            $model = "MenuM";
            $cond = "lien_pages=\"Livreor\"";
            break;
        case "Atelier": $model = "AtelierM";
            if (isset($_GET["l"])) {
                $get = $_GET['l'];
            } else {
                $get = "Fiches-maquillage";
            }
            $cond = "nom_atelier=\"$get\"";
            break;

        case "Etapes": $model = "FicheM";
            $sea = "-";
            $rep = " ";
            $getL = str_replace($sea, $rep, $_GET['l']);
            $cond = "titre=\"$getL\"";
            break;
        case "article": $model = "SousMenuM";
            $cond = "lien_sous=\"article\"";
            break;
        case "contact": $model = "MenuM";
            $cond = "nom=\"contact\"";
            break;
        default: $model = 0;
            break;
    }

    $ref = outils::referencement($cond, $model, $db);

    $h1 = $ref[0]->getH1();
    $desc = $ref[0]->getDescriptions();
    $title = $ref[0]->getTitres();
}

$css = rand(1, 2);
if ($css == 1) {
    $color = 'FFC3F5';
} else {
    $color = 'F2DEE7';
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../../favicon.ico">

        <link href="./bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link href="./bootstrap/dist/css/css1.css" rel="stylesheet">
        <link href="./bootstrap/docs/examples/starter-template/starter-template.css" rel="stylesheet">
        <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> -->
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $desc; ?>" />
        <META NAME="keywords" CONTENT="anniversaire enfant, anniversaire, fete, fête, animation enfant, gouter anniversaire, domicile, animation à domicile, magie, enfantine, animation, fête, enfant, anniversaire, à domicile, magicien, paris, bebe, marionnette, acrobate, noël, arbre, école, entreprise, ce, animation enfant, kermesse, fete, magic, arbre de noel, boum, surprise, cadeau, animations, mariage, fete, boom  ">
<META NAME="dc.keywords" CONTENT="animation, fête, enfant,magie, clown, anniversaire, à domicile, arbre de noel, noël, arbre, magicien, marionnette, entreprise, ce,  kermesse, fete, magic, boum, surprise, cadeau, batman, animations, mariage, fete, boom ">
<META NAME="subject" CONTENT="anniversaire et animation à domicile pour enfant">
<META NAME="author" CONTENT="Altman Damien">
<META NAME="copyright" CONTENT="Akoubayo ©">
<META NAME="revisit-after" CONTENT="10 days">
<META NAME="identifier-url" CONTENT="http://www.akoubayo.fr">
<META NAME="reply-to" CONTENT="akoubayofamily@gmail.com">
<META NAME="date-creation-ddmmyyyy" CONTENT="01012011">
<META NAME="Robots" CONTENT="all">
<META NAME="Rating" CONTENT="General">
<META NAME="Page-topic" CONTENT="Document">
<META NAME="organization" CONTENT="Akoubayo">
<META NAME="contact" CONTENT="akoubayofamily@gmail.com">
<meta name="Classification" content="animation,fete enfant,spectacle enfant,surprise enfant,animation enfant,spectacle enfant mariage,animation gouter anniversaire,gouter anniversaire,animation bapteme enfant,animation goûter anniversaire,organisateurs spectacles enfant,comite entreprise arbre noel,spectacle theatre enfant maison,pere noel comite entreprise,spectacle enfant comite entreprise,animation enfant mariage,spectacle enfant reception,spectacle enfant cadeau,spectacle enfant noel maison,spectacle enfant domicile,spectacle enfant appartement,goûter anniversaire,maquillage enfant,animation pere noel,surprise fete enfant,spectacle groupe enfant maison,animation anniversaire,animation mariage,spectacle anniversaire,spectacle enfant maison,arbre noel,spectacle mariage">
<META NAME=CATEGORY CONTENT="animation,fete enfant,anniversaire,spectacle enfant,animation enfant,mariage,animation gouter anniversaire,gouter anniversaire,animation bapteme,organisateurs spectacles enfant,comite entreprise arbre noel,spectacle theatre enfant,pere noel comite entreprise,spectacle enfant comite entreprise,animation mariage,spectacle enfant noel,spectacle enfant domicile,animation pere noel,theatre appartement,animation anniversaire,animation mariage,spectacle anniversaire,arbre noel,spectacle mariage">
<META http-equiv="Content-Language" CONTENT="fr">
<META NAME="expires" CONTENT="never">
<META NAME="Distribution" CONTENT="Global">
<META NAME="Audience" CONTENT="General">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<META NAME="date-revision-ddmmyyyy" CONTENT="10112015">


            <meta name="msvalidate.01" content="79238621CE3D0D9A912EE2BCA5F4F19D" />
        <meta name="google-site-verification" content="JzEA1pi0TIdjbu1I14-MXg48H2n9zb7Iel-g2RzbVJw" />
      <meta name="msvalidate.01" content="C65BBF14F08F313C63113A32B4B70526" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/dist/js/jquery.min.js"></script>
        <script src="bootstrap/dist/js/bootstrap.min.js"></script>
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-7772763-1', 'auto');
  ga('send', 'pageview');

</script>
    </head>
    <body>

        <div class="navbar navbar-default navbar-fixed-top" style="background-color: #F2DEE7">

            <div class="container2">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
<?php
$menu = Model::load("MenuM");
$d = array
    (
    "order" => "position ASC"
);
$menu = $menu->find($d, $db);
if (isset($menu)) {
    foreach ($menu as $m) {
        if ($m->getSs_menu() == 0) {
            ?>
                                    <li>
                                        <a href="<?php echo $m->getLien_pages() . '.html' ?>"><?php echo ucfirst($m->getNom()); ?></a>
                                    </li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="dropdown"> 
                                        <a data-toggle="dropdown" href="#"><?php echo ucfirst($m->getNom()); ?><b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                    <?php
                                    $nb = $m->getNb_sous_menu();
                                    for ($i = 0; $i < $nb; $i++) {
                                        ?>
                                                <li><a href="<?php echo $m->getLien_pages() . '-' . $m->getLien_sous($i); ?>.html"><?php echo ucfirst($m->getNom_sous($i)) ?></a></li>
                <?php
            }
            ?>
                                        </ul>
                                    </li>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
                        <?php
                        if (!isset($_GET['p'])) {
                            require_once './view/accueil/accueil.php';
                        } elseif (isset($_GET['p']) && file_exists('./view/' . $_GET['p'] . '/' . $_GET['p'] . '.php')) {
                            require_once './view/' . $_GET['p'] . '/' . $_GET['p'] . '.php';
                        } else {
                            require_once './view/accueil/accueil.php';
                        }
                        ?>      
    </body>
</html>

