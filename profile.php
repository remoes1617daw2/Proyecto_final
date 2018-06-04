<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Custlook</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/modernizr-custom.js" defer></script>
	<script src="js/script_profile.js" defer></script>
	<script src="js/script_viewprofile.js" defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

</head>
<h1>profile</h1>
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
<h3 id="name"><h3>
<p id="description"></p>
<figure>
	<img id="profile_picture" src="img/image-profile/default.png"></img>
</figure>