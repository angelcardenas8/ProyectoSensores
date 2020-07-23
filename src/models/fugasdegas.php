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

    $sql = "INSERT INTO fugas (fechayhora,area,niveldegas) values (:fechayhora,:area,:niveldegas)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("fechayhora", $req->fechayhora);      
        $statement->bindparam("area", $req->area);   
        $statement->bindparam("niveldegas", $req->niveldegas);   
        $statement->execute();        
       // $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
}
