<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Custlook</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/modernizr-custom.js" defer></script>
	<script src="js/scripts.js" defer></script>
</head>
<body>
	<header>
		<nav>
			<figure>
				<img src="img/logo.svg" alt="logo">
			</figure>
			<ul><li><a href="index.php?action=empresas">Empresas</a></li></ul>
			<ul><li><a href="index.php?action=users">Candidatos</a></li></ul>
			<ul><li><a href="index.php?action=networking">Networking</a></li></ul>
			<form method="post">
				<input type="email" placeholder="Correo electrónico" name="email_login">
				<input type="password" pattern={6,} placeholder="Contraseña" name="passwd_login">
				<input type="submit" name="submit-login">
			</form>
		</nav>
	</header>
	
<section>
<?php

$mvc = new MvcController();
$mvc -> linksPagesController();
$mvc -> loginController();
?>	
</section>


</body>

</html>
