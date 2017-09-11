<?php
/*
 * https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_dropdown_navbar
 * https://stackoverflow.com/questions/11747156/php-create-navigation-menu-from-multidimensional-array-dynamically
 */
Class Menu{
    private $isDiv = TRUE;
     private $isDiv2 = TRUE;
    
    function MakeMenu($items, $level = 0) {
 
        foreach ($items as $item => $subitems) {
            if (!is_numeric($item)) {
                if(is_array($subitems)){
      ?>        
      
                <div class="dropdown">
                 <button class="dropbtn"> <?php echo $item; ?> </button>
                    <div class="dropdown-content">
                <?php        
                     for( $i=0; $i < $subitems.size(); $i++){
                  ?>
                     echo "<a href=''>".$subitems[$i]. "</a>";   
                 <?php       
                         
                     }
            
                }
                   // 'contact' => "contact"
            }
            else{
                
             echo "<a href=''>".$item. "</a>";
            }
        }
       

        ?>

 
        </div> 
        </div>
        </div>
    <?php
    }
    public function menuInit(){
        $menu = Array(
                    'home' => Array("sub-home1", "sub-home2"),
                    'about' => Array("sub-about1", "sub-about2"),
                    'contact' => "contact"
           
                );
        
        //print_r($menu);
      ?>
      
        <div class="cntmenu text-align">
      <?php 
       
      $this->MakeMenu($menu);
     ?>
     <?php 
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
