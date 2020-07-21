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
  
  public function insertaconsumoenergetico($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO consumoenergetico (fecha,hora,consumo) values (:fecha,:hora,:consumo)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("fecha", $req->fecha);
        $statement->bindparam("hora", $req->hora);      
        $statement->bindparam("consumo", $req->consumo);      
        $statement->execute();        
       // $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
}
