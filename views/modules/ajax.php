<?php
session_start();

require_once "../../models/conection.php";

$_SESSION["ruta_image"];

if(isset( $_POST["color"])){

	$color = $_POST["color"];
	$_SESSION["color"] = $color;

	$stmt3 = Conection::connect()->prepare("SELECT email FROM personalizar WHERE email = :email");
		$stmt3->bindParam(":email", $_SESSION["email_user"], PDO::PARAM_STR);
		$stmt3->execute();
		$result = $stmt3->fetch();
		if($result["email"] == $_SESSION["email_user"]){
			$stmt4 = Conection::connect()->prepare("UPDATE personalizar SET colorname=:colorname WHERE email=:email");
			$stmt4->bindParam(":colorname", $_SESSION["color"], PDO::PARAM_STR);
			$stmt4->bindParam(":email", $_SESSION["email_user"], PDO::PARAM_STR);
			if ($stmt4->execute()){

			    echo $_SESSION["color"];}
			else{
				echo "#bcd3d4";
			}
		}

		else{
			 $stmt = Conection::connect()->prepare("INSERT INTO personalizar(email, colorname) VALUES (:email, :colorname)");
			

			$stmt->bindParam(":email", $_SESSION["email_user"], PDO::PARAM_STR);
			$stmt->bindParam(":colorname", $_POST["color"], PDO::PARAM_STR);
			
			if ($stmt->execute()){

					$stmt2 = Conection::connect()->prepare("SELECT colorname, email FROM personalizar WHERE email = :email2");
					$stmt2->bindParam(":email2", $_SESSION["email_user"], PDO::PARAM_STR);
					$stmt2->execute();
					$stmt2->fetch();
					echo $_SESSION["color"];
				}
				else{

					echo "#bcd3d4";
				}

		}
}

if(isset( $_GET["colorR"])){

	$stmt5 = Conection::connect()->prepare("SELECT email, colorname FROM personalizar WHERE email = :email5");
	$stmt5->bindParam(":email5", $_SESSION["email_user"], PDO::PARAM_STR);
	$stmt5->execute();
	$stmt_color = $stmt5->fetch();
	$_SESSION["color"] = $stmt_color["colorname"];
		echo $_SESSION["color"];
}


if(isset( $_GET["user"])){
	$stmt6 = Conection::connect()->prepare("SELECT id, user, idcompany FROM allusers");
	$stmt6->execute();
	$result = $stmt6->fetchAll();
	$q = $_GET["user"];
	$hint = "";
	$email = "";
		if($q !== "") {
	    $q = strtolower($q);
	    $len = strlen($q);
	    foreach($result as $i) {
	    	$name = $i["user"];
	    	$id_u = $i["id"];
	    	$idcompany_u = $i["idcompany"];
	        if (stristr($q, substr($name["user"], 0, $len))) {
	            if ($hint === "") {
	                $hint = $name;
	                $id = $id_u;
	                $idcompany = $idcompany_u;
	            } else {
	            	$hint .=", $name";
	            	$id .=", $id_u";
	            	$idcompany .=", $idcompany_u";
	            }
	        }
	    }
	}

	if(stristr($hint, ", ")){
		$user = explode(", ", $hint);
		$id2 = explode(", ", $id);
		$idcompany2 = explode(", ", $idcompany);
		$array_users = array("user"=> $user, "id"=> $id2, "idcompany"=> $idcompany2);
		$json = json_encode($array_users);
		echo $json;
	}
	else{
		$array_users2 = array("user"=> $hint, "id"=> $id, "idcompany"=> $idcompany);
		$json2 = json_encode($array_users2);
		echo $json2;
	}

 }

 if(isset( $_GET["identify_id"])){
 	$result = $_GET["identify_id"];
 	$_SESSION["id_profile"] = $result;

	echo $_SESSION["id_profile"];
}

 if(isset( $_GET["receive_id"])){
 	$stmt = Conection::connect()->prepare("SELECT email, user FROM allusers WHERE id = :id");
	$stmt->bindParam(":id", $_SESSION["id_profile"], PDO::PARAM_STR);
	$stmt->execute();
	$stmt_email = $stmt->fetch();
	$email = $stmt_email["email"];
	$name = $stmt_email["user"];

	$stmt2 = Conection::connect()->prepare("SELECT colorname, description, colorbody, image, image_id, video, video_id FROM personalizar WHERE email = :email");
	$stmt2->bindParam(":email", $email, PDO::PARAM_STR);
 	$stmt2->execute();
	$stmt_results = $stmt2->fetch();
	$results = array("colorname"=>$stmt_results["colorname"], "colorbody"=>$stmt_results["colorbody"], "image"=>$stmt_results["image"], "image_id"=>$stmt_results["image_id"], "video_id"=>$stmt_results["video_id"], "name"=>$name, "description"=>$stmt_results["description"]);
	$json = json_encode($results);
	echo $json;
}


