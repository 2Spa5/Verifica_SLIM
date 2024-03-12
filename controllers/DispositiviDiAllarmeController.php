<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

include_once 'DispositivoDiAllarme.php';
include_once 'Impianto.php';

class DispositiviDiAllarmeController
{
    function index(Request $request, Response $response, $args)
    {
        $impianto = new Impianto();
        $response->getBody()->write(json_encode(["id" => $impianto->printDispAllarme()]));
        return $response->withHeader('Content-Type', 'application/json');
    }

    function show(Request $request, Response $response, $args)
    {
        $impianto = new Impianto();

        $id = $args['identificativo'];
        $disp = null;

        foreach ($impianto->getDispAllarme() as $dal) {
            if (strtolower($dal->getId()) === strtolower($id)) {
                $disp = $dal;
                break;
            }
        }

        if (!empty($disp)) {
            $response->getBody()->write(json_encode($disp));
        } else {
            $response->getBody()->write("DISPOSITIVO DI ALLERME NON ESISTENTE");
        }
        return $response->withHeader('Content-Type', 'application/json');;
    }
}
