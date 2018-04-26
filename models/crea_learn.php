<?php
	//controllo che sia presente l'id della classe in cui entrare
	
	if(!empty($_POST["id"])){
		//connetto il database
		require_once($_SERVER['DOCUMENT_ROOT']."/db.php");
		
		//costruisco la query string, QUESTA PARTE E' DA MODIFICARE, INSICURA!!!
		
		$id_classe=$_POST["id"];
		
		
		//-------------------------------------------------------------------------
		//controllo che la classe sia aperta a nuove iscrizioni o si sia insegnanti
		$sql="select aperta,fk_ins from classi where id = $id_classe";
		
		$result = $db->query($sql);
		
		//0=chiusa 1=aperta, seque la logica booleana
		$aperta=0;
		$insegno=1;
		//se la classe non esiste $aperta rimane a 0 quindi no problem, stessa cosa per insegno
		while($row = $result->fetch_assoc()) {
			$aperta=$row["aperta"];
			if($ID!=$row["fk_ins"]){
				$insegno=0;
			}
		}
		
		
		//-------------------------------------------------------------------------
		
		//controllo che non si sia già iscritti
		$sql="select * from utenticlassi where fk_utente = $ID and fk_classe=$id_classe";
		
		$result = $db->query($sql);
		
		//0=non iscritto 1=iscritto, seque la logica booleana
		$iscritto=0;
		
		//se la classe non esiste $iscritto rimane a 1 quindi no problem
		while($row = $result->fetch_assoc()) {
			$iscritto=1;
		}
		
		//se la classe è aperta, non ci insegna e non è già iscritto inseriscilo
		if($aperta==1 && $insegno==0 && $iscritto==0){
			
			$sql="insert into utenticlassi(fk_utente,fk_classe) values($ID,$id_classe)";
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
		}else{
			$res=[];
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