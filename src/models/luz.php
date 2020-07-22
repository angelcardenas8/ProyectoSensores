<?php
class Luz
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
  
  public function insertaluz($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO luz (hora,fecha,porcentaje) values (:hora,:fecha,:porcentaje)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("hora", $req->hora);
        $statement->bindparam("fecha", $req->fecha);      
        $statement->bindparam("porcentaje", $req->porcentaje);   
        $statement->execute();        
       // $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
}
