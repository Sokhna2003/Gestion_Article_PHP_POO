<?php
define("WEBROOT", "http://localhost:8000/");
define("ROOT", dirname(__DIR__,2) . "/");
// define("ROOT", str_replace("public", "", $_SERVER['DOCUMENT_ROOT']));

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Chargement automatique de toutes les classes via Composer
require_once  ROOT. "vendor/autoload.php";

// Charge les variables du fichier .env
$dotenv = Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->load();

require_once ROOT . "src/core/helpers.php";
require_once ROOT . "src/core/validator.php";

require_once ROOT . "src/routes/router.php";
