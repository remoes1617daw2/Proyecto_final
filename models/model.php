<?php

class LinksPages{

	public function linksPagesModel($linksModel){

		if($linksModel == "empresas" || 
		   $linksModel == "networking" ||
		   $linksModel == "users"){

			$module = "views/modules/".$linksModel.".php";

		}

		else if($linksModel == "inicio"){

			$module = "views/modules/inicio.php";

		}

		else if($linksModel == "company_ok"){

			$module = "views/modules/empresas.php";

		}

		else if($linksModel == "user_ok"){

			$module = "views/modules/users.php";

		}

		return $module;

	}

}


?>