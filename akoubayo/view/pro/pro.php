<?php
if (isset($_GET['l']) && substr($_GET['l'], 0, 4) != "anim" || !isset($_GET['l'])) {
    ?>
    <div  class="container-fluid">
        <div class="row">
            <div class="col-lg-offset-1 col-lg-10 bg-color-none ">
                <div class="row well2">
                    <div class="col-lg-12 bg-color-none border-radius">
                        <?php
                        echo '<h2>Les animations pour les pro</h2>';
                        ?>
                    </div>
                </div>
                <?php
            }
            if (isset($_GET['l']) && substr($_GET['l'], 0, 4) != "anim" || !isset($_GET['l'])) {
                $n = '';
                $r = 0;
                foreach ($anim as $ani) {
                    $a = $ani->getNoms();
                    $search = array('é', ' ');
                    $replace = array('e', '-');
                    $a = str_replace($search, $replace, $a);
                    switch ($ani->getNoms()) {
                        case "Arbre de noel classique":$video = '<iframe src="https://www.youtube.com/embed/CRtAmD9MnwY" style="width:100%;border: 0px" allowfullscreen></iframe>';
                            break;
                        case "Arbre de noel aventure":$video = '<iframe src="https://www.youtube.com/embed/CRtAmD9MnwY" style="width:100%;border: 0px" allowfullscreen></iframe>';
                            break;
                        case "Arbre de noel pour les centres commerciaux":$video = '<iframe src="https://www.youtube.com/embed/msTJdUJXIb4" style="width:100%;border: 0px" allowfullscreen></iframe>';
                            break;

                        default:$video = ".";
                            break;
                    }
                    if ($r % 2 == 0) {
                        ?>
                        <div class="row well2 border-bottom-white pd-bottom">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 bg-color-none">
                                <strong>
                                    <a href="pro-anim-<?php echo $a; ?>.html" >Animation <?php echo $ani->getNoms(); ?></a>
                                </strong>
                                <br/><br/> 
                                <?php echo $ani->getDescriptions(); ?>
                                <br/>
                                Pour plus d'information cliquez sur: <a href="pro-anim-<?php echo $a; ?>.html">Animation <?php echo $ani->getNoms(); ?></a>
                            </div>
                            <div class="col-xs-offset-3 col-xs-6 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-1 col-lg-3 bg-color-none">
                                <?php echo $video; ?>
                            </div>
                        </div>
                    <?php } else {
                        ?>
                        <div class="row well3 border-bottom-white pd-bottom">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 bg-color-none">
                                <strong>
                                    <a href="pro-anim-<?php echo $a; ?>.html">
                                        Animation <?php echo $ani->getNoms(); ?>
                                    </a>
                                </strong>
                                <br/><br/>
                                <?php echo $ani->GetDescriptions(); ?>
                                <br/>
                                Pour plus d\'information cliquez sur: 
                                <a href="pro-anim-<?php echo $a; ?>.html">
                                    Animation <?php echo $ani->getNoms(); ?>
                                </a>
                                <br/><br/>
                            </div>
                            <div class="col-xs-offset-3 col-xs-6 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-1 col-lg-3 bg-color-none">
                                <?php echo $video; ?>
                            </div>
                        </div>
                        <?php
                    }
                    $r++;
                }
                ?>
            </div>
        </div>
    </div>
    <?php
} else {
    if ($_GET['l'] == 'anim-Arbre-de-noel-classique') {
        ?>
        <div  class="container-fluid">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                            <div class="panel panel-gris" style="margin-top: 40px">
                                <div class="panel-heading pd-none">
                                    <div class="row">
                                        <div class="hidden-xs hidden-sm col-md-2 bg-color-none mg-none pd-none" style="">
                                            <img src="./images/noël.png" alt="animation arbre de noël" style="position: absolute; left: 8%; top:-89px;width: 190px;"/>
                                        </div>
                                        <div class=" hidden-xs hidden-sm col-md-10 bg-color-none mg-none pd-none">
                                            <h2 class="mg-top-none pd-none mg-none" style="font-size: 40px;width: 100%">Animation Arbre de Noël classique</h2>
                                        </div>

                                        <div class="hidden-xs col-sm-2 hidden-md hidden-lg  bg-color-none mg-none pd-none" style="">
                                            <img src="./images/noël.png" alt="animation arbre de noël" style="position: absolute; left: 8%; top:-89px;width: 190px;"/>
                                        </div>
                                        <div class=" hidden-xs col-sm-10 hidden-md hidden-lg bg-color-none mg-none pd-none">
                                            <h2 class="mg-top-none pd-none mg-none" style="font-size: 40px;width: 100%">Animation Arbre de Noël classique</h2>
                                        </div>

                                        <div class="hidden-sm hidden-md hidden-lg col-xs-2  bg-color-none mg-none pd-none" style="">
                                            <img src="./images/noël.png" alt="animation arbre de noël" style="position: absolute; left: 8%; top:-35px;width: 100px;"/>
                                        </div>
                                        <div class=" hidden-sm  hidden-md hidden-lg col-xs-10 bg-color-none mg-none pd-none">
                                            <h2 class="mg-top-none pd-none mg-none" style="font-size: 30px;width: 100%">Animation Arbre de Noël classique</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p>
                                    <u>Cette année pour votre arbre de Noël</u> nous vous proposons Trois belles animations de Noël. 
                                    Encadrées par des animateurs professionnels et passionnés, 
                                    nous ferons de votre <strong>Arbre de Noël</strong> une fête inoubliable.
                                    </p>
                                    <p>
                                        <strong>L'animation Arbre de noël classique</strong> est adapté aux petits comme aux grands. 
                                        Une équipe de joyeux lutin proposera <strong>différentes activées aux enfants</strong> pour leur plus grand plaisir.
                                    </p>
                                    <p>
                                        Les enfants participeront à un atelier <strong>maquillage avec un bonnet du Père-noël offert</strong>.<br/>
                                        Ensuite que la fête commence avec une <strong>boum, des jeux musicaux, des chorégraphies</strong>... Tout ca dans joie et la magie de noël.<br/>
                                        Après s'être bien dépenser <strong>les enfants participeront à un jolie spectacle de magie</strong>. Ils se verront remettre à la fin, <strong>un tour de magie que les lutins leurs apprendront.</strong>
                                        <br/>
                                        Le spectacle se cloture en apothéose avec la <strong>remise des cadeaux du CE</strong>, de la <strong>sculpture sur ballon</strong> et <strong>la venu tant attendu du Père-noël</strong> (en option).
                                    </p>
                                    <p>
                                        <strong><u>Télécharger sans plus attandre notre brochure sur <a href="./webroot/image/pdf/Arbre-noel-classique.pdf">l'animation Arbre de noël classique</a></u></strong>
                                    </p>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-10">
                                            <iframe height="350" style="margin-left:-14px; width:100%; border: 0px" src="https://www.youtube.com/embed/CRtAmD9MnwY" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-6">
                                            <div class="panel panel-primary  mg-none ">
                                                <div class="panel-heading">
                                                    <h2>Nous contacter: 06-45-79-87-55</h2>
                                                </div>
                                                <div class="panel-body">
                                                    <img id="contact" src="./images/Coordonnee.jpg" title="contact anniversaire enfant" alt="Contact pour organiser une animation pour votre enfant"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                } elseif ($_GET['l'] == 'anim-Arbre-de-noel-aventure') {
                    ?>
                    <div  class="container-fluid">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                                <div class="row">
                                    <div class="col-md-offset-2 col-md-8">
                                        <div class="panel panel-gris" style="margin-top: 40px">
                                            <div class="panel-heading pd-none">
                                                <div class="row">
                                                    <div class="hidden-xs hidden-sm col-md-2 bg-color-none mg-none pd-none" style="">
                                                        <img src="./images/noël.png" alt="animation arbre de noël" style="position: absolute; left: 8%; top:-89px;width: 190px;"/>
                                                    </div>
                                                    <div class=" hidden-xs hidden-sm col-md-10 bg-color-none mg-none pd-none">
                                                        <h2 class="mg-top-none pd-none mg-none" style="font-size: 40px;width: 100%">Animation Arbre de Noël aventure</h2>
                                                    </div>

                                                    <div class="hidden-xs col-sm-2 hidden-md hidden-lg  bg-color-none mg-none pd-none" style="">
                                                        <img src="./images/noël.png" alt="animation arbre de noël" style="position: absolute; left: 8%; top:-89px;width: 190px;"/>
                                                    </div>
                                                    <div class=" hidden-xs col-sm-10 hidden-md hidden-lg bg-color-none mg-none pd-none">
                                                        <h2 class="mg-top-none pd-none mg-none" style="font-size: 40px;width: 100%">Animation Arbre de Noël aventure</h2>
                                                    </div>

                                                    <div class="hidden-sm hidden-md hidden-lg col-xs-2  bg-color-none mg-none pd-none" style="">
                                                        <img src="./images/noël.png" alt="animation arbre de noël" style="position: absolute; left: 8%; top:-35px;width: 100px;"/>
                                                    </div>
                                                    <div class=" hidden-sm  hidden-md hidden-lg col-xs-10 bg-color-none mg-none pd-none">
                                                        <h2 class="mg-top-none pd-none mg-none" style="font-size: 30px;width: 100%">Animation Arbre de Noël aventure</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <p>
                                                <u>Cette année pour votre arbre de Noël</u> nous vous proposons Trois belles animations de Noël. 
                                                Encadrées par des animateurs professionnels et passionnés, 
                                                nous ferons de votre <strong>Arbre de Noël</strong> une fête inoubliable.
                                                </p>
                                                <p>
                                                    <strong>L'animation Arbre de noël aventure</strong> est adapté aux petits comme aux grands. 
                                                    Une équipe de joyeux lutin proposera <strong>différentes activées aux enfants</strong> pour leur plus grand plaisir.
                                                </p>
                                                <p>
                                                    Les enfants participeront à un atelier <strong>maquillage avec un bonnet du Père-noël offert</strong>.<br/>
                                                    Ensuite que la fête commence avec une <strong>des stands de jeux</strong> ou les enfants pourront gagner des jouets... Tout ca dans joie et la magie de noël.<br/>
                                                    Après s'être bien dépenser <strong>les enfants participeront à un jolie spectacle de magie</strong>. Ils se verront remettre à la fin, <strong>un tour de magie que les lutins leurs apprendront.</strong>
                                                    <br/>
                                                    Le spectacle se cloture en apothéose avec la <strong>remise des cadeaux du CE</strong>, de la <strong>sculpture sur ballon</strong> et <strong>la venu tant attendu du Père-noël</strong> (en option).
                                                </p>
                                                <p>
                                        <strong><u>Télécharger sans plus attandre notre brochure sur <a href="./webroot/image/pdf/Arbre-noel-classique.pdf">l'animation Arbre de noël classique</a></u></strong>
                                                </p>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-offset-1 col-md-10">
                                                        <iframe   height="350" style="margin-left:-14px; width:100%; border: 0px" src="https://www.youtube.com/embed/CRtAmD9MnwY"  allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-6">
                                                        <div class="panel panel-primary  mg-none ">
                                                            <div class="panel-heading">
                                                                <h2>Nous contacter: 06-45-79-87-55</h2>
                                                            </div>
                                                            <div class="panel-body">
                                                                <img id="contact" src="./images/Coordonnee.jpg" title="contact anniversaire enfant" alt="Contact pour organiser une animation pour votre enfant"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } elseif ($_GET['l'] == 'anim-Arbre-de-noel-pour-les-centres-commerciaux') {
                                ?>
                                <div  class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-10">
                                            <div class="row">
                                                <div class="col-md-offset-2 col-md-8">
                                                    <div class="panel panel-gris" style="margin-top: 40px">
                                                        <div class="panel-heading pd-none">
                                                            <div class="row">
                                                                <div class="hidden-xs hidden-sm col-md-2 bg-color-none mg-none pd-none" style="">
                                                                    <img src="./images/noël.png" alt="Animation centre commercial" style="position: absolute; left: 8%; top:-89px;width: 190px;"/>
                                                                </div>
                                                                <div class=" hidden-xs hidden-sm col-md-10 bg-color-none mg-none pd-none">
                                                                    <h2 class="mg-top-none pd-none mg-none" style="font-size: 40px;width: 100%">Animation Arbre de Noël aventure</h2>
                                                                </div>

                                                                <div class="hidden-xs col-sm-2 hidden-md hidden-lg  bg-color-none mg-none pd-none" style="">
                                                                    <img src="./images/noël.png" alt="Animation centre commercial" style="position: absolute; left: 8%; top:-89px;width: 190px;"/>
                                                                </div>
                                                                <div class=" hidden-xs col-sm-10 hidden-md hidden-lg bg-color-none mg-none pd-none">
                                                                    <h2 class="mg-top-none pd-none mg-none" style="font-size: 40px;width: 100%">Animation Arbre de Noël aventure</h2>
                                                                </div>

                                                                <div class="hidden-sm hidden-md hidden-lg col-xs-2  bg-color-none mg-none pd-none" style="">
                                                                    <img src="./images/noël.png" alt="Animation centre commercial" style="position: absolute; left: 8%; top:-35px;width: 100px;"/>
                                                                </div>
                                                                <div class=" hidden-sm  hidden-md hidden-lg col-xs-10 bg-color-none mg-none pd-none">
                                                                    <h2 class="mg-top-none pd-none mg-none" style="font-size: 30px;width: 100%">Animation Arbre de Noël aventure</h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <p>
                                                            <u>Cette année pour votre arbre de Noël</u> nous vous proposons Trois belles animations de Noël. 
                                                            Encadrées par des animateurs professionnels et passionnés, 
                                                            nous ferons de votre <strong>Arbre de Noël</strong> une fête inoubliable.
                                                            </p>
                                                            <p>
                                                                <strong>L'animation Arbre de noël aventure</strong> est adapté aux petits comme aux grands. 
                                                                Une équipe de joyeux lutin proposera <strong>différentes activées aux enfants</strong> pour leur plus grand plaisir.
                                                            </p>
                                                            <p>
                                                                Les enfants participeront à un atelier <strong>maquillage avec un bonnet du Père-noël offert</strong>.<br/>
                                                                Ensuite que la fête commence avec une <strong>des stands de jeux</strong> ou les enfants pourront gagner des jouets... Tout ca dans joie et la magie de noël.<br/>
                                                                Après s'être bien dépenser <strong>les enfants participeront à un jolie spectacle de magie</strong>. Ils se verront remettre à la fin, <strong>un tour de magie que les lutins leurs apprendront.</strong>
                                                                <br/>
                                                                Le spectacle se cloture en apothéose avec la <strong>remise des cadeaux du CE</strong>, de la <strong>sculpture sur ballon</strong> et <strong>la venu tant attendu du Père-noël</strong> (en option).
                                                            </p>
                                                            <p>
                                        <strong><u>Télécharger sans plus attandre notre brochure sur <a href="./webroot/image/pdf/Arbre-noel-classique.pdf">l'animation Arbre de noël classique</a></u></strong>
                                                            </p>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-offset-1 col-md-10">
                                                                    <iframe   height="350" style="margin-left:-14px;width: 100%;border: 0px" src="https://www.youtube.com/embed/CRtAmD9MnwY"  allowfullscreen></iframe>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-6">
                                                                    <div class="panel panel-primary  mg-none ">
                                                                        <div class="panel-heading">
                                                                            <h2>Nous contacter: 06-45-79-87-55</h2>
                                                                        </div>
                                                                        <div class="panel-body">
                                                                            <img id="contact" src="./images/Coordonnee.jpg" title="contact anniversaire enfant" alt="Contact pour organiser une animation pour votre enfant"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        } else {
                                            foreach ($anim as $animation) {
                                                echo $_GET['l'];
                                                echo '<h2>Animation ' . $animation->getNoms() . '</h2>';
                                                echo'<p>';
                                                echo $animation->getDetails();
                                                echo '<a href="pro.html">Revenir aux animations</a></p>';
                                            }
                                        }
                                    }
                                    if ($_GET['l'] == 'anim-Arbre-de-noel-classique' || $_GET['l'] == 'anim-Arbre-de-noel-aventure' || $_GET['l'] == 'anim-Arbre-de-noel-pour-les-centres-commerciaux') {
                                        ?>
                                        <div class="row">
                                            <div class="col-md-offset-2 col-md-8">
                                                <div class="panel panel-gris" style="margin-top: 40px">
                                                    <div class="panel-heading pd-none">
                                                        <div class="row">
                                                            <div class="hidden-xs hidden-sm col-md-2 bg-color-none mg-none pd-none" style="">
                                                                <img src="./images/noël.png" alt="Animation enfant" style="position: absolute; left: 8%; top:-89px;width: 190px;"/>
                                                            </div>
                                                            <div class=" hidden-xs hidden-sm col-md-10 bg-color-none mg-none pd-none">
                                                                <h2 class="mg-top-none pd-none mg-none" style="font-size: 40px;width: 100%">Ils nous ont fait confiance</h2>
                                                            </div>

                                                            <div class="hidden-xs col-sm-2 hidden-md hidden-lg  bg-color-none mg-none pd-none" style="">
                                                                <img src="./images/noël.png" alt="Animation enfant" style="position: absolute; left: 8%; top:-89px;width: 190px;"/>
                                                            </div>
                                                            <div class=" hidden-xs col-sm-10 hidden-md hidden-lg bg-color-none mg-none pd-none">
                                                                <h2 class="mg-top-none pd-none mg-none" style="font-size: 40px;width: 100%">Ils nous ont fait confiance</h2>
                                                            </div>

                                                            <div class="hidden-sm hidden-md hidden-lg col-xs-2  bg-color-none mg-none pd-none" style="">
                                                                <img src="./images/noël.png" alt="Animation enfant" style="position: absolute; left: 8%; top:-35px;width: 100px;"/>
                                                            </div>
                                                            <div class=" hidden-sm  hidden-md hidden-lg col-xs-10 bg-color-none mg-none pd-none">
                                                                <h2 class="mg-top-none pd-none mg-none" style="font-size: 30px;width: 100%">Ils nous ont fait confiance</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table class="table table-bordered table-striped table-condensed">
                                                            <tr> 
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-10 bg-color-none mg-none">
                                                                            <strong>Restaurants McDonald's</strong>
                                                                        </div>
                                                                        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-1 bg-color-none mg-none">
                                                                            <strong>Charenton</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12 bg-color-none mg-none">
                                                                            <p class="Justify" style="font-style:italic;">
                                                                                <br/>
                                                                                <b>Arbre de noël</b> une première <b>très réussie</b> pour nous,
                                                                                <b>l'arbre de noël</b> était une nouveauté pour nous.
                                                                                Tous nos salariés (ainsi que leurs enfants) ont apprécier ce moment. Un grand bravo et merci à
                                                                                Damien et son équipe qui ont fait preuve de <b>créativité et d'originalité</b> (tous les enfants ont
                                                                                adorés <b>l'atelier de sculture de ballons</b>) durant cette <b>journée mémorable</b>. Il est certain que
                                                                                nous renouvellerons cette expérience.
                                                                                <br/> 
                                                                                <strong>Responsable marketing (restaurants McDonald's Joinville, Bercy, Charenton)</strong>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr> 
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-10 bg-color-none mg-none">
                                                                            <strong>Magasin Intermarché</strong>
                                                                        </div>
                                                                        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2 bg-color-none mg-none">
                                                                            <strong>Bourg de Thizy</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12 bg-color-none mg-none">
                                                                            <p class="Justify" style="font-style:italic;">
                                                                                <br/>
                                                                                Merci à toute l'équipe d'Akoubayo Family ... Quelle énergie et quel <b>professionalisme</b>, les enfants étaient ravis,
                                                                                les parents aussi, une expérience réussie à renouveller rapidement! Akoubayo, à consommer sans modération!
                                                                                <br/>
                                                                                <strong>A bientôt, Eva Bitton</strong>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr> 
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-10 bg-color-none mg-none">
                                                                            <strong>Aquarium de Lyon</strong>
                                                                        </div>
                                                                        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2 bg-color-none mg-none">
                                                                            <strong>Lyon</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12 bg-color-none mg-none">
                                                                            <p class="Justify" style="font-style:italic;">
                                                                                <br/>
                                                                                Succès renouvelé avec l'agence Akoubayo sur les vacances scolaires de Noël. L'Aquarium de Lyon remercie l'ensemble de
                                                                                l'équipe d'Akoubayo pour <b>sa performance professionnelle, ludique et originale</b>.
                                                                                Les visiteurs repartent ravis de leur expérience aquatique
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr> 
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-10 bg-color-none mg-none">
                                                                            <strong>ALUTECHCHNIE</strong>
                                                                        </div>
                                                                        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2 bg-color-none mg-none">
                                                                            <strong>Paris</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12 bg-color-none mg-none">
                                                                            <p class="Justify" style="font-style:italic;">
                                                                                <br/>
                                                                                Les enfants des salariés d'Alutechnie ont été
                                                                                enchantés par l'animation réalisée
                                                                                par vos deux animateurs. Nous remercions AKOUBAYO pour l'organisation de notre <b>arbre de noël</b>
                                                                                et la prise en charge de nos bambins.<br/>
                                                                                A très bientôt
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr> 
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-10 bg-color-none mg-none">
                                                                            <strong>OCTO Technology</strong>
                                                                        </div>
                                                                        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2 bg-color-none mg-none">
                                                                            <strong>Paris</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12 bg-color-none mg-none">
                                                                            <p class="Justify" style="font-style:italic;">
                                                                                <br/>
                                                                                Nous avons fait appel à Akoubayo pour s'occuper de l'animation de l'arbre de Noël de notre société. 
                                                                                Des lutins plein d'entrain ont donc mis l'ambiance et ont occupé nos ptits bouts 
                                                                                (de quelques mois à 12 ans en passant par les parents): maquillage, sculpture sur ballons, 
                                                                                spectacle de magie, jeux musicaux... Une équipe du tonnerre, motivée et pleine 
                                                                                d'idées pour émerveiller enfants et grands !
                                                                                <br/>
                                                                                Merci à toute l'équipe ! 
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr> 
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-10 bg-color-none mg-none">
                                                                            <strong>LEVAGEMODERNE</strong>
                                                                        </div>
                                                                        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2 bg-color-none mg-none">
                                                                            <strong>Paris</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12 bg-color-none mg-none">
                                                                            <p class="Justify" style="font-style:italic;">
                                                                                <br/>
                                                                                AKOUBAYO  ? JE VOUS LE RECOMMANDE !<br/>
                                                                                Notre premier noel de société a ete une parfaite réussite grace à cette équipe 
                                                                                très dynamique et egalement tres professionnelle. 
                                                                                Les 20 enfants Présents avaient tous des petites étoiles dans les yeux ! 
                                                                                Ils sont repartis heureux !
                                                                                Grand merci à Saber, Guillaume, et toute l'équipe, vous etes des supers lutins.
                                                                                <br/>
                                                                                Merci et bravo 
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr> 
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-10 bg-color-none mg-none">
                                                                            <strong>BONTON</strong>
                                                                        </div>
                                                                        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2 bg-color-none mg-none">
                                                                            <strong>Paris</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12 bg-color-none mg-none">
                                                                            <p class="Justify" style="font-style:italic;">
                                                                                <br/>
                                                                                Nous avons fait appel à Damien et ses équipes pour animer notre gouter de noël 
                                                                                d’entreprise dédié aux enfants et je dois dire que la réussite de l’événement 
                                                                                leur doit beaucoup.
                                                                                Nous avons l’habitude de faire appel à des animateurs pour pas mal d’événements 
                                                                                durant l’année et il n’est pas rare de tomber sur des moins pro que d’autre.
                                                                                Je sais maintenant qui appeler pour etre sur de bien tomber.
                                                                                Encore merci pour tout.
                                                                                <br/>
                                                                                Thomas Cohen
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr> 
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-10 bg-color-none mg-none">
                                                                            <strong>Intermarché</strong>
                                                                        </div>
                                                                        <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2 bg-color-none mg-none">
                                                                            <strong>Roissy</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12 bg-color-none mg-none">
                                                                            <p class="Justify" style="font-style:italic;">
                                                                                <br/>
                                                                                Pour réussir sa réouverture Intermarche a fait appel à l équipe d Akoubayo, 
                                                                                Pari Gagné!! A tt point de vue! L'organisation en amont et durant les 5 jours a 
                                                                                été une vraie réussite. Damien et son équipe ont pris les rennes et ont géré de A 
                                                                                à Z avec un trés grand professionnalisme! 
                                                                                Les clients étaient ravis et tres enthousiamés par les nombreux jeux 
                                                                                (Blind test, panier gourmand, énigmes etc...). 
                                                                                Les enfants ont été emerveilles par les animations qui leurs étaient réserves  
                                                                                (maquillage, concours de dessin etc) 
                                                                                le samedi et le mercredi laissant ainsi leurs parents faire tranquillement leur 
                                                                                course dans le magasin! Et pour finir un flash mob au milieu du point de vente!!! 
                                                                                Je pense que nous avons crée le buzz et que les gens garderont à l esprit 
                                                                                cette semaine d animation "hors du commun" pleine de belles rencontres 
                                                                                d'échanges et de proximité avec notre clientéle! Akoubayo avait bien compris 
                                                                                l'enjeu et nous a comblé!! Encore merci à Damien, Saber et tpute l équipe !
                                                                                A trés vite pour une nouvelle collaboration !
                                                                                <br/>
                                                                                Madeleine MOUREU pour INTERMARCHE
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
       
