<div class="divBouton">
    <table>
        <tr>
            <td><img src="./webroot/image/icones/retour.png" rel="retour"/></a><br/>Planning</td>
            <td><img src="./webroot/image/icones/Edit.png" rel="ajout" /><br/>Ajout Train</td>
            <td class="bouton1"><img src="./webroot/image/icones/Add.png" rel="anim" /><br/> Animateur</td>
            <td class="bouton2"><img src="./webroot/image/icones/Mails.png" rel="mail" /><br/>Mails</td>
            <td><img src="./webroot/image/icones/Stats.png" rel="payeTrain" /><br/>Paye Anim</td>
            <td><img src="./webroot/image/icones/Stats.png" rel="devis" /><br/>Devis</td>
            <td><img src="./webroot/image/icones/Stats.png" rel="planning" /><br/>Planning</td>
        </tr>
    </table>
</div>
<?php

//   *******************    Affichage des périodes
if(isset($periodeTrain)){
    echo 'Période : <select name="selectPeriode">';
    foreach ($periodeTrain as $p){
?>
<span>
        
</span>

    <option value="<?php echo $p->getId_train_periode(); ?>"><?php echo $p->getNom_periode(); ?></option>

<?php
    }
    echo '</select>';
}
//   ******************    Fin affichage des période
?>
<!-- ********  Tri des train ************** -->
<form action="admin-train.html" method="post">
    Tri du planning : <select name="tri">
    <option name="tri" value="date">Date</option>
    <option name="tri" value="com">Comédien</option>
    <option name="tri" value="code">Code Trajet</option>
</select>
    <input type="submit"/>
</form>
    
    
<?php
//   ******************    Affichage du planning

if(isset($trainPlanning)){
?>
<table class="parent" style="background-color: white">
    <th><input type="checkbox"</th>
    <th>Animateur</th>
    <th>Code Trajet</th>
    <th>Nuitée</th>
    <th>Axe</th>
    <th>Num Train</th>
    <th>Num voiture</th>
    <th>Date</th>
    <th>Départ</th>
    <th>Arrivé</th>
    <th>Prise de poste</th>
    <th>Heure dep</th>
    <th>Heure arr</th>
    <th>Fin prise poste</th>
    <th>Nb heure</th>
    <th>Hlp Date</th>
    <th>Hlp Num</th>
    <th>Hlp depart</th>
    <th>Hlp Arrivé</th>
    <th>Hlp Heure dep</th>
    <th>Hlp Heure arr</th>
    <th>Hlp Heure</th>
    <th>Hlp Date</th>
    <th>Hlp Num</th>
    <th>Hlp depart</th>
    <th>Hlp Arrivé</th>
    <th>Hlp Heure dep</th>
    <th>Hlp Heure arr</th>
    <th>Hlp Heure</th>
    <th>Téléphonne</th>
    
<?php

    foreach ($trainPlanning as $p){
        if($p->getBool_info()==0){$info="rouge";}else{$info="vert";} 
?>
    <tr>
        <td><input type="checkbox" name="<?php echo $p->getId_train_planning(); ?>"/></td>
        <td class="<?php echo $info; ?>"><?php echo $p->getPrenom() ;?></td>
        <td class="<?php echo $info; ?>"><?php echo $p->getCode_trajet() ;?></td>
        <td><?php echo $p->getNuit() ;?></td>
        <td><?php echo $p->getAxe() ;?></td>
        <td><?php echo $p->getAnim_num_train() ;?></td>
        <td><?php echo $p->getAnim_num_voiture() ;?></td>
        <td><?php echo date('d/m/Y',$p->getAnim_date()) ;?></td>
        <td><?php echo $p->getAnim_dep() ;?></td>
        <td><?php echo $p->getAnim_arr() ;?></td>
        <td><?php echo date('d/m/Y H:i',$p->getAnim_prise_poste()) ;?></td>
        <td><?php echo date('d/m/Y H:i',$p->getAnim_heure_dep()) ;?></td>
        <td><?php echo date('d/m/Y H:i',$p->getAnim_heure_arr()) ;?></td>
        <td><?php echo date('d/m/Y H:i',$p->getAnim_fin_poste()) ;?></td>
        <td><?php echo $p->getAnim_heure() ;?></td>
        <td><?php if($p->getHlp_dep_date()==0){echo $p->getHlp_dep_date();}else{echo date('d/m/Y',$p->getHlp_dep_date());}?></td>
        <td><?php echo $p->getHlp_dep_num_train() ;?></td>
        <td><?php echo $p->getHlp_dep_dep() ;?></td>
        <td><?php echo $p->getHlp_dep_arr() ;?></td>
        <td><?php if($p->getHlp_dep_heure_dep()==0){echo $p->getHlp_dep_heure_dep();}else{echo date('d/m/Y H:i',$p->getHlp_dep_heure_dep());} ?></td>
        <td><?php if($p->getHlp_dep_heure_arr()==0){echo $p->getHlp_dep_heure_arr();}else{echo date('d/m/Y H:i',$p->getHlp_dep_heure_arr());}?></td>
        <td><?php echo $p->getHlp_dep_heure() ;?></td>
        <td><?php if($p->getHlp_ret_date()==0){echo $p->getHlp_ret_date();}else{echo date('d/m/Y',$p->getHlp_ret_date());} ?></td>
        <td><?php echo $p->getHlp_ret_num_train() ;?></td>
        <td><?php echo $p->getHlp_ret_dep() ;?></td>
        <td><?php echo $p->getHlp_ret_arr() ;?></td>
        <td><?php if($p->getHlp_ret_heure_dep()==0){echo $p->getHlp_ret_heure_dep();}else{echo date('d/m/Y H:i',$p->getHlp_ret_heure_dep()); }?></td>
        <td><?php if($p->getHlp_ret_heure_arr()==0){echo $p->getHlp_ret_heure_arr();}else{echo date('d/m/Y H:i',$p->getHlp_ret_heure_arr());}?></td>
        <td><?php echo $p->getHlp_ret_heure() ;?></td>
        <td class="<?php echo $info; ?>"><?php echo $p->getTel() ;?></td>
        
    </tr>
<?php
    }
?>
</table>
<?php
}
?>





