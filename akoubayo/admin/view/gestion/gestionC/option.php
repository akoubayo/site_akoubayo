<?php
include_once '../../../../core/includeAjax.php';
    $model=  Model::load("OptionsM");
    $d=array();
    $findOption=$model->find($d,$db);
    
    $d=array(
        "conditions"=>"event_id=".$_POST['id'][0]." AND bool_client_opt=0"
    );
    $model2= Model::load("ClientOptionM");
    $clientOption=$model2->find($d,$db);
    
    
    if(isset($findOption)){
?>
<form action="admin-gestion.html" method="post">
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
        }
    ?>
        <input type="text" value="<?php echo $i ?>" name="nombre" style="display: none"/>
        <input type="text" value="<?php echo $_POST['id'][0] ?>" name="event_id" style="display: none"/>
        <input type="text" value="" name="addOption" style="display: none"/>
    </table>
</form>