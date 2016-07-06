<?php if(!isset($_POST['search']) && !isset($_POST['saveParent']) && !isset($_POST['ajoutEvent']) && !isset($_POST['add_option']) && !isset($_POST['addOption']) && !isset($_POST['addAnim'])){ ?>
<div style="width: 100%;text-align: center"><span class="spanForm1">Particulier<input type="radio" name="form" value="part" checked style="margin-left: 15px;"/></span><span class="spanForm1">Pro<input type="radio" name="form" value="pro" style="margin-left: 15px;" /></span></div><br/><br/><br/>
<form action="admin-ajoutEvent.html" method="post" class="form1" id="part">
<span class="spanForm1">Civilité : </span>
<select name="civilite">
    <option value="Mme">
        Mme
    </option>
    <option value="Mr">
        Mr
    </option>
</select>
<br/><br/>
<span class="spanForm1">
    Nom : 
</span>
<input type="text" name="nom_parent"/>
<br/><br/>
<span class="spanForm1">
    Prénom : 
</span>
<input type="text" name="prenom_parent"/> 
<br/><br/>
<span class="spanForm1">
    Adresse :
</span>
<input type="text" name="adresse_parent"/>
<br/><br/>
<span class="spanForm1">
    Code Postal :
</span>
<input type="text" name="zip_parent"/>
<br/><br/>
<span class="spanForm1">
    Ville :
</span>
<input type="text" name="ville_parent"/>
<br/><br/>
<span class="spanForm1">
    Gare :
</span>
<input type="text" name="gare_parent"/>
<br/><br/>
<span class="spanForm1">
    Code :
</span>
<input type="text" name="code_parent"/>
<br/><br/>
<span class="spanForm1">
    Interphonne :
</span>
<input type="text" name="inter_parent"/>
<br/><br/><span class="spanForm1">
    Etage :
</span>
<input type="text" name="etage_parent"/>
<br/><br/>
<span class="spanForm1">
    Tel 1 :
</span>
<input type="text" name="port_parent"/>
<br/><br/>
<span class="spanForm1">
    Tel 2 :
</span>
<input type="text" name="fixe_parent"/>
<br/><br/>
<span class="spanForm1">
    Mail : 
</span>
<input type="text" name="email_parent"/> 
<br/><br/>
<span class="spanForm1">
    Region:
</span>
<span class="spanForm1">Paris<input type="radio" name="region" value="0" checked /></span>
<span class="spanForm1">Lyon<input type="radio" name="region" value="1"  /></span>
<br/><br/>
<input type="text" name="formPart" style="display: none"/>
<input type="text" name="search" style="display: none"/>
<input type="submit" value="Envoyer"/>
</form>

<form action="admin-ajoutEvent.html" method="post" class="form1" id="pro" style="display: none">
<span class="spanForm1">Civilité : </span>
<select name="civilite">
    <option>
        Société
    </option>
</select>
<br/><br/>
<span class="spanForm1">
    Nom de la société : 
</span>
<input type="text" name="nom_parent"/>
<br/><br/>
<span class="spanForm1">
    Nom contact : 
</span>
<input type="text" name="nom_parent"/>
<br/><br/>
<span class="spanForm1">
    Prénom : 
</span>
<input type="text" name="prenom_parent"/> 
<br/><br/>
<span class="spanForm1">
    Adresse :
</span>
<input type="text" name="adresse_parent"/>
<br/><br/>
<span class="spanForm1">
    Code Postal :
</span>
<input type="text" name="zip_parent"/>
<br/><br/>
<span class="spanForm1">
    Ville :
</span>
<input type="text" name="ville_parent"/>
<br/><br/>
<span class="spanForm1">
    Tel 1 :
</span>
<input type="text" name="port_parent"/>
<br/><br/>
<span class="spanForm1">
    Tel 2 :
</span>
<input type="text" name="fixe_parent"/>
<br/><br/>
<span class="spanForm1">
    Mail : 
</span>
<input type="text" name="email_parent"/> 
<br/><br/>
<input type="text" name="formPro" style="display: none"/>
<input type="text" name="search" style="display: none"/>
<input type="submit" value="Envoyer"/>
</form>
<?php }

