<div style="width: 90%">
    <?php
    if (isset($article)) {
        foreach ($article as $art) {
            echo '<h2>' . $art->getTitre() . '</h2>';

            echo '<div style="">' . $art->getTexte() . '</div>';

            echo '<hr/>';
        }
    }
    ?>

</div>