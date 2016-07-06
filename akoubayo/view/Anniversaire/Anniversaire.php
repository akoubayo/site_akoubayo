<div  class="container-fluid">
    <div class="row">
        <div class="col-lg-offset-1 col-lg-10 bg-color-none ">
            <div class="row well2">
                <div class="col-lg-12 bg-color-none border-radius">
                    <h1>Les animations anniversaire enfant à domicile.</h1>
                </div>
            </div>
            <?php
            $n = '';
            $r = 0;
            foreach ($anim as $ani) {
                $a = $ani->getNoms();
                $search = array('é', ' ');
                $replace = array('e', '-');
                $a = str_replace($search, $replace, $a);
                switch ($ani->getNoms()) {
                    case "Classique à domicile":$video = '<iframe  height="250" src="https://www.youtube.com/embed/2vXJKEXESkI" style="border: 0px;width:100%" allowfullscreen></iframe>';
                        break;
                    case "Boum":$video = '<iframe  height="250"  src="https://www.youtube.com/embed/_gYuWrQcFnc" style="border: 0px;width:100%"  allowfullscreen></iframe>';
                        break;
                    case "graine de stars":$video = '<iframe  height="250" src="https://www.youtube.com/embed/_gYuWrQcFnc" style="border: 0px;width:100%"  allowfullscreen></iframe>';
                        break;
                    case "aventure":$video = '<iframe  height="250" src="https://www.youtube.com/embed/VdekKoAo5_o" style="border: 0px;width:100%"  allowfullscreen></iframe>';
                        break;

                    default:$video = ".";
                        break;
                }
                if ($r % 2 == 0) {
                    ?>             
                    <div class="row well2 border-bottom-white pd-bottom">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 bg-color-none">
                            <strong>
                                <h2><u>Animation <?php echo $ani->getNoms(); ?></u></h2>
                            </strong>
                           
                            <?php echo $ani->getDescriptions() ?><br/>
                            <strong>Pour plus d'information cliquez sur: <a href="Animations-<?php echo $a; ?>.html" title="<?php echo $ani->getTitre_lien()?>">Animation <?php echo $ani->getNoms(); ?></a></strong>
                        </div>
                        <div class="col-xs-offset-3 col-xs-6 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-1 col-lg-3 bg-color-none">
                            <?php echo $video; ?>
                        </div>
                    </div>

                    <?php
                } else {
                    ?>     
                    <div class="row well3 border-bottom-white pd-bottom">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 bg-color-none">
                            <strong>
                                <h2><u>Anniversaire <?php echo $ani->getNoms(); ?></u></h2>
                            </strong>
                            <?php echo $ani->getDescriptions() ?><br/>
                            <strong>Pour plus d'information cliquez sur: <a href="Animations-<?php echo $a; ?>.html" title="<?php echo $ani->getTitre_lien()?>">Anniversaire <?php echo $ani->getNoms(); ?></a></strong>
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
<div style="clear: both;width: 80%;height: 150px;margin-left: auto;margin-right: auto"></div>