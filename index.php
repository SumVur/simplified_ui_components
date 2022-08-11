<?php

include_once 'vendor/autoload.php';
define('ROUTES_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'routes');
define('ASSETS_DIR', 'http://ui.components/assets/');

$frontController = new \Barwenock\Routes\FrontController();
$frontController->dispatch();
