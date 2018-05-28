function get_provincia(){
	var select_provincia = document.getElementById("provincia");
		while(select_provincia.hasChildNodes())
			select_provincia.removeChild(select_provincia.childNodes[0]);
	var comunidad = document.getElementById("comunidad").value;
	var provincias = new Object();
	provincias.andalucia = new Array('Almería','Cádiz', 'Córdoba', 'Granada', 'Huelva', 'Jaén', 'Málaga', 'Sevilla');
	provincias.aragon = new Array('Huesca', 'Teruel', 'Zaragoza');
	provincias.cataluña = new Array('Barcelona', 'Girona', 'Lleida', 'Tarragona');
	provincias.asturias = new Array('Asturias');
	provincias.cantabria = new Array('Cantabria');
	provincias.castillayleon = new Array('Burgos', 'Soria', 'Segovia', 'Ávila', 'León','Zamora','Salamanca', 'Valladolid', 'Palencia');
	provincias.castillalamancha = new Array('Toledo', 'Ciudad Real', 'Cuenca', 'Guadalajara', 'Albacete');
	provincias.comunidadvalencia = new Array('Castellón', 'Valencia ', 'Alicante');
	provincias.extremadura = new Array('Cáceres', 'Badajoz');
	provincias.galicia = new Array('La Coruña', 'Lugo', 'Orense', 'Pontevedra');
	provincias.islasbaleares = new Array('Islas Baleares');
	provincias.islascanarias = new Array('Santa Cruz de Tenerife', 'Palmas de Gran Canaria');
	provincias.larioja = new Array('La Rioja');
	provincias.madrid = new Array('Madrid');
	provincias.murcia = new Array('Murcia');
	provincias.navarra = new Array('Navarra');
	provincias.paisvasco = new Array('Álava', 'Vitoria', 'Vizcaya', 'Bilbao', 'Guipúzcoa', 'San Sebastián');
	provincias.ceuta = new Array('Ciudad Autónoma de Ceuta');
	provincias.melilla = new Array('Ciudad Autónoma de Melilla');

	if(comunidad != "")
	{
		for(var i in provincias)
		{		
			if(comunidad == i)
			{
				var index_provincias = provincias[i];
				var cont_provincias = index_provincias.length;
				var option_no_choose = document.createElement("option");
				option_no_choose.value = "no-enable";
				option_no_choose.innerHTML = "Selecciona una provincia";
				select_provincia.appendChild(option_no_choose);
				for(var j=0; j<cont_provincias; j++)
				{
					var option_provincia = document.createElement("option");
					var attrb_provincia = option_provincia.setAttribute("id","dinamic_option");
					option_provincia.value = index_provincias[j];
					option_provincia.innerHTML = index_provincias[j];
					select_provincia.appendChild(option_provincia);
					var dinamic_option = document.getElementById("dinamic_option");
				}			
			}
		}	
	}
}