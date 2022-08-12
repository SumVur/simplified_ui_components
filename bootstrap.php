<?php
require __DIR__ .'/vendor/autoload.php';
$config = include "./env.php";
define('ROUTES_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'routes');
define('CORE_JS_DIR', $config["CORE_JS_DIR"]);