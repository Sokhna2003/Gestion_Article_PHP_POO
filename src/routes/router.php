<?php
$controllers = [
    "article"   => "ArticleController",
    "categorie" => "CategorieController",
    "client"    => "ClientController"
];

$controllerKey = $_REQUEST["controller"] ?? "article";

if (array_key_exists($controllerKey, $controllers)) {
    $className = "App\\Controller\\" . $controllers[$controllerKey];

    $controllerObject = new $className();

    $action = $_REQUEST["action"] ?? "liste";

    if (method_exists($controllerObject, $action)) {
        $controllerObject->$action();
    } else {
        http_response_code(404);
        die("L'action '$action' n'existe pas dans le contrôleur " . $controllers[$controllerKey]);
    }
} else {
    http_response_code(404);
    die("Contrôleur introuvable dans le système de routage");
}
