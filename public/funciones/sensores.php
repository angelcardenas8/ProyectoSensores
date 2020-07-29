<?
require __DIR__ . '/../../src/models/sensores.php';
function funcionsensores($request){
    $objSensor= new Sensores();
    return $objSensor->insertarSensor($request);
}
function funciongetfugasdegas($request){
    $objSensor= new Sensores();
    return $objSensor->getfugasdegas($request);
}
function funcioninsertatemperatura($request){
    $objSensor= new Sensores();
    return $objSensor->insertatemperatura($request);
}


