<?
require __DIR__ . '/../../src/models/luz.php';
function funcioninsertaluz($request){
    $objSensor= new Luz();
    return $objSensor->insertaluz($request);
}
function funciongetluz($request){
    $objSensor= new Luz();
    return $objSensor->getluz($request);
}