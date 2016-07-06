<div style="width: 80%;float: left;">
    <?php
    if (isset($num)) {
        foreach ($num as $n) {

            echo '<h2>Etape numéros ' . $n->getNumeros_etapes() . '</h2>';

            $p = photoEtapes($a, $n->getNumeros_etapes(), $db);
            if (isset($p)) {
                foreach ($p as $pp) {
                    echo '<img src="webroot/image/' . $pp->getEmplacements() . '" title="' . $pp->getTitres() . '" alt="' . $pp->getAlt() . '" class="imgPetites"/>';
                }


                echo '<div  class="clearBoth" ><br/><p>' . $n->getTexte() . '</p></div><hr/>';
            }
        }
    }
    ?>
</div>

<div style="clear: both;width: 80%;height: 150px;margin-left: auto;margin-right: auto"></div>