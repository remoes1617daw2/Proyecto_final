<?php
session_start();

require_once "../../models/conection.php";

$color;


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
		}

		else{
			echo "#ffd700";
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
	$stmt6 = Conection::connect()->prepare("SELECT user, email FROM allusers");
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
	    	$email_u = $i["email"];
	    	$idcompany_u = $i["idcompany"];
	        if (stristr($q, substr($name["user"], 0, $len))) {
	            if ($hint === "") {
	                $hint = $name;
	                $email = $email_u;
	                $idcompany = $idcompany_u;
	            } else {
	            	$hint .=", $name";
	            	$email .=", $email_u";
	            	$idcompany .=", $idcompany_u";
	            }
	        }
	    }
	}

	if(stristr($hint, ", ")){
		$user = explode(", ", $hint);
		$email2 = explode(", ", $email);
		$idcompany2 = explode(", ", $idcompany);
		$array_users = array("user"=> $user, "email"=> $email2, "idcompany"=> $idcompany2);
		$json = json_encode($array_users);
		echo $json;
	}
	else{
		$array_users2 = array("user"=> $hint, "email"=> $email, "idcompany"=> $idcompany);
		$json2 = json_encode($array_users2);
		echo $json2;
	}

 }

 if(isset( $_GET["email"])){
	$json3 = json_encode($_GET["email"]);
	echo $json3;
}
		


?>