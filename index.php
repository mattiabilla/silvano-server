<?php
	
	//punto di ingresso per l'applicazione, ogni richiesta passa da qua grazie alla modifica del file .htaccess
	
	//aggiungere header access control allow origin per permettere a client presenti in altri domini di fare le richieste
	header("Access-Control-Allow-Origin: *");
	
	$ID=3;
	
	//prelevo la uri dalla query string
	if(!empty($_GET["url"]))$url=explode("/",$_GET["url"]);
	
	//controllo che non sia vuota
	if(! empty($url[0])){
		
		$pathfile='/controllers/'.$url[0].'.php';
		
		
		//controllo che esista la risorsa/file e la includo
		
		if(file_exists ($_SERVER['DOCUMENT_ROOT'].$pathfile)){
			require_once($_SERVER['DOCUMENT_ROOT'].$pathfile);
			
		}	
	}
	
	
?>