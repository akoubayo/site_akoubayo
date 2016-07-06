<div  class="container-fluid">
    <?php
    foreach ($anim as $animation) {
        ?>
        <div class="row">
            <div class="col-lg-offset-1 col-lg-10 border-radius">
                <div class="row "> 

                    <div class="col-lg-offset-1 col-lg-5 ">
                        <div class="row border-radius pd-left ">
                            <div class="panel panel-primary well3">
                                <div class="panel-heading">
                                    <h1 class="panel-title" style="font-size: 35px">Animation <?php echo $animation->getNoms(); ?></h1>
                                </div>
                                <div class="panel-body">
                                    <div style="text-align:center">
                                        <p>
                                            <strong>2h30 de fête, avec 12 enfants</strong><br/>
                                            <span style="text-decoration:underline">Horaires :</span><br/>
                                            mardi et vendredi 18h30-21h00.<br/>
                                            mercredi, samedi et dimanche : 14h30-17h00 ou 19h00-21h30.<br/>
                                            <strong>(tous nos horaires s\'adaptent !)</strong><br/>
                                            <br/>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row gal">
                                <img src="./webroot/image/animations/animation_classique.jpg" alt="Animation anniversaire enfant" style="display: none"/>
                                <img src="./webroot/image/animations/anniversaire_enfant_4.jpg" alt="Spectacle pour enfant" style="display: none"/>
                                <img src="./webroot/image/animations/animation_classique_3.jpg" alt="Animation pour enfant" style="display: none"/>
                                <img src="./webroot/image/animations/animation_graine_de_stars.jpg" alt="Anniversaire enfant" style="display: none"/>
                                <img src="./webroot/image/animations/anniversaire_classique_1.jpg" alt="Anniversaire paris et Lyon" style="display: none"/>                   
                                <img src="./webroot/image/animations/animation_classique_2.jpg" alt="Anniversaire pour enfant" style="display: none"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-offset-1 col-lg-4 border-radius">
                        <div class="panel panel-primary well3">
                            <div class="panel-heading">
                                <h2 class="panel-title h2" style="font-size: 35px">Déroulement de l'anniversaire </h2>
                            </div>
                            <div class="panel-body">
                                <?php
                                echo $animation->getDetails();
                                $nomAnim = $animation->getNoms();
                                if ($nomAnim == "Classique") {
                                    ?>
                                    <u>Tarifs :</u><br/>- Mardi, Mercredi, Vendredi  :<?php echo $animation->getPrix_min() ?>€<br/>

                                    - Samedi après-midi et Dimanche :<?php echo $animation->getPrix_max() ?>€<br/>
                                <?php } else {
                                    ?>
                                    <u>Tarifs :</u><br/><br/>- Mardi, Mercredi, Vendredi et Dimanche :<?php echo $animation->getPrix_min() ?>€<br/>

                                    - Samedi après-midi : <?php echo $animation->getPrix_max() ?>€<br/>
                                    <?php
                                }
                                ?>
                                - Samedi en soirée :<?php echo $animation->getPrix_min(); ?>€<br/><br/>

                                <a href="Anniversaire-enfant.html">Revenir aux animations</a>
                                <br/>
                            </div>
                        </div>
                    </div></div>
                <?php
            }
            if (isset($opt)) {
                ?>
                <div class="row">
                    <div class="col-lg-offset-1 col-lg-5  border-radius pd-none">
                        <div class="panel panel-primary well3 mg-none ">
                            <div class="panel-heading">
                                <h2 class="h2">Les Options pour animation à domicile:</h2>
                            </div>
                            <div class="panel-body">
                                <ul>
                                    <?php
                                    foreach ($opt as $option) {
                                        ?><li><?php echo $option->getNoms_option(); ?>: <?php echo $option->getPrix_opt(); ?>€</li>
                                        <?php
                                    }

                                    echo '</ul>';
                                }
                                ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-offset-1 col-lg-5">
                    <div id="monaccordeon" class="panel-group panel-primary  mg-none ">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title h2" style="font-size: 25px;border: none">
                                    <a href="#item2" data-parent="#monaccordeon" data-toggle="collapse">
                                        Nous contacter: 06-45-79-87-55
                                    </a>
                                </h3>
                            </div>
                            <div id="item2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <img id="contact" src="./images/Coordonnee.jpg" title="contact anniversaire enfant" alt="Contact pour organiser une animation pour votre enfant"/>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title h2" style="font-size: 25px;border: none">
                                    <a href="#item1" data-parent="#monaccordeon" data-toggle="collapse">
                                        Formulaire de réservation
                                    </a>
                                </h3>
                            </div>
                            <div id="item1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <form class="form-horizontal col-lg-12" method="post" action="Animations-<?php echo $_GET['l']; ?>.html">
                                        <div class="form-group">
                                            <span class="pd-none mg-none legend1">Demande de devis en ligne.</span>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mg-none">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 mg-none">
                                                            <label class="col-lg-4 pd-none">Choix de l'animation: </label>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-lg-4 mg-none">
                                                            <select id="nomAnim"  name="nomAnim" class="form-control">
                                                                <?php
                                                                foreach ($nomAnims as $n) {
                                                                    if ($z == $n->getNoms()) {
                                                                        ?>
                                                                        <option value="<?php echo $n->getNoms(); ?>" selected ><?php echo $n->getNoms(); ?></option>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <option value="<?php echo $n->getNoms(); ?>"><?php echo $n->getNoms(); ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mg-none">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 mg-none">
                                                            <label  class="col-lg-4 pd-none">Nom : </label>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-lg-4 mg-none">
                                                            <input type="text" class="form-control"  name="nom">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mg-none">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 mg-none">
                                                            <label  class="col-lg-4 pd-none">Téléphonne : </label>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-lg-4 mg-none">
                                                            <input type="text" class="form-control"  name="tel">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mg-none">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 mg-none">
                                                            <label  class="col-lg-4 pd-none">Date de l'évènement : </label>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-lg-4 mg-none">
                                                            <input type="text" class="form-control"  name="date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mg-none">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 mg-none">
                                                            <label  class="col-lg-4 pd-none">Horraire : </label>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-lg-4 mg-none">
                                                            <input type="text" class="form-control"  name="heure">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mg-none">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 mg-none">
                                                            <label  class="col-lg-4 pd-none">Prénom de l'enfant : </label>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-lg-4 mg-none">
                                                            <input type="text" class="form-control"  name="prenom">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mg-none">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 mg-none">
                                                            <label  class="col-lg-4 pd-none">Date de naissance : </label>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-lg-4 mg-none">
                                                            <input type="text" class="form-control"  name="dateN">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mg-none">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 mg-none">
                                                            <label  class="col-lg-4 pd-none">Adresse : </label>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-lg-10 mg-none">
                                                            <input type="text" class="form-control"  name="adresse">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mg-none">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 mg-none">
                                                            <label class="col-lg-4 pd-none">code postal </label>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-lg-4 mg-none">
                                                            <input type="text" class="form-control"  name="codeP">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mg-none">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 mg-none">
                                                            <label class="col-lg-4 pd-none">ville : </label>
                                                        </div>
                                                    </div> 
                                                    <div class="row">
                                                        <div class="col-lg-4 mg-none">
                                                            <input type="text" class="form-control"  name="ville">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="pull-right btn btn-default">Envoyer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="infos">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">Demande de réservation envoyé.</h4>
            </div>
            <div class="modal-body">
                Votre demande de réservation à bien été envoyer.<br/>
                Nous allons la traiter dans les plus bref délais.
                <div class="row">
                    <div class="col-lg-4">
                        <button  class="btn btn-primary" data-dismiss="modal">
                            Fermer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<button data-toggle="modal"  data-target="#infos" id="enMail" class="btn btn-primary" style="display: none">
    informations
</button>

<script>
    jQuery(document).ready(function () {
        var img = new Array();
        $('.gal').children('img').each(function () {
            img.push($(this).attr('src'));
        });
        $(function () {
            var i = 0;
            var y = 0;
            var z = 0;
            var lar = [];
            var hau = [];
            while (i < img.length)
            {
                imgs = new Image();
                imgs.src = img[i];
                if (imgs.width > imgs.height) {
                    lar.push(img[i]);
                }
                else {
                    hau.push(img[i]);
                }
                i++;
            }
            i = 0;
            function anim(i, y, z) {

                if (i > img.length) {
                    return;
                }

                imgs = new Image();
                imgs.src = img[i];
                if (imgs.width < imgs.height && hau[y]) {
                    $('.gal').append('<div class="col-xs-4 col-sm-4 col-md-3 pd-none mg-none dis" style="display:none" >\n\
                                            <a href="#" class="">\n\
                                                <img src="' + hau[y] + '"  alt="Tigre" class=" perso pointeur grande borderImg" style="height:' + height + 'px" rel="1" data-toggle="modal" href="#infos" data-container="body">\n\
                                            </a>\n\
                                        </div>');

                    y++;
                    $('.dis').fadeIn(600);
                }
                else if (lar[z + 1]) {
                    $('.gal').append('<div class="hidden-xs col-sm-4 col-md-3 pd-none mg-none">\n\
                                <div class="row">\n\
                                    <div class="col-xs-12 col-sm-12 col-md-12  mg-none bg-color-none dis" style="display:none">\n\
                                        <a href="#" class="">\n\
                                            <img src="' + lar[z] + '" alt="Tigre" style="display:none; " class="disImg borderImg perso pointeur petite" rel="1" data-toggle="modal" href="#infos" data-container="body">\n\
                                        </a>\n\
                                    </div>\n\
                                </div>\n\
                                <div class="row">\n\
                                    <div class="hidden-xs col-sm-12 col-md-12 bg-color-none  mg-none dis" style="display:none">\n\
                                        <a href="#" class="">\n\
                                            <img src="' + lar[z + 1] + '" alt="Tigre" style="display:none;" class="disImg2 borderImg perso pointeur petite" rel="1" data-toggle="modal" href="#infos" data-container="body">\n\
                                        </a>\n\
                                    </div>\n\
                                </div>\n\
                            </div>');
                    $('.dis').fadeIn(600);
                    $('.disImg').fadeIn(600);
                    setTimeout(function () {
                        $('.disImg2').fadeIn(600);
                    }, 100);
                    z = z + 2;
                }
                else if (lar[z] && !lar[z + 1]) {
                    $('.gal').append('<div class="hidden-xs col-sm-4 col-md-3 pd-none mg-none dis">\n\
                                <div class="row">\n\
                                    <div class="col-xs-12 col-sm-12 col-md-12  mg-none bg-color-none">\n\
                                        <a href="#" class="">\n\
                                            <img src="' + lar[z] + '" alt="Tigre" class="borderImg perso pointeur petite"  rel="1" data-toggle="modal" href="#infos" data-container="body">\n\
                                        </a>\n\
                                    </div>\n\
                                </div>\n\
                                </div>');
                    $('.dis').fadeIn(600);
                    z++;
                }
                i++;
                setTimeout(function () {
                    anim(i, y, z);
                }, 100);
            }
            anim(i, y, z);

            var height;
            height = $('.petite').height();
            height = height * 2;
            height = height + 6;
            $('.grande').css('height', '' + height + 'px');

        });
        $(window).resize(function () {
            var height;
            height = $('.petite').height();
            height = height * 2;
            height = height + 6;
            $('.grande').css('height', '' + height + 'px');
        });
    });
    var t = '<?php if(isset($_GET['r'])){echo $_GET['r'];}else{echo "0";} ?>';
    if (t == 1) {
        $("#enMail").trigger("click"); 
    }
</script>