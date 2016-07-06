<?php
include_once '../../../../core/includeAjax.php';
$model=  Model::load("TrainPeriodeM");
$d=array();
$periode=$model->find($d,$db);
?>

<form action="admin-train.html" method="post" enctype="multipart/form-data">
    <span class="spanForm1">
        Modifier une période :
    </span>
    <select name="modif_periode">
        <option value="0">Non</option>
        <?php
            if(isset($periode)){
                foreach ($periode as $p){
        ?>
        <option value="<?php echo $p->getId_train_periode(); ?>"><?php echo $p->getNom_periode(); ?></option>
        <?php
                }
            }
        ?>
    </select>
    <br/><br/>
    <span class="spanForm1">
        Nom de la période :
    </span>
    <input type="text" name="nom_periode"/>
    <br/><br/>
    <span class="spanForm1">
        Date début :
    </span>
    <input type="text" name="date_deb_periode"/>
    <br/><br/>
    <span class="spanForm1">
        Date Fin :
    </span>
    <input type="text" name="date_fin_periode"/>
    <br/><br/>
    <input type="file" name="fichier" size="300"/>
    <br/><br/>
    <input type="submit"/>
</form>