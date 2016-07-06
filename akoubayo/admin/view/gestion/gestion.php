<div class="divBouton">
    <?php
    if(isset($_GET['r'])&&isset($_GET['s'])){
        echo '<input type="text" value="'.$_GET['r'].'" id="getMois" style="display:none" />';
        echo '<input type="text" value="'.$_GET['s'].'" id="getAnnee" style="display:none" />';
    }else{
        echo '<input type="text" value="'.date('m').'" id="getMois" style="display:none" />';
        echo '<input type="text" value="'.date('Y').'" id="getAnnee" style="display:none" />';
    }
    ?>
    
    <table>
        <tr>
            <td><a href="admin-planningE.html"><img src="./webroot/image/icones/retour.png" rel="retour"/></a><br/>Planning</td>
            <td class="bouton1"><img src="./webroot/image/icones/Edit.png" rel="edit" /><br/> Editer</td>
            <td class="bouton1"><img src="./webroot/image/icones/Add.png" rel="option" /><br/> Options</td>
            <td class="bouton1"><img src="./webroot/image/icones/Add.png" rel="anim" /><br/> Animateur</td>
            <td class="bouton2"><img src="./webroot/image/icones/Mails.png" rel="mail" /><br/>Mails</td>
            <td class="bouton2"><img src="./webroot/image/icones/SendFile.png" rel="etat" /><br/>Etat</td>
            <td class="bouton2"><img src="./webroot/image/icones/Del.png" rel="sup" /><br/>Supprimer</td>
            <td><img src="./webroot/image/icones/Stats.png" rel="paye" /><br/>Paye Anim</td>
        </tr>
    </table>
</div>
<?php $month=  date("m");?>
<form method="post" action="admin-gestion.html">
<select name="dateGestion">
    <option value="01" <?php if($month==1){echo "selected";} ?> >Janvier</option>
    <option value="02" <?php if($month==2){echo "selected";} ?>>Fevrier</option>
    <option value="03" <?php if($month==3){echo "selected";} ?>>Mars</option>
    <option value="04" <?php if($month==4){echo "selected";} ?>>Avril</option>
    <option value="05" <?php if($month==5){echo "selected";} ?>>Mai</option>
    <option value="06" <?php if($month==6){echo "selected";} ?>>Juin</option>
    <option value="07" <?php if($month==7){echo "selected";} ?>>Juillet</option>
    <option value="08" <?php if($month==8){echo "selected";} ?>>Aout</option>
    <option value="09" <?php if($month==9){echo "selected";} ?>>Septembre</option>
    <option value="10" <?php if($month==10){echo "selected";} ?>>Octobre</option>
    <option value="11" <?php if($month==11){echo "selected";} ?>>Novembre</option>
    <option value="12" <?php if($month==12){echo "selected";} ?>>Décembre</option>
</select>
<input type="text" name="anneeGestion" value="<?php echo date('Y'); ?>"/>
<input type="submit" value="valider"/>
</form>
<?php
    if(isset($_GET['s'])){
        $getS=  explode("-", $_GET['s']);
        if($getS[0]=="mail"){
            foreach ($getS as $key =>$value){
                if($key!=0){
                    echo '<span style="color:red"><strong>Mail envoyé à : '.$value.'</strong></span><br/>';
                }
            }
        }
    }
