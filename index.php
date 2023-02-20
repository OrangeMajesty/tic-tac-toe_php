<?php

session_start();

include __DIR__ . '/bootstrap.php';

$router = new Router();
echo $router->action($_REQUEST['route']);