 <?php
	//controllo che siano presenti tutti i campi necessari
	parse_str(file_get_contents("php://input"),$_PUT);
	
	if(!empty($_PUT["nome"])&& !empty($_PUT["materia"])&& !empty($_PUT["anno"])&& !empty($_PUT["id"])&& !empty($_PUT["aperta"])){
		//connetto il database
		require_once($_SERVER['DOCUMENT_ROOT']."/db.php");
		
		//costruisco la query string, QUESTA PARTE E' DA MODIFICARE, INSICURA!!!
		$nome=$_PUT["nome"];
		$materia=$_PUT["materia"];
		$anno=$_PUT["anno"];
		$id_classe=$_PUT["id"];
		$aperta=$_PUT["aperta"];
		
		$sql="update classi set nome='$nome',materia='$materia',anno=$anno,aperta=$aperta where id=$id_classe and fk_ins=$ID ;";
		
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