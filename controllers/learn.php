<?php
	
	//questo è il controller relativo alle classi (lato studente), permette di creare, cancellare, modificare o leggere classi
 
	//qui di seguito il dispatcher che distinguerà i metodi e quindi le azioni da compiere sull'oggetto
	
	switch($_SERVER['REQUEST_METHOD']){
		case "GET": require_once($_SERVER['DOCUMENT_ROOT']."/models/vis_learn.php");
		break;
		case "POST": require_once($_SERVER['DOCUMENT_ROOT']."/models/crea_learn.php");
		break;
		case "PUT": $res=[];
		
					$res["status"]="failed";
					echo(json_encode($res));
					http_response_code(400);
		break;
		case "DELETE": $res=[];
		
					   $res["status"]="failed";
					   echo(json_encode($res));
					   http_response_code(400);
		break;
		
	}

 
 ?>