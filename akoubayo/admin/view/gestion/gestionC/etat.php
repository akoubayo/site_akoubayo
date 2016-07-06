<?php
include_once '../../../../core/includeAjax.php';
$count=  count($_POST['id']);
?>
<div style="margin-top: 25px">
<div class="divBouton">
    <table>
        <tr>
            <td><img src="./webroot/image/icones/Mails.png" rel="recu" /><br/>Chèque recu</td>
            <td><img src="./webroot/image/icones/Mails.png" rel="animInfo" /><br/>Anim info</td>
            <td><img src="./webroot/image/icones/Mails.png" rel="fin" /><br/>Anim finish</td>
            <td><img src="./webroot/image/icones/Mails.png" rel="annul" /><br/>Annulation</td>
        </tr>
    </table>
</div>
</div>
<form action="admin-gestion.html" method="post" id="formMail">
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
    
</form>

<script>
    $(document).ready(function(){
           $('body').on('click','img',function(){
             var rel = $(this).attr('rel');
             switch (rel){
                 case "recu"  : $('input[name="action"]').val('recu');
                                $('#formMail').submit();
                                $("#corpPop").empty();
                                $("#backBlack").remove();
                                $('#pop').hide(500);
                    
                        break;
                 case "fin"  : $('input[name="action"]').val('fin');
                                $('#formMail').submit();
                                $("#corpPop").empty();
                                $("#backBlack").remove();
                                $('#pop').hide(500);
                    
                        break;
                  case "annul"  : $('input[name="action"]').val('annul');
                                $('#formMail').submit();
                                $("#corpPop").empty();
                                $("#backBlack").remove();
                                $('#pop').hide(500);
                    
                        break;
                  case "animInfo"  : $('input[name="action"]').val('animInfo');
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