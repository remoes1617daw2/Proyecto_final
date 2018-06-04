window.addEventListener("load", receiveId, false);

var image = "";

function receiveId(){

		$.get("views/modules/ajax.php?receive_id",
		function(respuesta){
			json = JSON.parse(respuesta);
			document.getElementById("name").innerHTML = json["name"];
			document.getElementById("name").style.color = json["colorname"];
			document.getElementById("description").innerHTML = json["description"];
			document.getElementById("profile_picture").src = json["image"];
			document.getElementById("profile_picture").style.display = (json["image_id"] == 1) ? "block" : "none";
		});
	
}
