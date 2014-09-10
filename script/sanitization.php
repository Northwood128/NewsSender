<?php
     function sanitize(String $string)
     {
         $string=implode("",explode("\\",$string));
         return strip_tags(stripslashes(trim($string)));

     }

?>