/*********************   On recherche les parents *******************/
if(isset($_POST['search'])){
?>
<table class="parent1">
    <tr>
        <th>Civilité</th>
        <th>Nom</th>
        <th>Adresse</th>
        <th>Tel</th>
        <th>E-mail</th>
        <th></th>
    </tr>
    <tr>
        <td><?php echo $_POST['civilite'] ?></td>
        <td><?php echo $_POST['nom_parent'] ?></td>
        <td><?php echo $_POST['adresse_parent'].' '.$_POST['zip_parent'].' '.$_POST['ville_parent'] ?></td>
        <td><?php echo $_POST['port_parent'].'<br/>'.$_POST['fixe_parent'] ?></td>
        <td><?php echo $_POST['email_parent'] ?></td>
        <td>
            <form action="admin-ajoutEvent.html" method="post">
                <input type="text" name="saveParent" style="display: none"/>
                <?php
                foreach ($_POST as $key => $value){
                    if($key!='search'){
                        echo '<input type="text" name="'.$key.'" value="'.$value.'" style="display:none"/>';
                    }
                }
                ?>
                <input type="submit" name="enregistrer" value="Enregistrer"/>
            </form>
        </td>
    </tr>
<?php
    if(isset($findParent)){
        foreach ($findParent as $parent){
?>
    <tr>
        <td><?php echo $parent->getCivilite(); ?></td>
        <td><?php echo $parent->getNom_parent(); ?></td>
        <td><?php echo $parent->getAdresse_parent().' '.$parent->getZip_parent().' '.$parent->getVille_parent() ?></td>
        <td><?php echo $parent->getFixe_parent().'<br/>'.$parent->getPort_parent(); ?></td>
        <td><?php echo $parent->getEmail_parent(); ?></td>
        <td>
            <form action="admin-ajoutEvent.html" method="post">
                <input type="text" name="saveParent" style="display: none" value="<?php echo $parent->getId_parent() ?>"/>
                <input type="submit" name="enregistrer" value="Valider"/>
            </form>
        </td>
    </tr>
<?php
        }
    }
?>
</table>
<?php
}

