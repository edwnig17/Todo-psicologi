<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once ("../config/Conectar.php");
class Psycologa extends Conectar{

    public function get_psycologa(){
        try {
            $conectar=parent::Conexion();
            parent::set_name();
            $stm=$conectar->prepare("SELECT * FROM psicologas");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            return $e->getMessage();
        }
        
    }
 

    public function insert_psicologa($id_psicologa,$nombre,$especialidad,$edad){
        $conectar=parent::Conexion();
        parent::set_name();
        $stm="INSERT INTO psicologas(id_psicologa,nombre,especialidad,edad) VALUES(?,?,?,?)";
        $stm=$conectar->prepare($stm);
        $stm->bindValue(1,$id_psicologa);
        $stm->bindValue(2,$nombre);
        $stm->bindValue(3,$especialidad);
        $stm->bindValue(4,$edad);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);

    }


}

?>