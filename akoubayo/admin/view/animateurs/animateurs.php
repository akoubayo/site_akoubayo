<span class="menu"><a href="admin-animateurs_ajout.html">Ajout Anim</a></span>
<span class="menu"><a href="" rel="modif">Modif anim</a></span>
<span class="menu"><a href="" rel="bloquer">Bloquer anim</a></span>
<span class="menu"><a href="" rel="pass">MDP Anim</a></span>
<span class="menu"><a href="admin-animateurs_ecxel.html" rel="ecxel">Ecxel anim</a></span>
<span class="menu"><a href="admin-animateurs_mail.html" rel="mail">Mail anim</a></span>
<?php
    if(!isset($_GET['r'])){
?>
<form  method="post" id="form">
    <table class="parent">
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Tel</th>
            <th>Email</th>
            <th>Statut</th>
            <th>Droit</th>
            <th><input type="checkbox" value="all" id="all"/></th>
            <th>+</th>

        </tr>
        <?php
        if(isset($animateur)){
            foreach ($animateur as $anim){ ?>
        <?php $visible=$anim->getVisible(); if($visible==0){$class='class="rouge"';}else{$class="";} ?>
        <tr <?php echo $class ?> class="test">
            <td><?php echo $anim->getNom(); ?></td>
            <td><?php echo $anim->getPrenom(); ?></td>
            <td><?php echo $anim->getAdresse().' '.$anim->getZip().' '.$anim->getVille(); ?></td>
            <td><?php echo '0'.$anim->getTel_portable().'<br/>'.$anim->getTel_fixe(); ?></td>
            <td><?php echo $anim->getMail(); ?></td>
            <td><?php echo $anim->getNomStatut(); ?></td>
            <td><?php echo $anim->getDroit(); ?></td>
            <td><input type="checkbox" name="<?php echo $anim->getId_users() ?>"/></td>
            <td class="agr">+</td>
        </tr>
        <tr class="add" style=""> 
           <td colspan="9" style="background-color: black;">
               <table style="width: 100%;background-color: white;margin-bottom: 10px;margin-top: 10px">
                   <tr>
                       <th>Num secu</th>
                       <th>Dpt Naissance</th>
                       <th>Ville Naissance</th>
                   </tr>
                   <tr>
                       <td><?php echo $anim->getNum_secu(); ?></td>
                       <td><?php echo $anim->getDpt_naissance(); ?></td>
                       <td><?php echo $anim->getVille_naissance(); ?></td>
                   </tr>
               </table>
           </td>
        </tr>
            <?php }
        }
        ?>
    </table>
    <input type="submit" id="env" style=""/>
</form>
<!-- ********************  Modifier les animateurs -->
    <?php 
    
        }elseif(isset ($_GET["r"]) && $_GET['r']=="modif") {
            if(isset($modifUsers)){
                $i=0;
                echo '<form action="admin-animateurs_modif1.html" method="post">';
                foreach ($modifUsers as $mod){
?>
                <h2><?php echo $mod->getPrenom(); ?></h2>
                Prenom :<input type="text" value="<?php echo $mod->getPrenom(); ?>" name="prenom<?php echo $i; ?>"/><br/><br/>
                Nom : <input type="text" value="<?php echo $mod->getNom(); ?>" name="nom<?php echo $i; ?>"/><br/><br/>
                Droit : <input type="text" value="1" name="droit<?php echo $i; ?>"/><br/><br/>
                Statut : <input type="text" value="<?php echo $mod->getStatut(); ?>" name="statut<?php echo $i; ?>"/> <?php echo $mod->getNomstatut(); ?><br/><br/>
                Mail : <input type="text" value="<?php echo $mod->getMail(); ?>" name="mail<?php echo $i; ?>"/>
                <input type="text" value="<?php echo $mod->getId_users(); ?>" name="id<?php echo $i; ?>" style="display:none"/>
                
                <hr/>
<?php
                $i++;}
                echo '<input type="text" name="compte" value="'.$i.'" style="display:none"/><input type="submit"/></form>';
            }
    ?>
            
    <?php
            }elseif(isset ($_GET["r"]) && $_GET['r']=="ajout"){ ?>
                <div>
                    <form action="admin-animateurs_new.html" method="post">
                        <span class="spanForm">Prenom :</span><input type="text" value="" name="Aprenom"/><br/><br/>
                        <span class="spanForm">Nom : </span><input type="text" value="" name="Anom"/><br/><br/>
                        <span class="spanForm">Droit : </span><input type="text" value="1" name="Adroit"/><br/><br/>
                        <span class="spanForm">Statut : </span><input type="text" value=""name="Astatut"/><br/><br/>
                        <span class="spanForm">Mail : </span><input type="text" value="" name="Amail"/><br/><br/>
                        <input type="submit"/>
                    </form>
                </div>
                     
    <?php   } 
    ?>
<script>
    $(document).ready(function(){
        $("#all").on("click",function(){
            var cases = $(".parent").find(':checkbox'); // on cherche les checkbox
            if(this.checked){ // si 'cocheTout' est coché
                cases.prop('checked', true); // on coche les cases
                
            }else{ // si on décoche 'cocheTout' 
                cases.prop('checked', false);// on coche les cases
                
            }       
        });
        
        $('a').on("click",function(e){
            var rel = $(this).attr("rel");
            if(rel=="modif"){
                e.preventDefault();
                $("#form").attr("action","admin-animateurs_modif.html");
                $("#form").append('<input type="text" name="modif" value="modif"/>');
                $("#form").submit();
                
            }else if(rel=="bloquer"){
                e.preventDefault();
                $("#form").attr("action","admin-animateurs_bloquer.html");
                $("#form").append('<input type="text" name="bloquer" value="bloquer"/>');
                $("#form").submit();
            }else if(rel=="pass"){
                e.preventDefault();
                $("#form").attr("action","admin-animateurs_pass.html");
                $("#form").append('<input type="text" name="pass" value="pass"/>');
                $("#form").submit();
            }
        });
        
        $('body').on('click','.agr',function(){
          $('.add').hide(50);
          $(this).parent().next('tr').show(500);
       });
    });
</script>