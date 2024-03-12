<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

include_once 'Rilevatore.php';
include_once 'RilevatoreDiPressione.php';
include_once 'Impianto.php';

class RilevatoriPressioneController
{
    function index(Request $request, Response $response, $args)
    {
        $impianto = new Impianto();
        $response->getBody()->write(json_encode(["id" => $impianto->printRilevatoreUmidita()]));
        return $response->withHeader('Content-Type', 'application/json');
    }

    function show(Request $request, Response $response, $args)
    {
        $impianto = new Impianto();

        $id = $args['identificativo'];
        $rivelatore = null;

        foreach ($impianto->getRilevatoriUmidita() as $riv) {
            if (strtolower($riv->getId()) === strtolower($id)) {
                $rivelatore = $riv;
                break;
            }
        }

        if (!empty($rivelatore)) {
            $response->getBody()->write(json_encode($rivelatore));
        } else {
            $response->getBody()->write("RILEVATORE NON ESISTENTE");
        }
        return $response->withHeader('Content-Type', 'application/json');;
    }

    function showMisure(Request $request, Response $response, $args)
    {
        $impianto = new Impianto();

        $id = $args['identificativo'];
        $rivelatore = null;

        foreach ($impianto->getRilevatoriUmidita() as $riv) {
            if (strtolower($riv->getId()) === strtolower($id)) {
                $rivelatore = $riv;
                break;
            }
        }

        if (!empty($rivelatore)) {
            $response->getBody()->write(json_encode($rivelatore->printMisure()));
        } else {
            $response->getBody()->write("RILEVATORE NON ESISTENTE");
        }
        return $response->withHeader('Content-Type', 'application/json');;
    }

    function showMisureMaggiori(Request $request, Response $response, $args)
    {
        $impianto = new Impianto();

        $id = $args['identificativo'];
        $mis = $args['valore_minimo'];
        $rivelatore = null;

        foreach ($impianto->getRilevatoriUmidita() as $riv) {
            if (strtolower($riv->getId()) === strtolower($id)) {
                $rivelatore = $riv;
                break;
            }
        }

        if (!empty($rivelatore)) {
            $response->getBody()->write(json_encode($rivelatore->printMisureMaggiori($mis)));
        } else {
            $response->getBody()->write("RILEVATORE NON ESISTENTE");
        }
        return $response->withHeader('Content-Type', 'application/json');;
    }

}
