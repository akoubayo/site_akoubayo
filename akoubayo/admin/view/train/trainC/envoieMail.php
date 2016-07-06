<?php
include_once '../../../../core/includeAjax.php';
$count=  count($_POST['id']);
?>
<div style="margin-top: 25px">
<div class="divBouton">
    <table>
        <tr>
            
            <td><img src="./webroot/image/icones/Mails.png" rel="info" /><br/>Info</td>
           
        </tr>
    </table>
</div>
</div>
<form action="admin-train.html" method="post" id="formMail">
    <?php
      $i=0;
      while ($i<$count){
    ?>
    <input type="text" name="idEvent<?php echo $i; ?>" value="<?php echo $_POST['id'][$i] ?>" style="display: none"/>
    <?php
     $i++; }
    ?>
    <input type="text" name="compte" value="<?php echo $i; ?>" style="display: none"/>
    <input type="text" name="action" style="display: none"/>
    <input type="text" value="<?php echo $_POST['mois']; ?>" name="mois" style="display: none"/>
    <input type="text" value="<?php echo $_POST['annee']; ?>" name="annee" style="display: none"/>
    
</form>

<script>
    $(document).ready(function(){
           $('body').on('click','img',function(){
             var rel = $(this).attr('rel');
             switch (rel){
                 case "info"  : $('input[name="action"]').val('info');
                                $('#formMail').submit();
                                $("#corpPop").empty();
                                $("#backBlack").remove();
                                $('#pop').hide(500);
                    
                        break;
                 case "devis"  : $('input[name="action"]').val('devis');
                                $('#formMail').submit();
                                $("#corpPop").empty();
                                $("#backBlack").remove();
                                $('#pop').hide(500);
                    
                        break;
                  case "fac"  : $('input[name="action"]').val('fac');
                                $('#formMail').submit();
                                $("#corpPop").empty();
                                $("#backBlack").remove();
                                $('#pop').hide(500);
                    
                        break;
                 default :"";
             }
           });
       });
</script>