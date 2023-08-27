<?php

require_once"../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$response = new Response();
$response->setContent('Content');
$response->setStatusCode(200);
$response->headers->set('Content-Type', 'text/html');
$response->prepare($request);
$response->send();

// application php
// register command
#$application = new Application();
#$application->run();

/*
hf
konzolos applikácíó, application objektum
add new 2 paraméter
név, species parameterek-et adja a json tömbhöz

végeredmény:
command.php
data.json

1. 
php command.php add-new --name="New" --species="spec"

2. 
php command.php add-new
Name:
Species:
*/