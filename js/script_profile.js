	var colorWell;
	var defaultColor;
	var result_email;
	var result_idcompany;
	var array_identify;
	window.addEventListener("load", startup, false);

//PAGE PROFILE

//get color picker
	function startup() {
	  colorWell = document.querySelector("#colorWell");
	  $.ajax({
		url:"views/modules/ajax.php?colorR",
		method:"GET",
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			colorWell.value = respuesta;
			var name_p = document.querySelector("#name");
			name_p.style.color = respuesta;
			console.log(respuesta);	
		}

		});
	  colorWell.addEventListener("input", updateFirst, false);
	  colorWell.addEventListener("change", updateAll, false);
	  colorWell.select();
	}

	function updateFirst(event) {
	  var div = document.querySelector("#name");

	  if (div) {
	    //div.style.color = event.target.value;
	    var color = event.target.value;
	    var datos = new FormData();
		datos.append("color", color);
	    $.ajax({
		url:"views/modules/ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){			
			div.style.color = respuesta;	
		}

		});
	  }
	}

	function updateAll(event) {
	  document.querySelectorAll("#name").forEach(function(div) {
	    div.style.color = event.target.value;
	  });
	}

	function searchUsers(){
		var cont_filter = document.getElementById("cont_filter");
		while(cont_filter.hasChildNodes())
			cont_filter.removeChild(cont_filter.childNodes[0]);

		var userFilter = document.getElementById("filter").value;
		//var data_user = new FormData();
		//data_user.append("user", userFilter);
		$.get("views/modules/ajax.php?user="+userFilter,
		function(respuesta){
			var array_users = JSON.parse(respuesta);
			console.log(respuesta);
			if(respuesta != null){
				result_id = array_users["id"];
				result_idcompany = array_users["idcompany"];
				for(var a = 0; a<array_users["user"].length; a++){
					var p = document.createElement("p");
					var p_att = p.setAttribute("id", "p_filter");
					var link = document.createElement("a");
					var link_href = link.setAttribute("href", "profile.php");
					var link_id = link.setAttribute("id", array_users["id"][a]);
					var link_onclick = link.setAttribute("onclick", "sendId("+array_users["id"][a]+")");
					var name = document.createTextNode(array_users["user"][a]);
					link.appendChild(name);
					p.appendChild(link);
					cont_filter.appendChild(p);
				}
			}
			
		});
	}

	function sendId(value){
		$.get("views/modules/ajax.php?identify_id="+value,
		function(respuesta){
			console.log(json);
		});
	}
