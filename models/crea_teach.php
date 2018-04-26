 <?php
	//controllo che siano presenti tutti i campi necessari
	
	if(!empty($_POST["nome"])&& !empty($_POST["materia"])&& !empty($_POST["anno"])){
		//connetto il database
		require_once($_SERVER['DOCUMENT_ROOT']."/db.php");
		
		//costruisco la query string, QUESTA PARTE E' DA MODIFICARE, INSICURA!!!
		$nome=$_POST["nome"];
		$materia=$_POST["materia"];
		$anno=$_POST["anno"];
		
		$sql="insert into classi(nome,materia,anno,fk_ins,aperta) values ('$nome','$materia',$anno,$ID,1);";
		
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