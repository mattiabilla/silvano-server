<?php
	//leggo il secondo parametro della query string, se è vuoto leggo e restituisco le classi relative all' $id se c'è un valore vedremo...
	if(empty($url[1])){
		//connetto il database
		require_once($_SERVER['DOCUMENT_ROOT']."/db.php");
		
		//costruisco la query string, QUESTA PARTE E' DA MODIFICARE, INSICURA!!!
		$sql="select * from domande where fk_utente=".$ID;
		
		$result = $db->query($sql);
		
		$res=[];
		$res["domande"]=[];
		$i=0;
		while($row = $result->fetch_assoc()) {
			
			foreach($row as $chiave =>$valore){
				$res["domande"][$i]["$chiave"]=$valore;
			};
			$i++;
        
		}
		echo(json_encode($res));
		
	}
	else{
		$id_domanda=$url[1];
		//connetto il database
		require_once($_SERVER['DOCUMENT_ROOT']."/db.php");
		
		//costruisco la query string, QUESTA PARTE E' DA MODIFICARE, INSICURA!!!
		$sql="select * from domande where id=$id_domanda and fk_utente=".$ID;
		
		$result = $db->query($sql);
		
		$res=[];
		$res["domande"]=[];
		$i=0;
		while($row = $result->fetch_assoc()) {
			
			foreach($row as $chiave =>$valore){
				$res["domande"][$i]["$chiave"]=$valore;
			};
			$i++;
        
		}
		echo(json_encode($res));
	}
 
 ?>