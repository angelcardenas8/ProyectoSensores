<?php
class Consumo
{
  private $con;

  function __construct()
  {
    $db = new DbConnect;
    $this->con = $db->connect();
  }

  function __destruct()
  {
    $this->con = null;
  }
  public function getconsumo($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT * FROM consumoenergetico ORDER BY idcons desc limit 1";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("consumo", $req->id);      
        $statement->execute();        
        $response=$statement->fetchall(PDO::FETCH_OBJ)[0];
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }


    return json_encode($response);
  }
  public function insertaconsumoenergetico($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO consumoenergetico (fecha,hora,consumo,area) values (:fecha,:hora,:consumo,:area)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("fecha", $req->fecha);
        $statement->bindparam("hora", $req->hora);      
        $statement->bindparam("consumo", $req->consumo);    
        $statement->bindparam("area", $req->area);   
        $statement->execute();        
       // $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
}
