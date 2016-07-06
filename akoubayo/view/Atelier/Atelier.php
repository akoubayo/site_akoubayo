<?php
if (isset($_GET["l"])) {
    $title = $_GET['l'];
} else {
    $title = "Fiches-maquillages";
}
?>
<div  class="container-fluid">
    <div class="row">
        <div class="col-md-offset-1 col-md-10 gal bg-color-none" id="haut">
            <div class="panel panel-gris">
                <div class="panel-heading">
                    <h2 class="mg-top-none">Les fiches <?php echo $title; ?></h2>
                </div>
                <div class="panel-body">
                    <?php
                    foreach ($phot as $pp) {
                        ?>                  
                        <div class="col-xs-3 col-sm-2 col-md-2 col-lg-1  pd-none mg-none">
                            <a href="#maquillage-enfant-<?php echo $pp->getNoms(); ?>">
                                <img src="<?php echo 'webroot/image/' . $pp->getEmplacements(); ?>"
                                     alt="<?php echo $pp->getAlt(); ?>" title="<?php echo $pp->getTitres(); ?>" class="border-bottom-white borderImg imgGal" style="width: 100%;height: 100px"/>
                            </a>         
                        </div>
                        <?php
                    }
                    ?>

                </div>
                <div class="panel-footer">
                    Cliquez sur l'image pour aller sur la fiche maquillage
                </div>        
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 gal bg-color-none">           
            <?php
            if (isset($ficheMaquillage)) {
                foreach ($ficheMaquillage as $maquillage) {
                    ?>

                    <div class="panel panel-gris">
                        <div class="panel-heading">
                            <h2><?php echo $maquillage->getTitre(); ?></h2>
                        </div>
                        <div class="panel-body">
                            <?php
                            $fiches = $maquillage->getTitre();
                            $photos = photoFiche($fiches, $db);
?>
                            <div class="row">
                            <?php
                            if (isset($photos)) {
                                foreach ($photos as $po) {
                                    ?>
                                <div class="col-xs-offset-2 col-sm-offset-0 col-xs-8  col-sm-3 col-md-2">
                                    <img  src="./webroot/image/<?php echo $po->getEmplacements(); ?>" id="maquillage-enfant-<?php echo $po->getNoms(); ?>"  alt="<?php echo $po->getAlt(); ?>" title="<?php echo $po->getTitres(); ?>"/>
                                </div>
 <?php
                                }
                            }
                            ?>
                                <div class="col-xs-12 col-sm-9 col-md-10">
                            <p>
                                <?php echo strip_tags($maquillage->getContenu()); ?>
                                <?php
                                $a = $maquillage->getTitre();
                                $b = str_replace(' ', '-', $a);
                                $b = str_replace('\'', '-', $b);
                                ?>
                                <br/>
                                <?php
                                    if(isset($_GET['l']) && $_GET['l'] != 'Cartes-d-invitation'){
                                ?>
                                <a href="Etapes-<?php echo $b; ?>.html ">Cliquez ici pour apprendre <?php echo $maquillage->getTitre(); ?></a> 
                                <?php 
                                    }else{
                                        if (isset($photos)) {
                                ?>
                                <a href="Atelier-Cartes-d-invitation_pdf_<?php echo $photos[0]->getId_images(); ?>.html">
                                    cliquez ici pour télécharger votre carte d'invitation
                                </a>
                                <?php
                                    }
                                    }
                                ?>
                            </p>
                                </div>
                        </div>
                        </div>
                        <div class="panel-footer">
                            <a href="#haut">Retour en haut</a>
                </div>
                    </div> 
                    <?php
                }
                ?>

                <?php
            }
            ?>


        </div></div></div>
<?php



?>
    <script>
        jQuery(document).ready(function () {
            var w = $('.gal').find('img').width();
            var h = $('.gal').find('img').height();
            $(window).resize(function () {
                var w2 = $('.gal').find('img').width();
                var res = (w2 * 100) / w;
                res = (res * h) / 100
                $('.gal').find('.imgGal').css('height', res);
            });
        });
    </script>