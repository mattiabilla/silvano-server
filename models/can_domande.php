<?php
	
	parse_str(file_get_contents("php://input"),$_DELETE);
    
	//controllo che sia presente l'id della domanda da eliminare
	
	if(!empty($_DELETE["id"])){
		//connetto il database
		require_once($_SERVER['DOCUMENT_ROOT']."/db.php");
		
		//costruisco la query string, QUESTA PARTE E' DA MODIFICARE, INSICURA!!!
		$id_domanda=$_DELETE["id"];
		
		//controllare SEMPRE che l'utente sia proprietario della classe
		$sql="delete from domande where fk_utente=$ID and id=$id_domanda";
		
		$result = $db->query($sql);
		
		$res=[];
		
		if($result){
			$res["status"]="success";
			echo(json_encode($res));
			http_response_code(200);
		}else{
			$res["status"]="failed";
			echo(json_encode($res));
			http_response_code(400);
		}
		
		
		
		
	}
	else{
		$res=[];
		
		$res["status"]="failed";
		echo(json_encode($res));
		http_response_code(400);
		
	}
 
 ?>