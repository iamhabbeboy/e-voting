<?php
session_start();
require __DIR__.'/vendor/autoload.php';
require 'utility.php';

use Abiodun\Exception\PageNotFoundException;

$query = isset($_GET['rel']) ? $_GET['rel'] : 'home';
$method = isset($_GET['method']) ? $_GET['method'] : 'index';
$controller = ucfirst($query) . 'Controller';

$filepath = 'App/' . $controller . '.php';

if (! file_exists($filepath)) {
    throw new PageNotFoundException("Controller not found ");
}

$namespaceWithController = 'Abiodun\App\\'. $controller;

$declaration = new $namespaceWithController;
$declaration->{$method}();
