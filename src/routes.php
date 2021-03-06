<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
///
/// http://localhost/apirest/public/api/v1/employee
///

// API group
$app->group('/api', function () use ($app) {
   
    //REGISTROUSUARIOS
    //$app->post('/rutacalculadora','funcionCalculadora');
    //$app->post('/sensores','funcionsensores');
    $app->get('/sensores','funciongetfugasdegas');
    $app->post('/sensores','funcioninsertatemperatura');
    $app->post('/consumoenergetico','funcioninsertaconsumoenergetico');
    $app->post('/fugasdegas','funcioninsertafugasdegas');
    $app->post('/nivelesdeagua','funcioninsertanivelesdeagua');
    $app->post('/luz','funcioninsertaluz');
    $app->post('/alarmas','funcioninsertaalarmas');
    $app->get('/fugasdegas','funciongetfugas');
    $app->get('/nivelesdeagua','funciongetniveles');
    $app->get('/consumoenergetico','funciongetconsumo');
    $app->get('/alarmas','funciongetalarma');
    $app->get('/luz','funciongetluz');





    

    

});
