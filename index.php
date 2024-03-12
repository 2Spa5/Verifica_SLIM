<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
include_once 'controllers/SiteController.php';
include_once 'controllers/DispositiviDiAllarmeController.php';
include_once 'controllers/RilevatoriPressioneController.php';
include_once 'controllers/RilevatoriUmiditaController.php';

$app = AppFactory::create();

$app->get('/', "SiteController:index");
$app->get("/impianto","SiteController:show");

$app->get('/dispositivi_di_allarme', "DispositiviDiAllarmeController:index");
$app->get('/dispositivi_di_allarme/{identificativo}', "DispositiviDiAllarmeController:show");

$app->get("/rilevatori_di_pressione","RilevatoriPressioneController:index");
$app->get("/rilevatori_di_pressione/{identificativo}","RilevatoriPressioneController:show");
$app->get("/rilevatori_di_pressione/{identificativo}/misurazioni","RilevatoriPressioneController:showMisure");
$app->get("/rilevatori_di_pressione/{identificativo}/misurazioni/maggiore_di/{valore_minimo}","RilevatoriPressioneController:showMisureMaggiori");

$app->get("/rilevatori_di_umidita","RilevatoriUmiditaController:index");
$app->get("/rilevatori_di_umidita/{identificativo}","RilevatoriUmiditaController:show");
$app->get("/rilevatori_di_umidita/{identificativo}/misurazioni","RilevatoriUmiditaController:showMisure");
$app->get("/rilevatori_di_umidita/{identificativo}/misurazioni/maggiore_di/{valore_minimo}","RilevatoriUmiditaController:showMisureMaggiori");




$app->run();
