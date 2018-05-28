<?php
session_start();

class MvcController{

	//LLAMADA A LA PLANTILLA

	public function template(){

		include "views/template.php";
	}

	//INTERACCIÓN DEL USUARIO

	
	public function linksPagesController(){

		if(isset($_GET["action"])){

		$linksController = $_GET["action"];

		}

		else{

		$linksController = "inicio";
			
		}

		$respond = LinksPages::linksPagesModel($linksController);

		include $respond;

	}

	//REGISTRO DE USUARIOS

	public function registerUserController(){

		if(isset($_POST["name_user"])){
		$datosController = array("user"=>$_POST["name_user"]." ".$_POST["surname_user"], "email"=>$_POST["email_user"], "category"=>$_POST["category_user"], "comunidad"=>$_POST["comunidad_user"],"provincia"=>$_POST["provincia_user"], "password"=> $_POST["passwd_user"], "id_company" => 0);

		$respond = Datos::registerUserModel($datosController, "allusers");

			if($respond == "succes"){
				header("Location: index.php?action=user_ok");
			}
			else{
				header("Location: index.php");
			}

		}
	}

	public function registerCompanyController(){

		if(isset($_POST["name_company"])){
		$datosController = array("user"=>$_POST["name_company"], "email"=>$_POST["email_company"], "category"=>$_POST["category_company"],
		"manager"=>$_POST["name_manager_company"], "comunidad"=>$_POST["comunidad_company"],"provincia"=>$_POST["provincia_company"], "password"=> $_POST["passwd_company"], "id_company" => 1);

		$respond = Datos::registerCompanyModel($datosController, "allusers");

		
			if($respond == "succes"){
				header("Location: index.php?action=company_ok");

			}
			else{
				header("Location: index.php");
			}

		}

	}

	public function loginController(){

		if(isset($_POST["email_login"])){
		$datosController = array("email"=>$_POST["email_login"], "password"=> $_POST["passwd_login"]);

		$respond = Datos::loginModel($datosController, "allusers");
		$_SESSION["user"]= $respond["userModel"];
		$_SESSION["email_user"]= $respond["emailModel"];	
			if($respond["emailModel"] == $_POST["email_login"] && $respond["passwordModel"] == $_POST["passwd_login"]){
				$_SESSION["description"] = $respond["descriptionModel"];
				
				if($respond["idcompanyModel"] == 0){
					header("Location: home_user.php");}
				else{
					header("Location: home_company.php");
				}
			}
			else{
				header("Location: index.php");
			}
		}
	}

}



?>