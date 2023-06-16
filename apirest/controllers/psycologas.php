<?php 

header('Content-Type: application/json');

require_once("../config/Conectar.php");
require_once("../models/Psycologa.php");


$psycologas=new Psycologa();

$body = json_decode(file_get_contents("php://input"), true); 

switch($_GET["op"]){

    case "GetAll":
       $datos=$psycologas->get_psycologa();
       echo json_encode($datos);
    break;

   

    case "insert":
        
        $datos=$psycologas->insert_psicologa($body["id_psicologa"], $body["nombre"],$body["especialidad"],$body["edad"]);
        echo json_encode("insertado correctamente");
  
      break;


}

    

?>