<?php
include("../repository/connectMySQL.php");
    class mdlFacturas extends connectMySQL{
        public function getFacturas(){
            $sql = "CALL facturacionGetReport()";
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al solicitar informacion", $result];
            }catch(PDOException $e){
                return [false, "Error al solicitar informacion", $e->getMessage()];
            }
        }   
    }
?>