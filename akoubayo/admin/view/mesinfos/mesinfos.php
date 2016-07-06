
<h2 style="margin-top:0px;">Mes infos personnelles</h2>
<hr/>
<form method="post" action="admin-mesinfos.html">
<span class="info1">Mon nom :</span>
<span class="info2"><?php echo $info[0]->getNom(); ?></span>
<span class="info3"><input type="button" value="modifier" rel="nom"/></span>
<br/><hr/>

<span class="info1">Mon prénom :</span>
<span class="info2"><?php echo $info[0]->getPrenom(); ?></span>
<span class="info3"><input type="button" value="modifier" rel="prenom"/></span>
<br/><hr/>

<span class="info1">Mon mail :</span>
<span class="info2"><?php echo $info[0]->getMail(); ?></span>
<span class="info3"><input type="button" value="modifier" rel="mail"/></span>
<br/><hr/>

<span class="info1">Mon téléphone fixe :</span>
<span class="info2"><?php echo '0'.$info[0]->getTel_fixe(); ?></span>
<span class="info3"><input type="button" value="modifier" rel="tel_fixe"/></span>
<br/><hr/>

<span class="info1">Mon téléphone portable :</span>
<span class="info2"><?php echo '0'.$info[0]->getTel_Portable(); ?></span>
<span class="info3"><input type="button" value="modifier" rel="tel_portable"/></span>
<br/><hr/>

<span class="info1">Mon adresse :</span>
<span class="info2"><?php echo $info[0]->getAdresse(); ?></span>
<span class="info3"><input type="button" value="modifier" rel="adresse"/></span>
<br/><hr/>

<span class="info1">Mon code postale :</span>
<span class="info2"><?php echo $info[0]->getZip(); ?></span>
<span class="info3"><input type="button" value="modifier" rel="zip"/></span>
<br/><hr/>

<span class="info1">Ma ville :</span>
<span class="info2"><?php echo $info[0]->getVille(); ?></span>
<span class="info3"><input type="button" value="modifier" rel="ville"/></span>
<br/><hr/>

<span class="info1">Ma date de naissance :</span>
<span class="info2"><?php echo $info[0]->getDate_naissance(); ?></span>
<span class="info3"><input type="button" value="modifier" rel="date_naissance"/></span>
<br/><hr/>

<span class="info1">Mon Numéro de sécu social :</span>
<span class="info2"><?php echo $info[0]->getNum_secu(); ?></span>
<span class="info3"><input type="button" value="modifier" rel="num_secu"/></span>
<br/><hr/>

<span class="info1">Ma ville de naissance :</span>
<span class="info2"><?php echo $info[0]->getVille_naissance(); ?></span>
<span class="info3"><input type="button" value="modifier" rel="ville_naissance"/></span>
<br/><hr/>

<span class="info1">Mon code postal de naissance :</span>
<span class="info2"><?php echo $info[0]->getDpt_naissance(); ?></span>
<span class="info3"><input type="button" value="modifier" rel="dpt_naissance"/></span>
<br/><hr/>
</form>

<script>
    $(document).ready(function(){
       $(function(){
           function testChaine(valeur){
               if(/^[0-9 ]+$/.test(valeur)){
                return valeur;
               }else if(valeur.length>1){
                    valeur=valeur.substr(0,valeur.length-1);
                    valeur=testChaine(valeur);
                    return valeur;
               }
       }
       function testDate(valeur){
               if(/^[0-9]{0,2}[ -_/]{0,1}[0-9]{0,2}[ -_/]{0,1}[0-9]{0,4}$/.test(valeur)){
                  return valeur;
               }else if(valeur.length>2){
                    valeur=valeur.substr(0,valeur.length-1);
                    valeur=testDate(valeur);
                    return valeur;
               }
       }
           $('body').on('focus click keyup','input[type="text"]',function(){
                var valeur=$(this).val();
                var attr=$(this).attr('name');
                if(attr=="tel_portable" || attr=="tel_fixe" || attr=="tel_portable" || attr=="num_secu" || attr=="zip" || attr=="dpt_naissance"){
                    valeur=testChaine(valeur);
                }else if(attr=="date_naissance"){
                    valeur=testDate(valeur);
                }
                $(this).val(valeur);
            });
       });
       $('input[value="modifier"]').on('click',function(){
          var rel=$(this).attr('rel');
          var text=$(this).parent().prev().html();
          
          $(this).parent().prev().html('<input type="text" name="'+rel+'" value="'+text+'"/><input type="text" name="modif" hidden/>');
          if(rel=="tel_portable" || rel=="tel_fixe" || rel=="tel_portable" || rel=="num_secu" || rel=="zip" || rel=="dpt_naissance"){
             $(this).parent().html('<input type="submit" value="envoyer"/><span style="color:red;margin-left:15px">* 0 à 9 et espace autorisé !</span>');
          }else if(rel=="date_naissance"){
             $(this).parent().html('<input type="submit" value="envoyer"/><span style="color:red;margin-left:15px">* Format dd/mm/YYYY !</span>');
          }else{
             $(this).parent().html('<input type="submit" value="envoyer"/>');
          }
       });
       
       
    });
</script>