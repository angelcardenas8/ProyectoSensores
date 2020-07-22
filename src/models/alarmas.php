<?php
class Alarmas
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
  
  public function insertaalarmas($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO alarmas (hora,fecha,problema,area) values (:hora,:fecha,:problema,:area)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("hora", $req->hora);  
        $statement->bindparam("fecha", $req->fecha);    
        $statement->bindparam("problema", $req->problema); 
        $statement->bindparam("area", $req->area);      
        $statement->execute();        
       // $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
}
