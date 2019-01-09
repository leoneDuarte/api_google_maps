<?php
	include 'conf.php';

  
   $latitude  = $_POST['latitude'];
   $longitude = $_POST['longitude'];

   $sql = "INSERT INTO cordenadas(latitude,longitude) values ('$latitude',$longitude)";  
   

   if (!$result = $bd->query($sql)) {
   		//echo "error:".mysqli_error()."\n";
   		exit(); 	
   	}	

   	$bd->close();
   	echo"[DEBUG] cordenadas atualizadas"; 			

?>