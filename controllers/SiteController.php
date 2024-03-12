<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

include_once 'Impianto.php';

class SiteController
{
    function index(Request $request, Response $response, $args)
    {
        $response->getBody()->write("Hello world!");
        return $response;
    }

    function show(Request $request, Response $response, $args)
    {
        $impianto = new Impianto();
        $response->getBody()->write(json_encode($impianto));
        return $response->withHeader('Content-Type', 'application/json');;
    }
}
