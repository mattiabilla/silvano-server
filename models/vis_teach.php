 <?php
	//leggo il secondo parametro della query string, se è vuoto leggo e restituisco le classi relative all' $id se c'è un valore vedremo...
	if(empty($url[1])){
		//connetto il database
		require_once($_SERVER['DOCUMENT_ROOT']."/db.php");
		
		//costruisco la query string, QUESTA PARTE E' DA MODIFICARE, INSICURA!!!
		$sql="select * from classi where fk_ins=".$ID;
		
		$result = $db->query($sql);
		
		$res=[];
		$res["classi"]=[];
		$i=0;
		while($row = $result->fetch_assoc()) {
			
			foreach($row as $chiave =>$valore){
				$res["classi"][$i]["$chiave"]=$valore;
			};
			$i++;
        
		}
		echo(json_encode($res));
		
	}
 
 ?>