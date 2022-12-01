<?php
include_once __DIR__ . "/../vendor/autoload.php";

use app\controllers\siteController;
use app\core\Application;
$app = new Application(dirname(__DIR__));
$app->router->get("/",[siteController::class,"home"]);
$app->router->get("/contact","contact");
$app->router->post("/login",[\app\controllers\AuthController::class,"login"]);
$app->router->get("/login",[\app\controllers\AuthController::class,"login"]);
$app->router->get("/register",[\app\controllers\AuthController::class,"register"]);
$app->router->post("/register",[\app\controllers\AuthController::class,"register"]);
$app->run();
