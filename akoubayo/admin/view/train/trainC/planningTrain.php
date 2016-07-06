<?php
include_once '../../../../core/includeAjax.php';
$model=  Model::load("TrainPeriodeM");
$d=array(
    "order"=>"id_train_periode DESC"
);
$periodeTrain=$model->find($d,$db);
if(isset($periodeTrain)){
?>
<form action="admin-train.html" method="post">
        Période : <select name="selectPeriode">';
<?php
    
    foreach ($periodeTrain as $p){
?>


    <option value="<?php echo $p->getId_train_periode(); ?>"><?php echo $p->getNom_periode(); ?></option>

<?php
    }
?>
    </select><br/><br/>
        <input type="submit" value="envoie"/>
        <input type="text" name="envoiePlanning" value="1" style="display: none"/>
</form>
<?php
    
}