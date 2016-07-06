<div style="width: 80%;float: left;">
    <?php
    if (isset($_GET["l"])) {
        $title = $_GET['l'];
    } else {
        $title = "Fiches-maquillages";
    }
    echo '<div><h2 id="haut">Les fiches ' . $title . '</h2>';
    $i = 0;
    foreach ($phot as $pp) {

        if ($i % 6 == 0 && $i != 0) {
            echo '<a href="#maquillage-enfant-' . $pp->getNoms() . '">
                          <img src="webroot/image/' . $pp->getEmplacements() . '" class="imgPetites2" alt="' . $pp->getAlt() . '" title="' . $pp->getTitres() . '"/>
                          </a>';
        } else {
            echo '<a href="#maquillage-enfant-' . $pp->getNoms() . '">
                          <img src="webroot/image/' . $pp->getEmplacements() . '" class="imgPetites" alt="' . $pp->getAlt() . '" title="' . $pp->getTitres() . '"/>
                          </a>';
        }
        $i++;
    }
    echo '</div><div class="both"><br/><br/>';
    if (isset($ficheMaquillage)) {
        foreach ($ficheMaquillage as $maquillage) {
            echo '<hr style="clear:both"/><h2 class="both" >' . $maquillage->getTitre() . '</h2>';

            $fiches = $maquillage->getTitre();
            $photos = photoFiche($fiches, $db);
            if (isset($photos)) {
                foreach ($photos as $po) {
                    echo '<div class="imgFiches"><img style="width:80%" src="webroot/image/' . $po->getEmplacements() . '" id="maquillage-enfant-' . $po->getNoms() . '"  alt="' . $po->getAlt() . '" title="' . $po->getTitres() . '" /><br/><br/><a href="#haut"> Haut de la page</a><br/><br/></div>';
                }
            }
            echo '<div class="pmarginright"><p>' . strip_tags($maquillage->getContenu()) . '<br/>';
            $a = $maquillage->getTitre();
            $b = str_replace(' ', '-', $a);
            echo '<a href="Etapes-' . $b . '.html ">Ciquez ici pour apprendre ' . $maquillage->getTitre() . ' </a> </p></div>';
        }
    }
    echo '</div>';
    ?>
</div>
<div style="clear: both;width: 80%;height: 150px;margin-left: auto;margin-right: auto"></div>