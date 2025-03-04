<?php

    $src = fopen("/var/log/apache2/access.log", "r") ; 
    while( $ligne = fgets($src)){
        echo "$ligne\n" ; 
    }
    fclose($src); 

?>