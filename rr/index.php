<?php

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require __DIR__.'/vendor/autoload.php';

$request = Request::createFromGlobals();

//$request = new Response($request->query->get('alma'), 200);
$request = new JsonResponse(['alma'=> 3]);
$request->send();

header("Content Type: application=json");
print json_encode(['alma'=> 3]);
