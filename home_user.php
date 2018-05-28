
<?php
require_once "models/crud_user.php";
require_once "controllers/controller_user.php";
require_once "controllers/controller.php";

$mvc = new MvcController_user();
$mvc -> template_user();

?>