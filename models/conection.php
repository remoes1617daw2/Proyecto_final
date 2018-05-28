<?php

class Conection{

	public function connect(){
		$link = new PDO("mysql:host=localhost;dbname=custlook", "root", "root");
		return $link;

	}

}


?>