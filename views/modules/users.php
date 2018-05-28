<h1>Usuarios</h1>

<form method= "post">
	<label for="user-name">Nombre</label>
	<input type="text" name="name_user" required>
	<label for="user-surname">Apellidos</label>
	<input type="text" name="surname_user" required>
	<label for="user-email">Email</label>
	<input type="email" name="email_user" required>
	<label for="category-name">Rama profesional o habilidad</label>
	<input type="text" name="category_user" required>
	<label for="comunidad-name">Comunidad Autónoma</label>
	<select name="comunidad_user" id="comunidad" onchange="if (this.selectedIndex) get_provincia();" required>
	  <option class="no_enable" onclick="this.checked = !this.checked" value="no-enable">Selecciona una Comunidad autónoma</option>
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
	<select name="provincia_user" id="provincia" required>
		<option class="no_enable" value="no-enable">Selecciona una provincia</option>
	</select>
	<label for="user-password">Contraseña (6 o más carácteres)</label>
	<input type="password" pattern="{6,}" name="passwd_user" required title="6 carácteres mínimo">
	<input type="submit" value="Registrar">
</form>

<?php

$registerUser = new MvcController();
$registerUser -> registerUserController();

?>
