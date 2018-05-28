<?php

require_once "conection.php";

class Datos extends Conection{

	//REGISTRO USUARIOS

	public function registerUserModel($datosModel, $table){

		$stmt = Conection::connect()->prepare("SELECT email FROM $table WHERE email = :emailselect");
		$stmt->bindParam(":emailselect", $datosModel["email"], PDO::PARAM_STR);
		$stmt->execute();
		$var_stmt = $stmt->fetch();

		if($var_stmt["email"] != $datosModel["email"]){
		$stmt = Conection::connect()->prepare("INSERT INTO $table(user, password, email, comunidad, provincia, category, idcompany) VALUES (:user, :password, :email, :comunidad, :provincia, :category, :id_company)");


		$stmt->bindParam(":user", $datosModel["user"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":comunidad", $datosModel["comunidad"], PDO::PARAM_STR);
		$stmt->bindParam(":provincia", $datosModel["provincia"], PDO::PARAM_STR);
		$stmt->bindParam(":category", $datosModel["category"], PDO::PARAM_STR);
		$stmt->bindParam(":id_company", $datosModel["id_company"], PDO::PARAM_STR); 

			if ($stmt->execute()){

				return "succes";

			}
			else{

				return "error";
			}

		}

		else{

			return "error";
		}

		$stmt->close();

	}

	public function registerCompanyModel($datosModel, $table){

		$stmt = Conection::connect()->prepare("SELECT user FROM $table WHERE user = :userselect");
		$stmt->bindParam(":userselect", $datosModel["user"], PDO::PARAM_STR);
		$stmt->execute();
		$var_stmt = $stmt->fetch();

		if($var_stmt["user"] != $datosModel["user"]){

			 $stmt = Conection::connect()->prepare("INSERT INTO $table(user, password, email, comunidad, provincia, category, managername, idcompany) VALUES (:user, :password, :email, :comunidad, :provincia, :category, :managername, :id_company)");


			$stmt->bindParam(":user", $datosModel["user"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
			$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
			$stmt->bindParam(":comunidad", $datosModel["comunidad"], PDO::PARAM_STR);
			$stmt->bindParam(":provincia", $datosModel["provincia"], PDO::PARAM_STR);
			$stmt->bindParam(":category", $datosModel["category"], PDO::PARAM_STR);
			$stmt->bindParam(":managername", $datosModel["manager"], PDO::PARAM_STR);
			$stmt->bindParam(":id_company", $datosModel["id_company"], PDO::PARAM_INT); 	

			if ($stmt->execute()){

				return "succes";

			}
			else{

				return "error";
			}

			$stmt->close();

		}

		else{
			return "error";
		}

	}

	public function loginModel($datosModel, $table){


		$stmt = Conection::connect()->prepare("SELECT email, password, idcompany, user FROM $table WHERE password = :password and email = :email");

		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->execute();
		$stmt_login = $stmt->fetch();

		$stmt2 = Conection::connect()->prepare("SELECT email, description, colorname FROM personalizar WHERE email = :email2");
		$stmt2->bindParam(":email2", $datosModel["email"], PDO::PARAM_STR);
		$stmt2->execute();
		$stmt_description = $stmt2->fetch();

		$datosLogin = array("emailModel"=>$stmt_login["email"], "userModel"=> $stmt_login["user"], "passwordModel"=>$stmt_login["password"], "idcompanyModel"=>$stmt_login["idcompany"], "descriptionModel"=>$stmt_description["description"]);


		return $datosLogin;
		
	}

}


?>