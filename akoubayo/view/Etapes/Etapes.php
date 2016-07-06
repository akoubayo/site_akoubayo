<div  class="container-fluid">
    <div class="row">
        <div class="col-md-offset-1 col-md-10 gal bg-color-none" id="haut">
            <?php
            
            

            if (isset($num)) {
                foreach ($num as $n) {
                    ?>
                    <div class="panel panel-gris">
                        <div class="panel-heading">
                            <h2>Etape numéros<?php echo $n->getNumeros_etapes() ?></h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <?php
                            $p = photoEtapes($a, $n->getNumeros_etapes(), $db);
                         
                            if(isset($p)) {
                                
                                foreach ($p as $pp) {
                                    ?>
                                <div class="col-md-1">
                                    <img src="webroot/image/<?php echo $pp->getEmplacements(); ?>" title="<?php echo $pp->getTitres(); ?>" alt="<?php echo $pp->getAlt(); ?>" class="perso" rel="1" data-toggle="modal" href="#infos" data-container="body"/>
                                </div>
                                    <?php
                                }
                            }
                                ?>
                            </div>
                                <div  class="clearBoth" >
                                    <p><?php echo $n->getTexte(); ?></p>
                                </div>
                                <?php
                            
                            ?>
                        </div>
                        <div class="panel-footer">
                            <?php
                            $nomAt = nomAtelier($n->getFiches_id(),$db);
                            ?>
                            <a href="Atelier-<?php echo $nomAt; ?>.html">Retour aux fiches: <?php echo $nomAt ?></a>
                        </div>
                    </div>
                        <?php
                    }
                }
                ?>

            </div>
    </div>
</div>


<div class="modal" id="infos">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">Plus d'informations</h4>
            </div>
            <div class="modal-body">
                <div class="row" class="img-thumbnail bg-color-none">
                    <div class=" col-sm-12">
                        <img src="bla"/>
                    </div>
                    
    </div>
</div>
        </div>
    </div>
</div>

<script>
    $('body').on('click','.perso', function () {
                var src = $(this).attr('src');
                $('.modal-body').children().find('img:first').attr('src', src);
            });
    </script>