<?php
define("WEBROOT", "http://localhost:8000/");
define("ROOT", dirname(__DIR__) . "/");

// Chargement automatique de toutes les classes via Composer
require_once  ROOT."vendor/autoload.php";

require_once ROOT."core/helpers.php";
require_once ROOT."core/validator.php";

require_once ROOT."src/routes/router.php";
