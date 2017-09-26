<?php
/*
 * @author: Jude Kikuyu
 * date: 07/09/2017
 * ref: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_dropdown_navbar
 *      https://stackoverflow.com/questions/11747156/php-create-navigation-menu-from-multidimensional-array-dynamically
 */ 
Class Menu{
/*
 * function MakeMenu generates menus
 * 
 */    
    function MakeMenu($items, $level = 0) {
 
        foreach ($items as $item => $subitems) {
            if (!is_numeric($item)) {
                if (is_array($subitems)){
                    
                    if($this->isAssoc($subitems)){
            
        ?>     
                <div class="dropdown">

                 <button class="dropbtn"> <?php echo $item; ?> </button>
                    <div class="dropdown-content">
                <?php  
                        foreach($subitems as $keys=>$values){
                             echo "<a href='".$values ."'>".$keys. "</a>";   
                        }
                    }
                    else{
         ?>
                  <div class="dropdown">
    
                     <button class="dropbtn"> <?php echo $item; ?> </button>
                        <div class="dropdown-content">
              <?php
                         $len = count($subitems) ;   
                          
                         for( $i=0; $i < $len ; $i++){
               
                             echo "<a href=''>".$subitems[$i]. "</a>";   
                         }
                    }
                }

               else{
                     echo "<a href='".$subitems ."'>".$item. "</a>";   
                    }  
              }
                        // 'contact' => "contact"
             
       ?>
        </div> 
        </div>
       <?php
        }
        ?>

    <?php
    }
/*
 * Function menuInit creates a menu array and pass it to MakeMenu
 * Array is generated either static or dynamic with data being obtained from a menu table.
 */ private function isAssoc(array $arr) {
        if (array() === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    public function menuInit(){
        $menu = Array(
                    'Admin' => Array("Update Profile"=>"dispatch.php?edituser=".$_SESSION["userId"], "Parameters"=>"dispatch.php?choice=parameter", 
                     "Teachers"=>"dispatch.php?choice=teacher","Groups"=>"dispatch.php?choice=group", 
                     "Students"=>"dispatch.php?choice=student"),
                   
                    "Capture" => Array("marks"=>"dispatch.php?choice=marks", 
                    "Spreadsheet"=>"dispatch.php?choice=upload"),
                    "Change Password" => "dispatch.php?changepass",
                    "Logout" => "dispatch.php?logout"
           
                );
        
        //print_r($menu);
      ?>
      
        <div class="cntmenu text-align">
      <?php 
       
      $this->MakeMenu($menu);
   }
    
    

}
 /*<div class="container">
  <a href="#home">Home</a>
  <a href="#news">News</a>
  <div class="dropdown">
    <button class="dropbtn">Dropdown</button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> 
  <a href="#news">Link</a>
</div>*/

?>
