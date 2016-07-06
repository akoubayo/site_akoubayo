<?php
        $image=Model::load('ImageM');
        $d=array("conditions"=>"animations_id>0");
        $count=$image->count($d,$db);
        $d=array(
            "conditions"=>"animations_id>0",
            "limit"=>"0,5"
        );
        $image=$image->find($d,$db);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">                                
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="msvalidate.01" content="79238621CE3D0D9A912EE2BCA5F4F19D" />
    <meta name="robots" content="noindex"/>
    <meta name="googlebot" content="noindex"/>



<span id="css">
   <script>
        var lar = screen.width;
        if(lar>=1280){
           document.write("<link href=\"./webroot/body.css\" rel=\"stylesheet\" type=\"text/css\"/>");
           document.write("<link href=\"./webroot/computer.css\" rel=\"stylesheet\" type=\"text/css\"/>");
           document.write("<link href=\"./webroot/admin.css\" rel=\"stylesheet\" type=\"text/css\"/>");
        }
        else if(lar<1280){
            document.write("<link href=\"./webroot/bodyTab.css\" rel=\"stylesheet\" type=\"text/css\"/>");
            document.write("<link href=\"./webroot/computer.css\" rel=\"stylesheet\" type=\"text/css\"/>");
            document.write("<link href=\"./webroot/admin.css\" rel=\"stylesheet\" type=\"text/css\"/>");
        }
    </script>
</span>
<script type="text/javascript" src="./webroot/jquery.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>



 </head>
    
 <body>
       
     <div style="background-color: white;width: 1024px;margin-left: auto;margin-right: auto;margin-top: 25px;border-radius: 15px;padding-bottom: 20px;">
         <img src="./webroot/image/Akoubayo2.png" style="width: 60%"/>
         <strong>
             <h1>
                Admin
             </h1>
         </strong>
         <ul style="position: absolute;top:120px;z-index: 99">
             
             <?php 
          
                    $menu=Model::load("AdminMenuM");
                    $d=array(
                        "conditions"=>"droit_menu>=$_SESSION[droit]",
                        "order"=>"position_menu ASC"
                    );
                    $menu=$menu->find($d,$db);
                    if(isset($menu)){
                        foreach ($menu as $m){
                           if($m->getSous_menu_admin()>0){$cl='class="ssMenu"';}else{$cl='';}
                    
             ?>
             <li style="width:150px;height:20px;float:left;color:#191919;text-align:center;overflow:hidden;background-color: white;border-radius:8px;
	box-shadow:0px 3px 5px #333333;text-align: center;margin-right: 10px;" <?php echo $cl; ?>>
                 <a href="<?php echo 'admin-'.$m->getLien_menu().'.html' ?>" style="color: #F09;font-size: 18px;">
                     <?php echo ucfirst($m->getNom_menu());?>
                 </a>
                 
                 <?php
                    if($m->getSous_menu_admin()>0){ ?>
                 
                            <?php
                                $nb=$m->getNb_sous_menu();
                                echo '<br/>';
                                for ($i=0;$i<$nb;$i++) {
                                        echo '<a href="admin-'.$m->getLien_pages().'-'.$m->getLien_sous($i).'.html" style="color: #F09;font-size: 14px;">'.ucfirst($m->getNom_sous($i)).'</a><br/>';
                                }
                                
                            ?>
                 
                   <?php }
                 ?>
           
                    <?php } ?></li> <?php } ?>
           
         </ul>
     </div>    
     
  

<!--                              Le  Corps                                                 -->
<!--                  //Les images à gauche                                              -->
        <div style="width: 924px;background-color: white;margin-left: auto;margin-right: auto;margin-bottom: 200px;margin-top: 20px;border-radius: 15px;padding: 50px">
            
            <?php
                if(!isset($_GET['l'])){
                    require_once './admin/view/accueil/accueil.php';
                }
                elseif(isset($_GET['l']) && file_exists('./admin/view/'.$_GET['l'].'/'.$_GET['l'].'.php')){ 
                    require_once './admin/view/'.$_GET['l'].'/'.$_GET['l'].'.php'; 
                }else{
                    require_once './admin/view/accueil/accueil.php';
                }
            ?>
             
       </div> 

 
 
<script>
$(document).ready(function() {
    $(".ssMenu").mouseover(function(){
        $(this).stop().animate({height:'100%'},{queue:false, duration:1000});
    });
 
    //When mouse is removed
    $(".ssMenu").mouseout(function(){
        $(this).stop().animate({height:'20px'},{queue:false, duration:600});
    });

});
</script>   
 </body>
</html>

