<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/lib/Framework/Core.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$app = new Framework\Core();

$response = $app->handle($request);
$response->send();
