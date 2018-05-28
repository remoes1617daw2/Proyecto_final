<h1>Empresas</h1>

<form method= "post">
	<label for="company-name">Nombre de la empresa</label>
	<input type="text" name="name_company" required>
	<label for="company-email">Email</label>
	<input type="email" name="email_company" required>
	<label for="company-name-manager">Nombre del representante</label>
	<input type="text" name="name_manager_company" required>
	<label for="category-name">Rama profesional</label>
	<input type="text" name="category_company" required>
	<label for="comunidad-name">Comunidad Autónoma</label>
	<select name="comunidad_company" id="comunidad" onchange="if (this.selectedIndex) get_provincia();" required>
	  <option class="no_enable" value="no-enable">Selecciona una Comunidad autónoma</option>
	  <option value="andalucia">Andalucía</option>
	  <option value="aragon">Aragón</option>
	  <option value="cataluña">Cataluña</option>
	  <option value="asturias">Asturias</option>
	  <option value="cantabria">Cantabria</option>
	  <option value="castillayleon">Castilla y León</option>
	  <option value="castillalamancha">Castilla-La Mancha</option>
	  <option value="comunidadvalencia">Comunidad Valenciana</option>
	  <option value="extremadura">Extremadura Valenciana</option>
	  <option value="galicia">Galicia</option>
	  <option value="islasbaleares">Islas Baleares</option>
	  <option value="islascanarias">Islas Canarias</option>
	  <option value="larioja">La Rioja</option>
	  <option value="madrid">Madrid</option>
	  <option value="murcia">Murcia</option>
	  <option value="navarra">Navarra</option>
	  <option value="paisvasco">País Vasco</option>
	  <option value="ceuta">Ciudad Autónoma de Ceuta</option>
	  <option value="melilla">Ciudad Autónoma de Melilla</option>
	</select>
	<select name="provincia_company" id="provincia" required>
		<option class="no_enable" value="no-enable">Selecciona una provincia</option>
	</select>
	<label for="company-password">Contraseña (6 o más carácteres)</label>
	<input type="password" pattern="{6}" name="passwd_company" required title="6 carácteres mínimo">
	<input type="submit" value="Registrar">
</form>

<?php

$registerCompany = new MvcController();
$registerCompany -> registerCompanyController();

?>