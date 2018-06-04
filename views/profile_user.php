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
	<div id="cont-picture">
		<figure>
			<img id="profile_picture" src= "img/image-profile/default.png"></img>
		</figure>
		<form method="post" enctype="multipart/form-data">
			<input type="file" id="image" name="image" required>
			<input type="submit" name="Guardar imagen">
		</form>
	</div>

<form>
  <input type="radio" id="image_si" name="valor_id" value="1" checked> Mostrar foto de perfil<br>
  <input type="radio" id="image_no" name="valor_id" value="0"> No mostrar foto de perfil<br>
</form> 

	<!-- <label class="switch">
	  <input onclick="image_id()" type="checkbox">
	  <span class="slider round"></span>
	</label> -->



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


<script type="text/javascript">
var image_path;
var image_si = document.getElementById("image_si");
var image_no = document.getElementById("image_no");
window.addEventListener("load", image_load, false);

function image_load()
{
	 $.get("views/modules/ajax.php?receiveImage", function(respuesta){
       document.getElementById("profile_picture").src = respuesta;
    });

	  $.get("views/modules/ajax.php?receiveImageId", function(respuesta){
       if(respuesta == 1){
       	document.getElementById("cont-picture").style.display = "block";
       	image_si.checked = true;
       	image_no.checked = false;
       }
       else{
       	document.getElementById("cont-picture").style.display = "none";
       	image_no.checked = true;
       	image_si.checked = false;
       }
    });
}
	
$("#image").change(function(){
	image = this.files[0];

	//validar tamaño de imagen

	imageSize = image.size;
	if(Number(imageSize) > 5000000){
		$("#colorWell").before("<div class='alert alert-warning alerta text-center'>El archivo no puede ser mayor de 2MB</div>");
	}
	else{
		$(".alerta").remove();
	}

	imageType = image.type;

	if(imageType == "image/jpeg" || imageType == "image/png"){
		$(".alerta").remove();
	}
	else{
		$("#colorWell").before("<div class='alert alert-warning alerta text-center'>El archivo debe ser formato JPG o PNG</div>");
	}
	
	if(Number(imageSize) < 5000000 && imageType == "image/jpeg" || imageType == "image/png")
	{

		    datos = new FormData();
		    datos.append("image", image);
			$.ajax({
			    url: 'views/modules/ajax.php',
			    method: 'POST',
			    data: datos,
			    cache: false,
			    contentType: false,
			    processData: false,
				success: function(respuesta) {
				    document.getElementById("profile_picture").src = respuesta;
				}
			});
	}

})
var valor;
$("input:radio").change(function(){
	if(image_si.checked == true){
		valor = 1;
		document.getElementById("cont-picture").style.display = "block";
	}
	else{
		valor = 0;
		document.getElementById("cont-picture").style.display = "none";
	}
	$.get("views/modules/ajax.php?image_id="+valor, function(respuesta) {
		  
		});
})


</script>
	
</body>

</html>
