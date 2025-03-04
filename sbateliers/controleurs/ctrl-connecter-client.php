<?php
	$src = fopen('/var/log/sbateliers/access.log', 'a') ;
	$email = $_POST[ "email" ] ;
	$mdp = $_POST[ "mdp" ] ;
	

	require "modeles/ModeleSBAteliers.php" ;
	$client = ModeleSBAteliers::getClient( $email , $mdp ) ;
	
	if( $client !== FALSE ){
		session_start() ;
		$resultatAuth = 'ok' ; 
		$_SESSION[ "numero" ] = $client[ "numero" ] ;
		$_SESSION[ "nom" ] = $client[ "nom" ] ; 
		$_SESSION[ "prenom" ] = $client[ "prenom" ] ; 
		$info = $_SERVER['REMOTE_ADDR'] .' : '. date("y-m-d H:i:s") .' : '.  $_SESSION[ "nom" ] .' : '. $resultatAuth .' : '. $_SERVER['HTTP_USER_AGENT'] ;
		fwrite($src, $info);
		fclose($src) ;
		header( "Location: /sbateliers/clients/espace" );
	}
	else {
		$resultatAuth = 'Nok' ;
		$info = $_SERVER['REMOTE_ADDR'] .' : '. date("y-m-d H:i:s") .' : '.  $_SESSION[ "nom" ] .' : '. $resultatAuth .' : '. $_SERVER['HTTP_USER_AGENT'] ;		
		fwrite($src, $info);
		fclose($src) ;
		$erreur = 'EMail ou mot de passe incorrect.' ;
		require "vues/vue-connexion.php" ;
	}
	

?>
