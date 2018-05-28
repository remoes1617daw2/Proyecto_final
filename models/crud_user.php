<?php
session_start();

require_once "conection.php";

class DatosUser extends Conection{

	public function descriptionModel($datosModel, $table){
		$stmt3 = Conection::connect()->prepare("SELECT email FROM personalizar WHERE email = :email4");
		$stmt3->bindParam(":email4", $_SESSION["email_user"], PDO::PARAM_STR);
		$stmt3->execute();
		$result_description = $stmt3->fetch();
		if($result_description["email"] == $_SESSION["email_user"]){
			$stmt4 = Conection::connect()->prepare("UPDATE personalizar SET description=:description3 WHERE email=:email3");
			$stmt4->bindParam(":description3", $datosModel["description"], PDO::PARAM_STR);
			$stmt4->bindParam(":email3", $_SESSION["email_user"], PDO::PARAM_STR);
			$stmt4->execute();
			if ($stmt4->execute()){
					$stmt5 = Conection::connect()->prepare("SELECT description, email FROM personalizar WHERE email = :email5");
					$stmt5->bindParam(":email5", $_SESSION["email_user"], PDO::PARAM_STR);
					$stmt5->execute();
					return $stmt5->fetch();
				}
				else{

					return "error";
				}
		}

		else{
			 $stmt = Conection::connect()->prepare("INSERT INTO $table(email, description) VALUES (:email, :description)");
			

			$stmt->bindParam(":email", $_SESSION["email_user"], PDO::PARAM_STR);
			$stmt->bindParam(":description", $datosModel["description"], PDO::PARAM_STR);
			
			if ($stmt->execute()){

					$stmt2 = Conection::connect()->prepare("SELECT description, email FROM personalizar WHERE email = :email2");
					$stmt2->bindParam(":email2", $_SESSION["email_user"], PDO::PARAM_STR);
					$stmt2->execute();
					return $stmt2->fetch();
				}
				else{

					return "error";
				}

		}

	}

}
?>