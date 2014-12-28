<?php
require_once("./vendor/autoload.php");
//create the controller and execute the action
$route = new \Irishdash\Router($_GET);

/** @var \Irishdash\Controllers\BaseController $controller */
$controller = $route->createController();
$controller->executeAction();































































