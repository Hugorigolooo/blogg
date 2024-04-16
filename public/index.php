<?php

// Inclusion des en-têtes de sécurité
require_once('../config/security_headers.php');

require '../config/dev.php';
require '../vendor/autoload.php';
$router = new \App\config\Router();
$router->run();
