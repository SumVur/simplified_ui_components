<?php

include_once 'bootstrap.php';

$frontController = new \Barwenock\Routes\FrontController();
$frontController->dispatch();
