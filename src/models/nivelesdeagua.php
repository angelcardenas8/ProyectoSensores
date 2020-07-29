<?php
class Niveles
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
  
  public function getniveles($request)
  {

      $req = json_decode($request->getbody());

    $sql = "SELECT * FROM nivelesdeagua ORDER BY idniveles desc limit 1";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("porcentaje", $req->id);      
        $statement->execute();        
        $response=$statement->fetchall(PDO::FETCH_OBJ)[0];
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }

  public function insertanivelesdeagua($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO nivelesdeagua (hora,fecha,tipocontenedor,porcentaje) values (:hora,:fecha,:tipocontenedor,:porcentaje)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("hora", $req->hora);
        $statement->bindparam("fecha", $req->fecha);      
        $statement->bindparam("tipocontenedor", $req->tipocontenedor);   
        $statement->bindparam("porcentaje", $req->porcentaje);   
        $statement->execute();        
       // $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
}
