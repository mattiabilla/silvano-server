 <?php
	
	//questo è il controller relativo alle classi (lato insegnante), permette di creare, cancellare, modificare o leggere classi
 
	//qui di seguito il dispatcher che distinguerà i metodi e quindi le azioni da compiere sull'oggetto
	
	switch($_SERVER['REQUEST_METHOD']){
		case "GET": require_once($_SERVER['DOCUMENT_ROOT']."/models/vis_teach.php");
		break;
		case "POST": require_once($_SERVER['DOCUMENT_ROOT']."/models/crea_teach.php");
		break;
		case "PUT": require_once($_SERVER['DOCUMENT_ROOT']."/models/mod_teach.php");
		break;
		case "DELETE": require_once($_SERVER['DOCUMENT_ROOT']."/models/can_teach.php");
		break;
		
	}

 
 ?>