<?php


    require "modeles/ModeleSBAteliers.php" ;
    ModeleSBAteliers::activera2f( $_SESSION[ 'cle_secrete' ] , $cleSecrete ) ;

    header( "Location: /sbateliers/clients/a2f" ) ;

?>