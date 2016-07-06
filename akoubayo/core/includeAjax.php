<?php
try{
session_start();
if($_SERVER['SERVER_NAME']=='localhost'){
            $db = new PDO('mysql:host=localhost:8889;dbname=akoubayo', 'root', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
            $db->exec("SET CHARACTER SET utf8");
        }
        else{
            $db = new PDO('mysql:host=mysql51-37.bdb;dbname=akoubayoshop', 'akoubayoshop', 'allant2559');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
            $db->exec("SET CHARACTER SET utf8");
        }
        if(file_exists("../../../core/Controller.php")){
            require_once  '../../../core/Controller.php';
            require_once  '../../../core/Model.php';
            require_once  '../../../bin/outils.php';
        }
        elseif(file_exists("../../core/Controller.php")){
            require_once  '../../core/Controller.php';
            require_once  '../../core/Model.php';
            require_once  '../../bin/outils.php';
        }
        elseif(file_exists("../../../../core/Controller.php")){
            require_once  '../../../../core/Controller.php';
            require_once  '../../../../core/Model.php';
            require_once  '../../../../bin/outils.php';
        }
        else{
            
            require_once  '../core/Controller.php';
            require_once  '../core/Model.php';
            require_once  '../bin/fonctionPhp.php';
            require_once  '../bin/outils.php';
        }
}catch(Exception $e)
{
    trigger_error(sprintf('Notre block try catch a capturé une exception !<br />Voici son message : %s', $e->getMessage()), E_USER_ERROR);
}
?>