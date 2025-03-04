<?php
    $src = fopen("/var/log/apache2/access.log", "r") ; 
    while( $ligne = fgets($src)){
        $extraits = explode(":", $ligne);
        echo "$extraits[0] \n" ; 
    }
    fclose($src); 
?>