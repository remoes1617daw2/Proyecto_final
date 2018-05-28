<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Custlook</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/modernizr-custom.js" defer></script>
	<script src="js/script_profile.js" defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<h1>Users</h1>
	<header>
		<nav>
			<form>	
				 <input type="text" id="filter" onkeyup="searchUsers()">
			</form>
			<div id="cont_filter"></div>
			<ul>
				<li>
					<a href="home_user.php?action=networking">Networking</a>
				</li>
			</ul>
		</nav>
	</header>
	<input type="color" id="colorWell">
	<h3 id="name">
		<?php 
			echo $_SESSION["user"];		
		?>
	</h3>
	<form method="post">
		<textarea name="description">
		<?php
		$mvc2 = new MvcController_user();
		$mvc2 -> insert_description();
		echo $_SESSION["description"];
		?>
		</textarea>
		<input type="submit" value="Guardar">
	</form>	
</body>
</html>
