<?php
class Sensores
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

  public function insertarSensor($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO ejemplo(sensor,valor) VALUES(:sensor,:valor)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("sensor", $req->sensor);
        $statement->bindparam("valor", $req->valor);
        $statement->execute();
        $response=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  public function getfugasdegas($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT * FROM fugas ORDER BY idfuga desc limit 1";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("niveldegas", $req->id);      
        $statement->execute();        
        $response=$statement->fetchall(PDO::FETCH_OBJ)[0];
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }


    return json_encode($response);
  }
  public function insertatemperatura($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO Temperatura (Fecha,Hora,Temperatura) values (:Fecha,:Hora,:Temperatura)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("Fecha", $req->Fecha);
        $statement->bindparam("Hora", $req->Hora);      
        $statement->bindparam("Temperatura", $req->Temperatura);      
        $statement->execute();        
       // $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
}
