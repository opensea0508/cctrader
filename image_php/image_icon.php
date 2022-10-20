<?php

if ($foo->uploaded) {   
   // save uploaded image with a new name,
   // resized to 100px wide
   $foo->file_new_name_body = $picid;
   $foo->image_resize = true;
   $foo->image_convert = 'png';
   $foo->image_x = 500;
   $foo->image_y = 300;
   $foo->Process('icons');
   if ($foo->processed) {
     $foo->Clean();
   }  
}
?>