<?php
session_start();

class MvcController_user{

	//LLAMADA A LA PLANTILLA

	public function template_user()
	{

		include "views/profile_user.php";

	}


	public function insert_description(){
		if(isset($_POST["description"])){
		$datosController = array("description"=>$_POST["description"]);

		$respond = DatosUser::descriptionModel($datosController, "personalizar");

			if($respond != "error")
			{
				if($_SESSION["email_user"] == $respond["email"]){
				$_SESSION["description"] = $respond["description"];
			 	}
				else{
				 	$_SESSION["description"] = "error";
				}
			}
			else{
				$_SESSION["description"] = "error";
			}

		}
	}
	
}


?>