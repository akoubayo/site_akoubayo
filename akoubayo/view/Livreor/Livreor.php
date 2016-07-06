<div  class="container-fluid">
    <div class="row">
        <div class="col-md-offset-1 col-md-10 gal bg-color-none" id="haut">
            <div class="panel panel-primary panel-striped-impair panel-striped-pair panel-striped-1-none ">
                <div class="panel-heading">
                    <h2>Ils nous ont laissé un message</h2>
                </div>
                <div class="panel-body">
                    <form method="post" action="Livreor.html" class="col-lg-12 well mg-none" style="border: solid 1px #337ab7">
                        <legend>Laissez nous un message</legend>
                        Pseudo:<input type="text" name="pseudos" value="<?php
                        if (isset($_SESSION['pseudos'])) {
                            echo $_SESSION['pseudos'];
                        }
                        ?>" class="form-control" style="width: 15%"/>

                        Ville:<input type="text" name="villes" value="<?php if (isset($_SESSION['villes'])) echo $_SESSION['villes']; ?>" class="form-control" style="width: 15%"/>
                        Code postal:<input type="text" name="zips" value="<?php if (isset($_SESSION['zips'])) echo $_SESSION['zips']; ?>" class="form-control" style="width: 15%"/>
                        Votre message:<textarea name="messages" rows="5" class="form-control">
                            <?php if (isset($_SESSION['messages'])) echo $_SESSION['messages']; ?> 
                        </textarea>


                        <?php
                        $images = imagecreate(200, 50);
                        $blanc = imagecolorallocate($images, 255, 255, 255);
                        $noir = imagecolorallocate($images, 0, 0, 0);
                        $texte = $nb1 . '+' . $nb2;
                        imagestring($images, 5, 20, 20, $texte, $noir);
                        imagepng($images, "monimage.png"); // on enregistre l'image dans le dossier "images"
                        ?>
                        Entrez la somme :<img src="monimage.png" style="width: 10%" /> <input type="text" name="test" class="form-control" style="width: 15%"/>
                        <br/>
                        <input type="submit" value="Envoyer"/>
                    </form>
                </div>
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
                    ?>
                <div class="panel-body" style="border-bottom: solid 5px #337ab7">
                    <div class="row">
                        <div class="col-xs-11 bg-color-none border-bottom-white">
                        <div class="col-xs-3 bg-color-none">
                            <strong>
                            <?php echo ucfirst($l->getPseudos()); ?>
                            </strong>
                        </div>
                         <div class="col-xs-3 bg-color-none">
                             <strong>
                            <?php echo $l->getZips(); ?>
                             </strong>
                        </div>
                         <div class="col-xs-3 bg-color-none">
                             <strong>
                            <?php echo ucfirst($l->getVilles()); ?>
                             </strong>
                        </div>
                         <div class="col-xs-3 bg-color-none">
                             <strong>
                            Le <?php echo date('d/m/Y', $l->getDates()); ?>
                             </strong>
                        </div>
                        </div>
                    </div>
                        <?php echo $l->getMessages(); ?>
                    </p>
                </div>
                
                    <?php
                }
?>
                <div class="panel-footer">
                    <div class="btn-group" style="text-align: center">
                        <span class="btn btn-info">Page : </span>
                    <?php
                while ($i < $totPage) {

                    echo '<a class="btn btn-info" href="Livreor-' . $y . '.html" class="a"> ' . $i . ' </a>';
                    $y+=10;
                    $i++;
                }
                echo '<a  class="btn btn-info" href="Livreor-' . $y . '.html" class="a"> ' . $i . ' </a>';
                ?>
                    </div>
                </div>
            </div>


        </div></div></div>



