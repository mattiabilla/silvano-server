<?php
	
	//questo è il controller relativo alle domande, permette di creare, cancellare, modificare o leggere domande
 
	//qui di seguito il dispatcher che distinguerà i metodi e quindi le azioni da compiere sull'oggetto
	
	switch($_SERVER['REQUEST_METHOD']){
		case "GET": require_once($_SERVER['DOCUMENT_ROOT']."/models/vis_domande.php");
		break;
		case "POST": require_once($_SERVER['DOCUMENT_ROOT']."/models/crea_domande.php");
		break;
		case "PUT": require_once($_SERVER['DOCUMENT_ROOT']."/models/mod_domande.php");
		break;
		case "DELETE": require_once($_SERVER['DOCUMENT_ROOT']."/models/can_domande.php");
		break;
		
	}

 
 ?>