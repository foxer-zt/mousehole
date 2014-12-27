<?php
require_once("./vendor/autoload.php");
//create the controller and execute the action
$loader = new \Irishdash\Loader($_GET);

/** @var \Irishdash\Controllers\BaseController $controller */
$controller = $loader->createController();
$controller->executeAction();































































