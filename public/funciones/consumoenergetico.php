<?
require __DIR__ . '/../../src/models/consumoenergetico.php';
function funcioninsertaconsumoenergetico($request){
    $objSensor= new Consumo();
    return $objSensor->insertaconsumoenergetico($request);
}