
<h2>Les animations anniversaire enfant</h2>
<div style="width: 80%;float: left;">
    <form method="post" action="Livreor.html">

        <div class="divlivreDor">Pseudo: &nbsp;&nbsp;</div> <div><input type="text" name="pseudos" value="<?php
            if (isset($_SESSION['pseudos'])) {
                echo $_SESSION['pseudos'];
            }
            ?>"/></div> <br/>
        <div class="divlivreDor">Ville: &nbsp;&nbsp;</div> <div><input type="text" name="villes" value="<?php if (isset($_SESSION['villes'])) echo $_SESSION['villes']; ?>"/></div><br/>
        <div class="divlivreDor">Code postal: &nbsp;&nbsp;</div> <div><input type="text" name="zips" value="<?php if (isset($_SESSION['zips'])) echo $_SESSION['zips']; ?>"/></div><br/>
        <div class="divlivreDorCenter">Votre message: &nbsp;&nbsp;</div> <textarea name="messages" rows="5" class="divlivreDorTextArea"  ><?php if (isset($_SESSION['messages'])) echo $_SESSION['messages']; ?> </textarea><br/><br/>


        <?php
        $images = imagecreate(200, 50);
        $blanc = imagecolorallocate($images, 255, 255, 255);
        $noir = imagecolorallocate($images, 0, 0, 0);
        $texte = $nb1 . '+' . $nb2;

        imagestring($images, 5, 20, 20, $texte, $noir);

        imagepng($images, "monimage.png"); // on enregistre l'image dans le dossier "images"

        echo '<div class="divlivreDor1"> Entrez la somme : &nbsp;&nbsp</div><div class="divlivreDor2" ><input type="text" name="test"/></div><img src="monimage.png" class="imglivreDor" />';
        ?>
        <div class="divlivreDorCenter"><br/><input type="submit" value="Envoyer"/></div>  
    </form>
    <?php
    $count = countAll($db);

    $i = 0;
    $totPage = ceil($count / 10);
    if (!isset($_GET['l'])) {
        $_GET['l'] = 0;
    } else if ($_GET['l'] > $count) {
        $_GET['l'] = 0;
    } else {
        $_GET['l'];
    }


    $a = $_GET['l'];
    $a = (int) $a;
    $b = 10;
    $y = 0;
    $r = 0;
    $livredor = allMessages($a, $b, $db);

    foreach ($livredor as $l) {
        if ($r % 2 == 0) {
            echo '<p class="rose"><strong>
               <span style="margin-right:25px;width:80px;display:inline-block">' . ucfirst($l->getPseudos()) . '</span>
               <span style="margin-right:3px;width:40px;display:inline-block"> ' . $l->getZips() . '</span>
               <span style="margin-right:380px;width:80px;display:inline-block">' . ucfirst($l->getVilles()) . '</span>
               <span style="margin-right:0px;width:120px;display:inline-block"> Le ' . date('d/m/Y', $l->getDates()) . '</span>
               </strong><br/><br/>' . $l->getMessages() . '<br/><hr/></p>';
        } else {
            echo '<p class="bleu"><strong>
               <span style="margin-right:25px;width:80px;display:inline-block">' . ucfirst($l->getPseudos()) . '</span>
               <span style="margin-right:3px;width:40px;display:inline-block"> ' . $l->getZips() . '</span>
               <span style="margin-right:380px;width:80px;display:inline-block">' . ucfirst($l->getVilles()) . '</span>
               <span style="margin-right:0px;width:120px;display:inline-block"> Le ' . date('d/m/Y', $l->getDates()) . '</span>
                </strong><br/><br/>' . $l->getMessages() . '<br/><hr/></p>';
        }
        $r+=1;
    }
    echo'Page : ';
    while ($i < $totPage) {

        echo '<a href="Livreor-' . $y . '.html" class="a"> ' . $i . ' -</a>';
        $y+=10;
        $i++;
    }
    echo '<a href="Livreor-' . $y . '.html" class="a"> ' . $i . ' </a>';
    ?>
    <br/><br/><br/><br/><br/><br/><br/>
</div>


<div style="clear: both;width: 80%;height: 150px;margin-left: auto;margin-right: auto"></div>




