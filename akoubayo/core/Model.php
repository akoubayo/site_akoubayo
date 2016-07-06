<?php
/**
 * Objet Model
 * Permet les int�ractions avec la base de donnee
 * */
class Model{
    
    public $table;
    public $id;
   
    
    
    /**
     * Lit une ligne dans la base de donn�e par rapport � l'ID de l'objet
     * @param $fields Liste des champs � r�cup�rer
     * */
    public function count($data=array(),$db)
    {
        
            $table="" ;
            $conditions = "1=1";
            $fields = "*";
            $limit = "";
            $order = "id DESC";
            extract($data);
            
            if(empty($table))
            {$table =  $this->table;}
            
        $sql = "SELECT COUNT(*) FROM $table WHERE $conditions ";
        
        $aleatoir = $db->query($sql);
      
        $aleatoir->execute();
        
        $donnees = $aleatoir->fetch(PDO::FETCH_ASSOC);
         
        foreach($donnees as $k=>$v){
            $this->$k = $v;
        }
        
      
 
       return $v;
      
    }
    public function aleatoir($data=array(),$db)
    {
        
            $count= $this->count($data,$db);
            $table="" ;
            $conditions = "1=1";
            $fields = "*";
            $limit = "";
            $order = "";
            extract($data);
            
             if(isset($data["limit"])){ 
                 
                 
                 $nbaleatoir =  rand(0, $count);
      if($nbaleatoir>($count-$limit))
    {
          $nbaleatoir = $count-$limit;
          $limit = "$nbaleatoir,$limit";
    }
    else
    {
      $limit= "$nbaleatoir,$limit";
    }
                 
                 
             }
             if(isset($data["order"])){ $order = "ORDER BY ".$data["order"];}
            
            $sql = "SELECT $fields FROM $table WHERE $conditions $order LIMIT $limit";
            
            $requ = $db->query($sql);
            
            $requ->execute();
           
            $d = array();
            while($donnees = $requ->fetch(PDO::FETCH_ASSOC)){
                $table = self::setControleur(get_class($this));
                $d[] = new $table($donnees);
            }
            
            return $d;
    }
    public function read($fields=null){
        $animations = array();
        if($fields==null){            $fields = "*";        }
        
        
        $b = "SELECT $fields FROM ".$this->table." WHERE id=".$this->id ;
        $db->query('$b');
        return $db;
  
    }
    
    /**
     * Sauvegarde les donn�e pass� en param�tre dans la base de donn�e
     * @param $data Donn�e � sauvegarder
     * */
    public function save($data,$db){
     
        foreach ($data as $key=>$values){
           $comp = substr($key,0,2);
           if($comp==="id" ){
            $donnees = "UPDATE ".  $this->table." SET ";
            foreach($data as $key=>$Values)
            {
                $comp = substr($key,0,2);
                if($comp!=="id"){
                    $donnees.="$key='$Values',";
                }
            }
            $donnees = substr($donnees, 0,-1);
             foreach($data as $key=>$Values)
            {
                
                $comp = substr($key,0,2);
                if($comp==="id"){
                    $donnees.=" WHERE $key='$Values',";
                }
            }
            $donnees = substr($donnees, 0,-1);

            $save = $db->exec($donnees);
            $conditions='';
            foreach ($data as $key=>$value) {
                $conditions.= $key.'=\''.$value.'\' AND ';
            }
            $conditions=substr($conditions,0,-4);
          
            $donnees=array(
                "table"=>$this->table,
                "conditions"=>$conditions
            );
            $find=$this->find($donnees,$db);
           
            return $find;           
        }
        }
        
        
            $donnees ="INSERT INTO ".$this->table."(";
            unset($data["id"]);
            foreach($data as $key=>$values){
                $donnees.="$key,";
            }
            $donnees = substr($donnees,0,-1);
            $donnees .=")VALUES(";
            foreach($data as $values){
                if($values=='CURDATE()'){
                    $donnees.="$values,";
                }
                else{
                $donnees .="'$values',";
                }
            }
            $donnees = substr($donnees,0,-1);
            $donnees.=")";
            $save = $db->exec($donnees);
            $conditions='';
            foreach ($data as $key=>$value) {
                $conditions.= $key.'=\''.$value.'\' AND ';
            }
            
            $conditions=substr($conditions,0,-4);
            
            $donnees=array(
                "table"=>$this->table,
                "conditions"=>$conditions,
            );
            $find=$this->find($donnees,$db);
            return $find;
        
        //________________________________________________
        
     
       /* mysql_query($sql) or die(mysql_error()."<br/> => ".mysql_query());
        if(!isset($data["id"])){
            $this->id=mysql_insert_id();
        }
        else{
            $this->id = $data["id"];
        }*/
    }
    
    /**
     * Permet de r�cup�rer plusieurs ligne dans la BDD
     * @param $data conditions de r�cup�rations
     * */
    public function find($data=array(),$db){
        $animations=array();
            $conditions = "1=1";
            $fields = "*";
            $limit = "";
            $order = "";
            $table ="";
            if(empty($table))
            {$table =  $this->table;}
            extract($data);
            if(isset($data["limit"])){ $limit = "LIMIT ".$data["limit"]; }
            if(isset($data["order"])){ $order = "ORDER BY ".$data["order"];}
             $b = "SELECT $fields FROM $table WHERE $conditions $order $limit  ";

             $b= $db->query($b);
             
             $b->execute();
             
             while ($donnees = $b->fetch(PDO::FETCH_ASSOC))
             {             
                $table = self::setControleur(get_class($this));
                $a[] = new $table($donnees,$db);
             }
             $b->closeCursor();
           if(isset($a)){return $a;}else {}  
    }
   
  
            
           
    
    
    /**
     * Permet de supprimer une ligne dans la base de donn�e
     * @param $id ID de la ligne � supprimer
     * */
    public function del($data=array(),$db){
            $conditions = "1=1";
            $fields = "*";
            $limit = "";
            $order = "";
            $table ="";
            if(empty($table))
            {$table =  $this->table;}
            extract($data);
            if(isset($data["limit"])){ $limit = "LIMIT ".$data["limit"]; }
            if(isset($data["order"])){ $order = "ORDER BY ".$data["order"];}
             $b = "DELETE FROM $table WHERE $conditions ";
             $b= $db->query($b);
             $b->execute();
    }
    
    /**
     * Permet de faire une requ�te complexe
     * @param $sql Requ�te a effectu�
     * */
        public function query($sql){
            $req = mysql_query($sql) or die(mysql_error()."<br/> => ".$sql);
            $d = array();
            while($data = mysql_fetch_assoc($req)){
                $d[] = $data;
            }
            return $d; 
        }
    
    /**
     * Permet de charger un model
     * @param $name Nom du model � charger
     * */
    static function load($name){
      if(file_exists("./model/$name.php")){
        require_once ("./model/$name.php");
      }
      elseif (file_exists("../model/$name.php")) {
           require_once '../model/'.$name.'.php';
      }
      elseif (file_exists("../../model/$name.php")) {
           require_once '../../model/'.$name.'.php';
      }
        elseif (file_exists("../../../model/$name.php")) {
           require_once '../../../model/'.$name.'.php';
      }
      elseif (file_exists("../../../../model/$name.php")) {
           require_once '../../../../model/'.$name.'.php';
      }
        $a =  new $name;
        
        
        return $a;
    }
    static function setControleur($nom)
    {       
                $table=substr($nom,0,-1);
                $table.='C';
                $controller = Controller::load($table);
                return  $table;
    }
    
}
?>