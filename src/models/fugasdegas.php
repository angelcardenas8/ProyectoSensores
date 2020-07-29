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
  public function getfugas($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT * FROM temperatura ORDER BY idtemperatura desc limit 1";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("temperatura", $req->id);      
        $statement->execute();        
        $response=$statement->fetchall(PDO::FETCH_OBJ)[0];
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }


    return json_encode($response);
  }
  public function insertafugasdegas($request)
  {
    $req = json_decode($request->getbody());
    //////////////////////////////////////////////////////////////////////////////////////////////////
    if($req->fechayhora!=null && $req->area!=null && $req->niveldegas!=null){

      $sql = "INSERT INTO fugas (fechayhora,area,niveldegas) values (:fechayhora,:area,:niveldegas)";
      $response=new stdClass();
        try {
          $statement = $this->con->prepare($sql);
          $statement->bindparam("fechayhora", $req->fechayhora);      
          $statement->bindparam("area", $req->area);   
          $statement->bindparam("niveldegas", $req->niveldegas);   
          $statement->execute();
          $response=$req;
         // $response->result=$statement->fetchall(PDO::FETCH_OBJ);
        } catch (Exception $e) {
          $response->mensaje = $e->getMessage();
        }

    }
    
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($req->fechayhora!=null && $req->consumo!=null && $req->area!=null){
  $sql = "INSERT INTO consumoenergetico (fechayhora,consumo,area) values (:fechayhora,:consumo,:area)";
  $response=new stdClass();
  try {
    $statement = $this->con->prepare($sql);
    $statement->bindparam("fechayhora", $req->fechayhora);
    $statement->bindparam("consumo", $req->consumo);    
    $statement->bindparam("area", $req->area);   
    $statement->execute();     
    $response=$req;   
   // $response->result=$statement->fetchall(PDO::FETCH_OBJ);
  } catch (Exception $e) {
    $response->mensaje = $e->getMessage();
  }
  
}     
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($req->fechayhora!=null && $req->temperatura!=null){
  $sql = "INSERT INTO temperatura (fechayhora,temperatura,zona) values (:fechayhora,:temperatura,:zona)";
  $response=new stdClass();
    try {
      $statement = $this->con->prepare($sql);
      $statement->bindparam("fechayhora", $req->fechayhora);
      $statement->bindparam("temperatura", $req->temperatura);
      $statement->bindparam("zona", $req->zona);      
      
      $statement->execute();        
     // $response->result=$statement->fetchall(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      $response->mensaje = $e->getMessage();
    }
  
} 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////     
if($req->fechayhora!=null && $req->tipocontenedor!=null && $req->porcentaje!=null){
  $sql = "INSERT INTO nivelesdeagua (fechayhora,tipocontenedor,porcentaje) values (:fechayhora,:tipocontenedor,:porcentaje)";
        $response=new stdClass();
          try {
            $statement = $this->con->prepare($sql);
            $statement->bindparam("fechayhora", $req->fechayhora);     
            $statement->bindparam("tipocontenedor", $req->tipocontenedor);   
            $statement->bindparam("porcentaje", $req->porcentaje);   
            $statement->execute();        
           // $response->result=$statement->fetchall(PDO::FETCH_OBJ);
          } catch (Exception $e) {
            $response->mensaje = $e->getMessage();
          }
          
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////     
if($req->fechayhora!=null && $req->porcentaje!=null){
  $sql = "INSERT INTO luz (fechayhora,porcentaje) values (:fechayhora,:porcentaje)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("fechayhora", $req->fechayhora);         
        $statement->bindparam("porcentaje", $req->porcentaje);   
        $statement->execute();        
       // $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }
        return json_encode($response);
  }
  if($req->fechayhora!=null && $req->problema!=null && $req->area!=null){
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO alarmas (fechayhora,problema,area) values (:fechayhora,:problema,:area)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("fechayhora", $req->fechayhora);             
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
   
}
