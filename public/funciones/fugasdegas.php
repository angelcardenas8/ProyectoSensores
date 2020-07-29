<?
require __DIR__ . '/../../src/models/fugasdegas.php';
function funcioninsertafugasdegas($request){
    $objSensor= new Fugas();
    return $objSensor->insertafugasdegas($request);
}
function funciongetfugas($request){
    $objSensor= new Fugas();
    return $objSensor->getfugas($request);
}