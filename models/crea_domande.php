<?php
	//controllo che siano presenti tutti i campi necessari, comuni alle due tipologie di domande
	/*
		-nome
		-descrizione
		-argomento
		-materia
		-testo
		-punti
		-tipologia
	*/
	if(!empty($_POST["nome"])&&!empty($_POST["descrizione"])&& !empty($_POST["argomento"])&& !empty($_POST["materia"])&& !empty($_POST["testo"])&& !empty($_POST["tipologia"])){
		//connetto il database
		require_once($_SERVER['DOCUMENT_ROOT']."/db.php");
		
		//costruisco la query string, QUESTA PARTE E' DA MODIFICARE, INSICURA!!!
		$nome=$_POST["nome"];
		$descrizione=$_POST["descrizione"];
		$argomento=$_POST["argomento"];
		$materia=$_POST["materia"];
		$testo=$_POST["testo"];
		
		$tipologia=$_POST["tipologia"];
		
		$result=false;
		//discrimino le domande aperte da quelle chiuse
		if(($tipologia=="a")&& !empty($_POST["punti"])){
			$punti=$_POST["punti"];
			//costruisco la query
			$sql="insert into domande(nome,descrizione,argomento,materia,testo,punti,tipologia,fk_utente) values ('$nome','$descrizione','$argomento','$materia','$testo',$punti,'$tipologia',$ID);";
			$result = $db->query($sql);
		}
		else if($tipologia=="c"){
			//controllo che l'utente abbia inserito tutte e 5 le opzioni
			$completa=true;
			for($i=1;$i<=5;$i++){
				if(empty($_POST["opt$i"])){
					$completa=false;
					
				}
				if(empty($_POST["popt$i"])){
					$_POST["popt$i"]=0;
				}
			}
			if($completa){
				//costruisco la query
				$popt="";
				$opt="";
				
				for($i=1;$i<=5;$i++){
					$opt.="'".$_POST["opt$i"]."',";
					$popt.="'".$_POST["popt$i"]."',";
				}
				$sql="insert into domande(nome,descrizione,argomento,materia,testo,punti,tipologia,opt1,opt2,opt3,opt4,opt5,popt1,popt2,popt3,popt4,popt5,fk_utente) values ('$nome','$descrizione','$argomento','$materia','$testo',$punti,'$tipologia',$opt $popt $ID);";
				$result = $db->query($sql);
			}
			else{
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
		

		
		
		
		$res=[];
		
		if($result){
			$res["status"]="success";
			echo(json_encode($res));
			http_response_code(200);
		}
		
		
		
	}
	else{
		$res=[];
		
		$res["status"]="failed";
		echo(json_encode($res));
		http_response_code(400);
		
	}
 
 ?>