if(isset($_POST['saveParent'])){
?>
    <div style="border: 2px solid #999999;margin-bottom: 15px">
    <span>Fiche parent</span>
<?php
    if(isset($saveParent)){
        foreach ($saveParent as $save){
        
?>
        <table class="parent1">
            <th><?php echo $save->getNom_parent(); ?></th>
            <th><?php echo $save->getPrenom_parent(); ?></th>
            <th><?php echo $save->getAdresse_parent().' '.$save->getZip_parent().' '.$save->getVille_parent(); ?></th>
            <th><?php echo $save->getPort_parent().'<br/>'.$save->getFixe_parent(); ?></th>
            <th><?php echo $save->getEmail_parent(); ?></th>
        </table>
    
<?php
        }
    }
?>
    </div>
    <div style="border: 2px solid #999999;margin-bottom: 15px ">
    <span>Fiche enfant</span>
    <form action="admin-ajoutEvent.html" method="post" id="formEnfant" >
<?php
    if(isset($findEnfant)){
        foreach ($findEnfant as $enfant){
?>
        <table id="enfant" class="parent1">
            <th style="width: 30%"><?php echo $enfant->getPrenom_enfant(); ?></th>
<?php
            $sexe=$enfant->getSexe_enfant();
            if($sexe==0){
                $s="Garcon";
            }else{
                $s="Fille";
            }
?>
            <th style="width: 30%"><?php echo $s; ?></th>
            <th style="width: 30%"><?php echo outils::age(date('Y',$enfant->getDate_naissance()),date('m',$enfant->getDate_naissance()),date('j',$enfant->getDate_naissance())).' ans'; ?></th>
            <th style="width: 10%"><input type="checkbox" name="enfant[]" value="<?php echo $enfant->getId_enfant(); ?>"/></th>
            <input type="text" name="ajoutIdParent" id="ajoutIdParent" value="<?php echo $saveParent[0]->getId_parent(); ?>" style="display: none"/>
        </table>
<?php
        }
?>
        
<?php
    }
?>
        <span id="newEnfant"></span>
        <span style="margin-left: 25%;margin-right: 25px">
        Chercher com :
        </span>
        <span style="margin-right: 35px">Non<input type="radio" name="chercher" value="0" checked style="margin-left: 15px;"/></span>
        <span>Oui<input type="radio" name="chercher" value="1"  style="margin-left: 15px;"/></span>
        <br/><br/>
        <br/><input type="submit" value="Valider" style="margin-left:35%;display: inline-block;width: 30%"/><br/><br/><br/>
        <input type="text" name="ajoutIdParent" id="ajoutIdParent" value="<?php echo $saveParent[0]->getId_parent(); ?>" style="display: none" />
        <input type="text" name="ajoutEvent" value="ajoutEvent" style="display: none"/>
        <input type="text" name="region" id="region" value="<?php echo $_POST['region'] ?>" style="display: none"/>
        </form>
    </div>

    <div style="border: 2px solid #999999;margin-bottom: 15px ">
<span>Ajout Enfant</span><br/><br/>
        <form method="" action="" class="form1" id="ajoutEnfant">
            <span class="spanForm1">Prenom :</span>
            <input type="text" name="ajoutEnfant" id="ajoutPrenom"/><br/><br/>
            <span class="spanForm1">Sexe :</span>
            <select name="ajoutSexe" id="ajoutSexe">
                <option value="0">Garcon</option>
                <option value="1">Fille</option>
            </select><br/><br/>
            <span class="spanForm1" >Date de naissance</span><input type="text" name="ajoutNaissance" id="ajoutDate" value="<?php echo date('d-m-Y'); ?>"/><br/><br/>
            <input type="text" name="ajoutIdParent" id="ajoutIdParent" value="<?php echo $saveParent[0]->getId_parent(); ?>" style="display: none"/>
            <input type="submit" value="Enregistrer" id="enregistrerEnfant"/><br/><br/><br/>
        </form>
    </div>

<?php
}
if(isset($_POST['ajoutEvent'])){
     
?>
    <div style="border: 2px solid #999999;margin-bottom: 15px ">
        <span>Ajout Event</span><br/><br/>
        <form  action="admin-ajoutEvent.html" method="post" class="form1">
            <span class="spanForm1">Les animations :</span>
            <select name="animation">
<?php
            if(isset($animation)){
                foreach ($animation as $anim){
                    echo '<option value="'.$anim->getId_animation().'">'.$anim->getNom_animation().'</option>';
                }
            }
?>
            </select><br/><br/>
            <span class="spanForm1">Demi Heure :</span>
            <select name="demiHeure">
                <option value="0">Aucun</option>
<?php
            $i=1;
            $j=0;
            $z=0;
            while($i<=12){
                if($z==0){
                    echo '<option value="'.$i.'">'.round($j/60).'H 30 mn</option>';
                    $z=1;
                }else{
                    echo '<option value="'.$i.'">'.round($j/60).'H 00 mn</option>';
                    $z=0;
                }
                $i++;$j+=30;
            }
?>
            </select><br/><br>
            <span class="spanForm1">Date : </span>
            <input type="text" name="date_event" value="<?php echo date('d-m-Y'); ?>"/><br/><br/>
            <span class="spanForm1">Heure : </span>
            <input type="text" name="date_heure" value="<?php echo date('H:i'); ?>"/><br/><br/>
            <span class="spanForm1">Nb enfants</span>
            <select name="nb_enfant">
                <?php
                $i=0;
                while ($i<50){
                    if($i==12){
                        echo '<option value="'.$i.'" selected>'.$i.'</option>'; 
                    }else{
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                   $i++;
                }
                ?>
            </select><br/><br/>
            <span class="spanForm1">Frais Transport </span>
            <input type="text" name="frais_transport" value="0"/><br/><br/>
            <input type="text" name="num_devis" value="<?php echo $numDevis+1; ?>" style="display: none"/>
            <span class="spanForm1">Commentaire</span><textarea name="commentaire"></textarea><br/><br/>
            <?php
                if(isset($_POST['enfant'])){
                    foreach ($_POST['enfant'] as $p){
                        echo '<input type="checkbox" name="enfant[]" checked value="'.$p.'" style="display:none" />';
                    }
                }
            ?>
            <input type="text" name="add_option" value="add_option" style="display: none"/>
            <input type="text" name="chercher" value="<?php echo $_POST['chercher']; ?>" style="display:none"/>
            <input type="text" name="region" id="region" value="<?php echo $_POST['region'] ?>" style="display: none"/>
            <input type="text" name="ajoutIdParent" id="ajoutIdParent" value="<?php echo $_POST['ajoutIdParent']; ?>" style="display:none "/>
            <input type="submit" value="Enregistrer"/><br/><br/>
        </form>
    </div>
<?php
}
if(isset($_POST['add_option'])){
    
       if(isset($findOption)){
?>
<form action="admin-ajoutEvent.html" method="post">
    <table class="parent">
        <tr>
            <th style="width: 45%">Options</th>
            <th>Prix (€/%)</th>
            <th>Quantité</th>
            <th>Offert</th>
        </tr>
    <?php
            $i=0;
            foreach ($findOption as $f){
                if($i%3==0 && $i!=0){
                    echo '<tr><th colspan="10"><input type="submit" value"Save"/></th></tr>';
                }
    ?>      
        <tr>
            <td><?php echo $f->GetNoms_option(); ?></td>
            <td><?php echo $f->getPrix_opt(); ?> €</td>
            <td>
                <input type="text" name="nb_option<?php echo $i ;?>" 
                <?php
                if(isset($clientOption)){
                    foreach ($clientOption as $cli){
                        if($f->getId_options()==$cli->getOption_id()){
                            echo 'value="'.$cli->getNb_client_opt().'"';
                        }
                    }
                }
                ?>       
                />
            </td>
            <td><input type="checkbox" name="offert<?php echo $i ;?>"/></td>
            <input type="text" name="id_option<?php echo $i ;?>" value="<?php echo $f->getId_options() ?>" style="display:none"/>
        </tr>
    <?php
            $i++;}
    ?>
            <input type="text" value="<?php echo $i ?>" name="nombre" style="display: none"/>
            <input type="text" value="<?php echo $saveEvent[0]->getId_event(); ?>" name="event_id" style="display: none"/>
            <input type="text" value="" name="addOption" style="display: none"/>
        </table>
    </form>
    <?php
        }
    ?>
<?php    
}
if(isset($_POST['addOption'])){
?>
<table class="parent">
    <tr>
        <th colspan="4">La commande</th>
    </tr>
    <tr>
        <th>Nom</th>
        <th>Quantité</th>
        <th>Prix unitaire</th>
        <th>Prix TTC</th>
    </tr>
<?php
    foreach ($planning as $t){
       $t->getFindOption($db);
       $t->getFindOldOption($db);
       $t->setNew_enfant($db);
?>
    <tr>
        <td>
            <?php echo $t->getNom_animation(); ?><br/>
            Pour <?php echo $t->getNb_enfant_animation(); ?> enfants <br/>
            <?php echo outils::convertSemaine(date('N',$t->getDate_heure())), date('d/m/Y H:i:s',$t->getDate_heure()); ?>
        </td>
        <td>1</td>
        <td><?php echo$t->getTarif_animation(); ?> €</td>
        <td><?php echo$t->getTarif_animation(); ?> €</td>
    </tr>
    <?php 
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
                    <?php } ?>
                      <?php 
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
                    <?php } ?>
    
    <tr>
        <th colspan="4">
            <?php if($t->getCountOption()>0){echo 'Les options';} ?>
        </th>
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
                                    }else{
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
                                }
                            }     
