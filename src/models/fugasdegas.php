<?php
class Fugas
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
  
  public function insertafugasdegas($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO fugasdegas (fecha,hora,area,estado) values (:fecha,:hora,:area,:estado)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("fecha", $req->fecha);
        $statement->bindparam("hora", $req->hora);      
        $statement->bindparam("area", $req->area);   
        $statement->bindparam("estado", $req->estado);   
        $statement->execute();        
       // $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
}
