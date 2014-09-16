<?php
     
     function sanitize($string)
     {
         $string=implode("",explode("\\",$string));
         return strip_tags(stripslashes(trim($string)));
     }
?>
