<script src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

<?php

require_once "controllers/controller_company.php";

$mvc = new MvcController_company();
$mvc -> template_company();

?>