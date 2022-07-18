<?php
require __DIR__.'/../bootstrap.php';

use App\router\Router;

$route = new Router();

$route->Router();

$uri = $_SERVER['REQUEST_URI'];
$uriAlerta = '/adm/alerta-estoque';