?>
<?php
if(isset($planning)){
    $nbAnim=  count($planning);
    ?><table class="parent">
       <tr>
           <th>ID</th>
           <th>Durée</th>
           <th>Date</th>
           <th>Enfants</th>
           <th>Nb km</th>
           <th>tarif</th>
           <th>Anim et Enfant</th>
           <th>total</th>
           <th>Nb option</th>
           <th>Animateurs</th>
           <th>Num Devis</th>
           <th>Num Fac</th>
           <th><input type="checkbox"/></th>
           <th><?php echo $nbAnim; ?></th>
       </tr>
   <?php
   
    foreach ($planning as $t){
       $t->getFindOption($db);
       $t->getFindOldOption($db);
       $t->setNew_enfant($db);
       
        
      
        
        ?>
       <tr>
           <td><?php echo $t->getId_event(); ?></td>
           <td><?php echo $t->getDuree_animation(); ?></td>
           <td><?php echo outils::convertSemaine(date('N',$t->getDate_heure())), date('d/m/Y H:i:s',$t->getDate_heure()); ?></td>
           <td><?php echo $t->getNom_parent(); ?></td>
           <td>Nb km</td>
           <td><?php echo $t->getTarif_animation(); ?></td>
           <td><?php echo $t->getNom_animation(); ?></td>
           <td><?php echo $t->getTarif_tot(); ?></td>
           <td><?php echo $t->getCountOldOption(); ?></td>
           <?php if($t->getBool_info()==0){$anim="rouge";}else{$anim="vert";} ?>
           <td class="<?php echo $anim; ?>">
               <?php $anim=$t->getAnimateur($db);if($anim==0){echo "AUCUN";}else{
                        foreach ($anim as $an){
                                echo $an->getPrenom().'<br/>';
                        } 
               }?>
           </td>
           <?php if($t->getBool_devis()==0){$anim="rouge";}else{$anim="vert";} ?>
           <td class="<?php echo $anim; ?>"><?php echo $t->getNum_devis(); ?></td>
             <?php if($t->getBool_facture()==0){$anim="rouge";}else{$anim="vert";} ?>
           <td class="<?php echo $anim ?>"><?php $numFac=$t->getnum_facture(); if(!empty($numFac)){echo '<span class="impFac" rel="'.$t->getId_event().'">'.$t->getnum_facture().'</span>';}else{echo "Aucun";} ?></td>
           <?php 
                $etat=$t->getEtat();
                switch ($etat){
                    case 1:$eta="rouge";
                        break;
                    case 2:$eta="bleu";
                        break;
                    case 3:$eta="vert";
                        break;
                    case 4:$eta="jaune";
                        break;
                    case 5:$eta="noir";
                        break;
                    default :$eta="rouge";
                }
           ?>
           <td id="<?php echo $eta; ?>"><input type="checkbox" name="<?php echo $t->getId_event(); ?>"/></td>
           <td class="agr">+</td>
       </tr>
       <tr class="add" style="display: none;" > 
           <td colspan="14" style="background-color: black;">
               <table class="parent1">
                    <tr>
                        <th colspan="10">Les animateurs</th>
                    </tr>
                    <tr>
                        <td colspan="10">
                             <?php $anim=$t->getAnimateur($db);if($anim==0){echo "AUCUN";}else{
                                    foreach ($anim as $an){
                                            echo $an->getPrenom().'<br/>';
                                    } 
                             }?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="10">Information sur l'animation</th>
                    </tr>
                    <tr>
                        <td><?php echo $t->getNom_parent() ; ?></td>
                        <td><?php echo $t->getAdresse_parent().' '.$t->getZip_parent().' '.$t->getVille_parent() ; ?></td>
                        <td><?php echo $t->getPort_parent() .'<br/>'.$t->getFixe_parent(); ?></td>
                        <td><?php echo $t->getEmail_parent() ; ?></td>
                    </tr>
                    <tr>
                        <?php 
                            $enfant=$t->getNew_enfant();
                            if($enfant==0){
                        ?>
                        <td><?php echo $t->getSexe_enfant() ; ?></td>
                        <td><?php echo $t->getPrenom_enfant() ; ?></td>
                        <td colspan="2"><?php echo $t->getDate_naissance().' ans' ; ?></td>
                        <?php }else{ ?>
                        <td>
                        <?php
                        foreach ($enfant as $e){
                            if($e->getSexe_enfant()==0){
                                echo 'Garcon<br/>';
                            }else{
                                echo 'Fille<br/>';
                            }
                        }
                        ?>
                        </td>
                        <td>
                        <?php
                        foreach ($enfant as $e){
                            echo $e->getPrenom_enfant().'</br>';
                        }
                        ?>
                        </td>
                        <td colspan="2">
                            <?php 
                            foreach ($enfant as $e){
                                echo outils::age(date('Y',$e->getDate_naissance()),date('m',$e->getDate_naissance()),date('j',$e->getDate_naissance())).' ans<br/>';
                            }
                            ?>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php $comment=$t->getComment_event(); if(!empty($comment)){ ?>
                    <tr>
                        <td colspan="10"><?php echo $t->getComment_event(); ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="10">
                            Devis n°<?php echo $t->getNum_devis(); ?>. Commande enregistrée le <?php echo $t->getDate_devis() ?>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Info
                        </th>
                        <th>
                            Quantité
                        </th>
                        <th>
                            Prix unitaire
                        </th>
                        <th >
                            Prix TTC
                        </th>
                    </tr>
                    <tr>
                        <td><?php echo $t->getNom_animation().'<br/>Pour '.$t->getNb_enfant_animation().' enfants<br/> Le '.outils::convertSemaineFull(date('N',$t->getDate_heure())).' '. date('d/m/Y à H:i',$t->getDate_heure()) ; ?></td>
                        <td>1</td>
                        <td><?php echo $t->getTarif_animation().' €' ?></td>
                        <td><?php echo $t->getTarif_animation().' €' ?></td>
                    </tr>
                    <?php
                    if($t->getCountOption()>0){
                    ?>
                           <?php
                                foreach ($t->getOption() as $old){
                                    if($old->getType_option()==1){
                                        $type='€';
                                        if($old->getType_option()==1){$type='%';}
                                        echo '<tr>';
                                        echo '<td>'.$old->getNoms_option().'</td>';
                                        echo '<td>'.$old->getNb_client_opt().'</td>';
                                        echo '<td>'.$old->getPrix_opt().' '.$type.' </td>';
                                        if($old->getOffert_client_opt()=="offert"){
                                            echo '<td>Offert</td>';
                                        }else{
                                            echo '<td>'.(($t->getTarif_animation()*($old->getPrix_opt()*$old->getNb_client_opt()))/100).' €</td>';
                                        }
                                        echo '</tr>';
                                    }
                                }
                           ?>
                    
                    <?php }
                    if($t->getNb_demi_heure()>=1){
                    ?>
                    <tr>
                        <td>
                            <?php echo $t->getNb_demi_heure().' demi heure supplémentaire'; ?>
                        </td>
                        <td>
                            <?php echo $t->getNb_demi_heure();?>
                        </td>
                        <td>
                            <?php echo $t->getTarif_demi_heure().' €';?>
                        </td>
                        <td>
                            <?php echo  $t->getNb_demi_heure()*$t->getTarif_demi_heure().' €';?>
                        </td>
                    </tr>
                    <?php }
                    if($t->getNb_enfant()>$t->getNb_enfant_animation()){
                    ?>
                    <tr>
                        <td>
                            <?php echo $t->getNb_enfant().' enfants'; ?>
                        </td>
                        <td>
                            <?php echo $t->getNb_enfant();?>
                        </td>
                        <td>
                            <?php echo $t->getPrix_enfant_animation().' €';?>
                        </td>
                        <td>
                            <?php echo  ($t->getNb_enfant()-$t->getNb_enfant_animation())*$t->getPrix_enfant_animation().' €';?>
                        </td>
                    </tr>
                    <?php }
                    if($t->getFrais_transport()>=0){
                    ?>
                    <tr>
                        <td>
                           Frais de transport
                        </td>
                        <td>
                           1
                        </td>
                        <td>
                            <?php echo $t->getFrais_transport().' €';?>
                        </td>
                        <td>
                            <?php echo  $t->getFrais_transport().' €';?>
                        </td>
                    </tr>
                    <?php }
                    if($t->getCountOldOption()>0){
                    ?>
                   
                           <?php
                                foreach ($t->getOldOption() as $old){
                                    echo '<tr>';
                                    echo '<td>'.$old->getNom_old_opt().'</td>';
                                    echo '<td>'.$old->getQuantite_client_old().'</td>';
                                    echo '<td>'.$old->getPrix_old_opt().' €</td>';
                                    echo '<td>'.$old->getPrix_old_opt()*$old->getQuantite_client_old().' €</td>';
                                    echo '</tr>';
                                }
                           ?>
                    
                    <?php }
                    if($t->getCountOption()>0){
                    ?>
                           <?php
                                foreach ($t->getOption() as $old){
                                    if($old->getType_option()==0){
                                        $type='€';
                                        if($old->getType_option()==1){$type='%';}
                                        echo '<tr>';
                                        echo '<td>'.$old->getNoms_option().'</td>';
                                        echo '<td>'.$old->getNb_client_opt().'</td>';
                                        echo '<td>'.$old->getPrix_opt().' '.$type.' </td>';
                                        if($old->getOffert_client_opt()=="offert"){
                                            echo '<td>Offert</td>';
                                        }else{
                                            echo '<td>'.$old->getPrix_opt()*$old->getNb_client_opt().' '.$type.'</td>';
                                        }
                                        echo '</tr>';
                                    }
                                }
                           ?>
                    
                    <?php }  
 
                    ?>
                    <tr>
                        <th colspan="4"></th>
                    </tr>
                    <tr>
                        <td colspan="3">TOTAL</td>
                        <td><?php echo $t->getTarif_tot().' €'; ?></td>
                    </tr>
                </table>
            </td>
            
       </tr>
        <?php
    }
   ?></table><?php
}

?>

<div id="pop">
    <div id="entete"></div>
    <span id="fermer">Fermer</span>
    <div id="corpPop">zadazd</div>
</div> 
<!-- <form target='_blank' action="admin-gestion.html" method="post" id="formFac">
    <input type="text" name="impFac" value="1"/>
    <input id="numFac" type="text" name="idEvent0"/>
    <input type="text" name="action" value="fac"/>
    <input type="text" name="compte" value="1"/>
</form> 
-->
<script>
    $(document).ready(function(){
       //**************  Tous sélectionner   *******************
       $('body').on('click','.agr',function(){
          var display = $(this).parent().next('tr').css('display');
          $('.add').hide(50);
          if(display=="none"){
                 $(this).parent().next('tr').slideDown(2000);
          } 
       });
      //****************  Action sur les boutons *************** 
       $('img').on('click',function(){
             var rel = $(this).attr('rel');
             var id = [];
             var i =0;
             switch (rel){
                 case "retour": $('#name').val("retour");
                                $('#formAction').submit();
                     break; 
                 case "edit"  : $(':checkbox').each(function(){
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
                                    $("#entete").html('<h2>Modifier l\'animation</h2>');
                                    $("#corpPop").load('./admin/view/gestion/gestionC/modif.php',donnee);
                                    $('#pop').show(500); 
                                }
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
                                    $("#corpPop").load('./admin/view/gestion/gestionC/listeAnim.php',donnee);
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
                                    $("#corpPop").load('./admin/view/gestion/gestionC/envoieMail.php',donnee);
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
                 case "paye"  : 
                                var donnee = {
                                    mois:$('#getMois').val(),
                                    annee:$('#getAnnee').val(),
                                };
                                $('body').append('<div id="backBlack"></div>');
                                $("#entete").html('<h2>Ajout Animateur</h2>');
                                $("#corpPop").load('./admin/view/gestion/gestionC/paye.php',donnee);
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
       //****************   On affiche la facture ***************
       $('.impFac').on('click',function(e){
           e.stopPropagation();
           $('#numFac').val($(this).attr('rel'));
           $('#formFac').submit();
       });
    
    });
</script>    