if(isset($_FILES["image"]["tmp_name"]))
{

	$image = $_FILES["image"]["tmp_name"];
	
	$random = mt_rand(100, 999);
	$ruta_server = "../../img/image-profile/image".$random.".jpg";
	$ruta_front = "img/image-profile/image".$random.".jpg";
	$origen = imagecreatefromjpeg($image);
	$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>180, "height"=>180]);
	move_uploaded_file($image, $ruta_server);
	$stmt = Conection::connect()->prepare("SELECT image, email FROM personalizar WHERE email = :email");
	$stmt->bindParam(":email", $_SESSION["email_user"], PDO::PARAM_STR);
	$stmt->execute();
	$stmt_image = $stmt->fetch();
	if($stmt_image["email"] != $_SESSION["email_user"]){
		$stmt2 = Conection::connect()->prepare("INSERT INTO personalizar(image) VALUES (:image) WHERE email = :email2");
		$stmt2->bindParam(":email2", $_SESSION["email_user"], PDO::PARAM_STR);
		$stmt2->bindParam(":image", $ruta_front, PDO::PARAM_STR);
		if($stmt2->execute()){
			$_SESSION["ruta_image"] = $ruta_front;
			echo $_SESSION["ruta_image"];
		}
	}
	else{
		if($stmt_image["image"] != null){
			unlink("../../".$stmt_image["image"]);
		}
		$stmt3 = Conection::connect()->prepare("UPDATE personalizar SET image=:image2 WHERE email=:email3");
		$stmt3->bindParam(":email3", $_SESSION["email_user"], PDO::PARAM_STR);
		$stmt3->bindParam(":image2", $ruta_front, PDO::PARAM_STR);
		if($stmt3->execute()){
			$_SESSION["ruta_image"] = $ruta_front;
			echo $_SESSION["ruta_image"];
		} 
	}
}

//cargar imagen
if(isset($_GET["receiveImage"])){
	if($_SESSION["ruta_image"] != null)
	{
		echo $_SESSION["ruta_image"];
	}
	else
	{
		echo "img/image-profile/default.png";
	}
}

if(isset($_GET["image_id"])){
	
	$stmt = Conection::connect()->prepare("SELECT email, image_id FROM personalizar WHERE email = :email");
	$stmt->bindParam(":email", $_SESSION["email_user"], PDO::PARAM_STR);
	$stmt->execute();
	$stmt_idimage = $stmt->fetch();
	if($stmt_idimage["email"] != $_SESSION["email_user"]){
		$stmt2 = Conection::connect()->prepare("INSERT INTO personalizar(image_id) VALUES (:image_id) WHERE email = :email2");
		$stmt2->bindParam(":image_id", $_GET["image_id"], PDO::PARAM_STR);
		$stmt2->bindParam(":email2", $_SESSION["email_user"], PDO::PARAM_STR);
		$stmt2->execute();	
	}
	else{
		$stmt3 = Conection::connect()->prepare("UPDATE personalizar SET image_id=:image_id2 WHERE email=:email3");
		$stmt3->bindParam(":image_id2", $_GET["image_id"], PDO::PARAM_STR);
		$stmt3->bindParam(":email3", $_SESSION["email_user"], PDO::PARAM_STR);
		$stmt3->execute();
	}
}

if(isset($_GET["receiveImageId"])){

	$stmt = Conection::connect()->prepare("SELECT email, image_id FROM personalizar WHERE email = :email");
	$stmt->bindParam(":email", $_SESSION["email_user"], PDO::PARAM_STR);
	$stmt->execute();
	$stmt_idimage = $stmt->fetch();
	if($stmt_idimage["email"] == $_SESSION["email_user"]){
		echo $stmt_idimage["image_id"];
	}
	else{
		echo 0;
	}

}
	

?>