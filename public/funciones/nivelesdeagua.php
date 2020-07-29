<?
require __DIR__ . '/../../src/models/nivelesdeagua.php';
function funcioninsertanivelesdeagua($request){
    $objSensor= new Niveles();
    return $objSensor->insertanivelesdeagua($request);
}
function funciongetniveles($request){
    $objSensor= new Niveles();
    return $objSensor->getniveles($request);
}