<?php
include_once '../../../../core/includeAjax.php';
if(isset($_POST['mois']) && isset($_POST['annee'])){
    $mois=$_POST['mois'];
    $year=$_POST['annee'];
    $currentTime=strtotime('01-'.$mois.'-'.$year);
    $currentTime2=date('m', strtotime('+1 month', $currentTime ));
    $currentTime2=  strtotime('01-'.$currentTime2.'-'.$year);
}else{
    $mois=date('m');
    $year=date('Y');
    $currentTime=strtotime('01-'.$mois.'-'.$year);
    $currentTime2=date('m', strtotime('+1 month', $currentTime ));
    $currentTime2=  strtotime('01-'.$currentTime2.'-'.$year);
}
$model=  Model::load('PayeAnimateurM');
$d=array(
    "conditions"=>"date_heure BETWEEN '$currentTime' AND '$currentTime2' AND event_id=id_event AND bool_client_anim=0",
    "order"=>"users_id ASC, date_heure ASC "
    
);
$paye=$model->find($d,$db);
$titre='Nom;Prénom;Date animation;Statut;cachet;paye'."\n";
        $text='';
        $i=0;
        $tot=0;
        $totAll=0;
        $count=count($paye)-1;
        if(isset($paye)){
            foreach ($paye as $p){
                if($i<$count && $p->getNom()!=$paye[$i+1]->getNom()){
                    $tot+=$p->getPaye_anim();
                    $totAll+=$tot;
                    $saut="\n".';;;;TOTAL;'.$tot.'€'."\n\n";
                    $tot=0;
                }elseif ($i>=$count) {
                    $tot+=$p->getPaye_anim();
                    $totAll+=$tot;
                    $saut="\n".';;;;TOTAL;'.$tot.'€'."\n\n".';;;;Total des anim;'.$totAll.'€';
                    $tot=0;
                }else{
                    $tot+=$p->getPaye_anim();
                    $saut="\n";
                }
                switch ($p->getStatut()){
                    case 0: $statut="Animateur";
                            $cachet="Non";
                        break;
                    case 1: $statut="Commédien";
                            $cachet="Oui";
                        break;
                    case 2: $statut="Auto-entrepreneur";
                            $cachet="Non";
                        break;
                    default :$statut="Animateur";
                             $cachet="Non";
                }
                $text.=''.$p->getNom().';'.$p->getPrenom().';'.date('d-m-Y',$p->getDate_heure()).';'.$statut.';'.$cachet.';'.$p->getPaye_anim().'€'.$saut;
                $i++;
            }
        }
        
        $header="Paye_".outils::convertMoisFull($mois)."_".$year;
        
?>
<form action="admin-gestion.html" method="POST" id="paye">
    <textarea  name="titre"><?php echo $titre; ?></textarea>
    <textarea name="text"><?php echo $text; ?></textarea>
    <textarea name="header"><?php echo $header; ?></textarea>
    <input type="submit"/>
</form>

<script>
    $(document).ready(function(){
        $("#paye").submit();
        $("#corpPop").empty();
        $("#backBlack").remove();
        $('#pop').hide(10);
    });
    </script>