<?php
//***********  La session Start    ************
            session_start(); 
define('WEBROOT', dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT.DS.'core');
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));
        //***********  Connexion à la base de donnée    ************
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
        
        //***********  On charge les classes principales     ************
        require_once './core/Model.php';
        require_once './core/Controller.php';
        require_once './bin/outils.php';
        require_once './bin/Mail.php';
      
        
        
        

if(file_exists("../../core/includeAjax.php")){
    include_once '../../core/includeAjax.php';
    include_once 'profilC/ProfilC.php';
}
        
        //***********  On charge le header puis le render    ************
        if(!isset($_GET['p']))
        {
           require_once './view/accueil/accueilC/accueilC.php';
           require_once './render/render.php';
        }
        elseif(isset($_GET['p']) && $_GET['p']!='accueil' && $_GET['p']!='admin' && file_exists('./view/'.$_GET['p'].'/'.$_GET['p'].'.php'))
        {
           //***********  Le controller    ************
           require_once './view/'.$_GET['p'].'/'.$_GET['p'].'C/'.$_GET['p'].'C.php';
           //***********  La vue     ************
           require_once './render/render.php';
            
        }
        elseif(isset($_GET['p']) && $_GET['p']=='admin' && !isset($_GET['l'])) 
        {
            //***********  Le controller    ************
           require_once './admin/view/connexion/connexionC/connexionC.php';
           //***********  La vue     ************
           require_once './admin/view/connexion/connexion.php';

        }
        elseif(isset($_GET['p']) && $_GET['p']=='admin' && isset($_GET['l']))
        {
            if(file_exists('./admin/view/'.$_GET['l'].'/'.$_GET['l'].'.php') && isset($_SESSION['prenom']))
                {
                    require_once './admin/view/'.$_GET['l'].'/'.$_GET['l'].'C/'.$_GET['l'].'C.php';
                    //***********  La vue     ************
                    require_once './admin/render/render.php';
            }
            else
                {
                //***********  Le controller    ************
                require_once './admin/view/connexion/connexionC/connexionC.php';
                //***********  La vue     ************
                require_once './admin/view/connexion/connexion.php'; 
                }
        }
        else 
        {
            header('Location:./');
        }

?>
