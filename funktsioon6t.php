<?php

     // yhendamine
	    require_once("config.php");
		$database="if15_jekavor";

	// loome uue funktsiooni
        function getClothes() {
			
			$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
			
			$stmt = $mysqli->prepare("SELECT id, user_id, clothes, brand, size, color FROM fashion WHERE deleted IS NULL");
			$stmt->bind_result($id, $user_id, $clothes, $brand, $size, $color_from_db);
			$stmt->execute();
			
			//tyhi  massiv kus hoiame objekte
			$array=array();
			
			
			while($stmt->fetch()){
				 // loon objekte
				$mode= new StdClass();
				$mode->id=$id;
				$mode->user_id = $user_id;
				$mode->clothes = $clothes;
				$mode->brand = $brand;
				$mode->size = $size;
				$mode->color = $color_from_db;
				
				    // lisame selle massiivi
					array_push($array, $mode);
				
			
		    }
			
			$stmt->close();
			$mysqli->close();
			
			return $array;
			
		}
		
		 
		
		function deleteMode($id_to_be_deleted){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
			
			$stmt = $mysqli->prepare("UPDATE fashion SET deleted=NOW() WHERE id=?");
			$stmt->bind_param("i", $id_to_be_deleted);
			
			if($stmt->execute()){
				header("Location: taabel.php");
				
			}
			
            $stmt->close();
		    $mysqli->close();
	    }
		
		
		
?>	