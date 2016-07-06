<?php
class Controller
{
    public $_db;
	public function __construct($donnees=null,$db=null)
	{
             
                   if($donnees==null || $db==null){}
                   else {
                       $this->_db=$db;
                       $this->hydrate($donnees,$db);
                   }
                   
                   
	}
	// *************** Fonction hydrater le constructeur *********************
  public function hydrate(array $donnees)
  {
   
    foreach ($donnees as $key => $value)
    {
      $method = 'set'.ucfirst($key);
      
      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }
 
  
    static function load($nameC)
    {
        if(file_exists("./controller/$nameC.php")){
        require_once("./controller/$nameC.php");
        
        }
        elseif(file_exists("../controller/$nameC.php")){
        require_once("../controller/$nameC.php");
     
        }
        elseif(file_exists("../../controller/$nameC.php")){
        require_once("../../controller/$nameC.php");
        }
        elseif(file_exists("../../../controller/$nameC.php")){
        require_once("../../../controller/$nameC.php");
     
        }
        elseif(file_exists("../../../../controller/$nameC.php")){
        require_once("../../../../controller/$nameC.php");
     
        }
        
        return new $nameC();
    }
    static function referencement ($cond,$model,$db){
        $mod=Model::load("$model");
        $d=array(
            "conditions"=>"\"$cond\"",
        );
        $ref=$mod->find($d,$db);
        return $ref;
    }
}
?>