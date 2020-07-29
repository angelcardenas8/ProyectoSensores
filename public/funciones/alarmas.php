<?
require __DIR__ . '/../../src/models/alarmas.php';
function funcioninsertaalarmas($request){
    $objSensor= new Alarmas();
    return $objSensor->insertaalarmas($request);
}
function funciongetalarma($request){
    $objSensor= new Alarmas();
    return $objSensor->getalarma($request);
}