?>
    <tr>
        <th colspan="4">Frais de transport</th>
    </tr>
    <tr>
        <td>Frais de transport</td>
        <td><?php echo $t->getFrais_transport(); ?> €</td>
        <td><?php echo $t->getFrais_transport(); ?> €</td>
        <td><?php echo $t->getFrais_transport(); ?> €</td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <th>Total TTC</th>
        <th><?php echo $t->getTarif_tot(); ?> €</th>
    </tr>
    <tr><th colspan="4"></th></tr>
    <tr>
        <td colspan="2">
            <form method="post" action="admin-ajoutEvent.html">
                <input type="text" name="addAnim" style="display: none"/>
                <input type="text" name="event_id" value="<?php echo $_POST['event_id']; ?>" style="display: none"/>
                <input type="submit" name="action" value="Sauvegarder "/>
            </form>
        </td>
        <td colspan="2">
            <form method="post" action="admin-ajoutEvent.html">
                <input type="text" name="addAnim" style="display: none"/>
                <input type="text" name="event_id" value="<?php echo $_POST['event_id']; ?>" style="display: none"/>
                <input type="submit" name="action" value="Sauvegarder et envoie du devis"/>
            </form>
        </td>
    </tr>
<?php
    }
?>
</table>
<?php
}
if(isset($_POST['addAnim'])){
           //***************    On recupère les animateurs disponible *************
       $model=  Model::load("ClientEventM");
       $d=array(
           "conditions"=>"id_event=".$_POST['event_id']
       );
       $anim=$model->find($d,$db);
       if(isset($anim)){
           $date=$anim[0]->getDate_calendar();
           $date2=$date-43200;
           
       } 
       $model=  Model::load("ClientParentM");
       $d=array(
               "table"=>"client_enfant,client_parent",
               "conditions"=>"id_parent=".$anim[0]->getNew_parent_id()." AND parent_id = id_parent"
                );
       $parent=$model->find($d,$db);
       $model=  Model::load("UsersM");
       $d=array(
           "table"=>"admin_users,admin_planning,admin_planning_anim",
           "fields"=>"prenom",
           "conditions"=>"admin_planning_anim.users_id=id_users AND planning_id=id_planning  AND (date_planning=$date OR date_planning=$date2) AND (dispo=1 OR dispo=2)", 
           );
       $findAnim=$model->find($d,$db);
       
       //****************   On calcule la distance entre chaque animateur et le lieu de l'event   ***********************
       ?>
       <form action="admin-gestion.html" method="post">
                <table class="parent1">
                    <tr>
                        <th>Animateurs</th>
                        <th>Nb kilomètre</th>
                        <th>Participant à l'animation</th>
                    </tr>
       <?php
       if(isset($findAnim)){
           $prenom="";
           foreach ($findAnim as $an){
               $prenom.="'".$an->getPrenom()."',";
           }
           $prenom=  substr($prenom,0,-1);
              $d=array(
                 "table"=>"admin_users,admin_planning_anim,admin_planning",
                 "fields"=>"*,get_distance_metres(".$parent[0]->getLatitude_parent().",".$parent[0]->getLongitude_parent().",latitude_anim,longitude_anim) AS distance",
                 "conditions"=>"prenom IN($prenom) AND admin_planning_anim.users_id=id_users AND (date_planning=$date OR date_planning=$date2) AND id_planning=planning_id"
              );
              
// ***********    On affiche les anim dispo  *************
              $km=$model->find($d,$db);
              ?>
                
                
              <?php
              if(isset($km)){
                  $i=0;
                  foreach ($km as $k){
                      $model=  Model::load("ClientAnimateurM");
                      $d=array(
                          "conditions"=>"users_id=".$k->getId_users()." AND event_id=".$_POST['event_id']." AND bool_client_anim=0"
                      );
                              $bool=$model->find($d,$db);
                      ?>
                    <tr>
                        <td><?php echo $k->getPrenom();  ?></td>
                        <td><?php echo round(($k->getDistance()/1000)); ?> Km</td>
                        <?php if(isset($bool)){$checked="checked";$value=1;}else{$checked="";$value=2;} ?>
                        <td><input type="checkbox" name="placement<?php echo $i ?>" value="1" <?php echo $checked; ?>/></td>
                    <input type="text" value="<?php echo $value ?>" name="update<?php echo $i; ?>" style="display: none"/>
                        <input type="text" value="<?php echo $k->getId_users() ?>" name="idUsers<?php echo $i; ?>" style="display: none"/>
                    </tr>
                      
                      <?php
                      
                 $i++; }
              }
       }else{
           
       }
?>
                </table>
                    <input type="text" value="<?php echo $_POST['event_id']; ?>" name="idEvent" style="display: none"/>
                    <input type="text" value="<?php echo $i; ?>" name="compte" style="display: none"/>
                    <input type="submit">
                </form>



<?php
}
?>
<script>
    $(document).ready(function(){
        $('input:radio').on('click',function(){
            if($(this).val()=="pro"){
                $('#part').css('display','none');
                $('#pro').css('display','block');
            }else{
                $('#part').css('display','block');
                $('#pro').css('display','none');
            }
        });
        
        // On ajoute des enfants
        $('#ajoutEnfant').submit(function(e){
            e.preventDefault();
                var donnee ={
                     prenom_enfant : $('#ajoutPrenom').val(),
                     sexe_enfant : $('#ajoutSexe').val(),
                     date_naissance : $('#ajoutDate').val(),
                     parent_id : $('#ajoutIdParent').val()
                };
                $.ajax({
                type    : 'POST',
                url     : './admin/view/ajoutEvent/ajoutEventC/ajoutEnfant.php',
                async	: false,	
                data    : donnee,
                dataType: "json",  
                timeout: 1000,
                success: function(data) {
                        if(data.retour==1){
                          
                            $('#newEnfant').append('<table id="enfant" class="parent1">\n\
                                                    <th style="width: 30%">'+data.prenom_enfant+'</th>\n\
                                                    <th style="width: 30%">'+data.sexe_enfant+'</th>\n\
                                                    <th style="width: 30%">'+data.date_enfant+' ans</th>\n\
                                                    <th style="width: 10%"><input type="checkbox" name="enfant[]" value="'+data.id_enfant+'"/></th>\n\
                                                    </table>');
                                                        
                        }else{
                            
                        }
                },
                error: function(request, error) { // Info Debuggage si erreur         
                       alert("Erreur : responseText: "+request.responseText);
                },
                }); 
        });
        
        //***************   On séléctionne des enfants      *******//
        $('#formEnfant').submit(function(){
             
             var check=$(this).find('input:checkbox');
             var i=0;
             $(check).each(function(){
                 if($(this).prop('checked')==true){
                     i+=1;
                 }
             });
             if(i>=1){
                 return true;
                 $(this).submit();
             }else{
                 return false;
             }
        });
    });
</script>