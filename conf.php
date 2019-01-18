<?php
	//LEONE DUARTE DE OLIVEIRa
	$servername= 'localhost';
	$dbname = 'gps';
	$username = 'root';
	$password = '';

 	$bd = new mysqli($servername, $username, $password, $dbname);
 	
 	if($bd->connect_error){
 		die("[error] conection failed:".$mysqli->connnect_error);
 	}     
   
    $sql = "SELECT * FROM cordenadas";
    
    $query = $bd->query($sql);
    $i=0;
    
    while($rows = $query->fetch_assoc()) { 
        $row[$i]["Latitude"] =  $rows["latitude"];
        $row[$i]["Longitude"] = $rows["longitude"];  
        $i++;           
    }
    
    //var_dump($row);

	// TRANSFORMANDO CONSULTA NO BANCO DE DADOS EM JSON
	$dados_json = json_encode($row);

	//APAGANDO ARQUVO ANTIGO
	unlink("pontos.json");

	$fp = fopen("pontos.json", "a++");

	// Escreve o conteúdo JSON no arquivo
	$escreve = fwrite($fp, $dados_json);
	 
	// Fecha o arquivo
	fclose($fp);      
    
?>