<div id="pop">
    <div id="entete"></div>
    <span id="fermer">Fermer</span>
    <div id="corpPop">zadazd</div>
</div> 
<script>
    $(document).ready(function(){
        $('img').on('click',function(){
             var rel = $(this).attr('rel');
             var id = [];
             var i =0;
             switch (rel){
                 case "retour": $('#name').val("retour");
                                $('#formAction').submit();
                     break; 
                 case "ajout"  : 
                                    $('body').append('<div id="backBlack"></div>');
                                    $("#entete").html('<h2>Modifier l\'animation</h2>');
                                    $("#corpPop").load('./admin/view/train/trainC/ajoutTrain.php');
                                    $('#pop').show(500); 
                                
                        break;
                 case "option"  : $(':checkbox').each(function(){
                                     if($(this).prop('checked') == true){
                                         id.push($(this).attr('name'));
                                         i+=1;
                                     }
                                 });
                                var donnee = {
                                        id:id,
                                 };
                                 if(i==1){
                                    $('body').append('<div id="backBlack"></div>');
                                    $("#entete").html('<h2>Ajouter options</h2>');
                                    $("#corpPop").load('./admin/view/gestion/gestionC/option.php',donnee);
                                    $('#pop').show(500); 
                                }
                        break;
                 case "anim"  : $(':checkbox').each(function(){
                                     if($(this).prop('checked') == true){
                                         id.push($(this).attr('name'));
                                         i+=1;
                                     }
                                 });
                                var donnee = {
                                        id:id,
                                        mois:$('#getMois').val(),
                                        annee:$('#getAnnee').val(),
                                 };
                                 if(i==1){
                                    
                                    $('body').append('<div id="backBlack"></div>');
                                    $("#entete").html('<h2>Ajout Animateur</h2>');
                                    $("#corpPop").load('./admin/view/train/trainC/listeAnim.php',donnee);
                                    $('#pop').show(500); 
                                }
                                break;
                 case "mail"  : $(':checkbox').each(function(){
                                     if($(this).prop('checked') == true){
                                         id.push($(this).attr('name'));
                                         i+=1;
                                     }
                                 });
                                var donnee = {
                                        id:id,
                                        mois:$('#getMois').val(),
                                        annee:$('#getAnnee').val(),
                                 };
                                 if(i>=1){
                                    
                                    $('body').append('<div id="backBlack"></div>');
                                    $("#entete").html('<h2>Ajout Animateur</h2>');
                                    $("#corpPop").load('./admin/view/train/trainC/envoieMail.php',donnee);
                                    $('#pop').show(500); 
                                }
                                break;
                 case "etat"  : $(':checkbox').each(function(){
                                     if($(this).prop('checked') == true){
                                         id.push($(this).attr('name'));
                                         i+=1;
                                     }
                                 });
                                var donnee = {
                                        id:id,
                                 };
                                 if(i>=1){
                                    
                                    $('body').append('<div id="backBlack"></div>');
                                    $("#entete").html('<h2>Ajout Animateur</h2>');
                                    $("#corpPop").load('./admin/view/gestion/gestionC/etat.php',donnee);
                                    $('#pop').show(500); 
                                }
                                break;
                 case "payeTrain"  : 
                                var donnee = {
                                    mois:$('#getMois').val(),
                                    annee:$('#getAnnee').val(),
                                };
                                $('body').append('<div id="backBlack"></div>');
                                $("#entete").html('<h2>Ajout Animateur</h2>');
                                $("#corpPop").load('./admin/view/train/trainC/payeTrain.php',donnee);
                                $('#pop').show(500); 
                                break;
                 case "devis"  : 
                                    $('body').append('<div id="backBlack"></div>');
                                    $("#entete").html('<h2>Ajout Animateur</h2>');
                                    $("#corpPop").load('./admin/view/train/trainC/devisTrain.php',donnee);
                                    $('#pop').show(500); 
                                
                                break; 
                case "planning"  : 
                                    $('body').append('<div id="backBlack"></div>');
                                    $("#entete").html('<h2>Ajout Animateur</h2>');
                                    $("#corpPop").load('./admin/view/train/trainC/planningTrain.php',donnee);
                                    $('#pop').show(500); 
                                
                break;      
                 default :"";
             }
       });
         //****************   Au click sur checkbox ***************
       $('input:checkbox').on('click',function(){
            var i=0;
            $('input:checkbox').each(function(){
                if($(this).prop('checked')==true){
                    i=i+1;
                }
                if(i==0 || i>1){
                    $('.bouton1').css('opacity','0.5');
                    
                }else{
                    $('.bouton1').css('opacity','1');
                }
                
                if(i==0){
                    $('.bouton2').css('opacity','0.5');
                    
                }else{
                    $('.bouton2').css('opacity','1');
                }
            });
       });
      
      
       //****************   Fermer la Pop-up   ******************
       $("#fermer").on('click',function(){
               $("#corpPop").empty();
               $("#backBlack").remove();
               $('#pop').hide(500);
       });
    });
</script>