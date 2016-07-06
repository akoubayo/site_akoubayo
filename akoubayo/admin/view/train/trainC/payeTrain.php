<?php
include_once '../../../../core/includeAjax.php';
?>
<form action="admin-train.html" method="post">
Mois : <select name="payeMois">';
    <option value="1">Janvier</option>
    <option value="2">Février</option>
    <option value="3">Mars</option>
    <option value="4">Avril</option>
    <option value="5">Mai</option>
    <option value="6">Juin</option>
    <option value="7">Juillet</option>
    <option value="8">Aout</option>
    <option value="9">Septembre</option>
    <option value="10">Octobre</option>
    <option value="11">Novembre</option>
    <option value="12">Décembre</option>
</select><br/><br/>
<input type="submit" value="envoie" id="envoie"/>
        <input type="text" name="payeTrain" value="1" style="display: none"/>
</form>

    
<script>
    $(document).ready(function(){
        $('#envoie').on('click',function(){  
            $("#paye").submit();
            $("#corpPop").empty();
            $("#backBlack").remove();
            $('#pop').hide(10);
        });
    });
    </script>