<?php

if(isset($_GET['p'])){
    $p=$_GET['p'];
    if (file_exists("view/$p/$p.php")){
        $pFiles=$p.'C';
        if(file_exists("view/$p/$p.php")){
            $pClass=ucfirst($p).'C';
            $class = new $pClass();
        }
        include_once ("view/$p/$p.php");
    }
    elseif(file_exists("utilisateurs/$p.php")){
        include_once ("utilisateurs/$p.php");
    }
    else{
        header('Location:./index.html');
    }
}
   
          
          
      
      ?>