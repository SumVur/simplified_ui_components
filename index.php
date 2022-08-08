<?php

include_once 'vendor/autoload.php';
define('ROUTES_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'routes');

$frontController = new \Barwenock\Routes\FrontController();
echo $frontController->dispatch();
