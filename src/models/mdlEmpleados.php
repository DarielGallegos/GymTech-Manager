<?php
include("../repository/connectMySQL.php");
    class mdlEmpleados extends connectMySQL{
        public function insertEmpleado($id){
            $sql = "CALL empleadosInsert(?,?,?,?,?,?,?,?,?,?,?,?)";
            if($id != 0){
                $sql = "CALL empleadosInsert(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            }
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                if($id != 0){
                    $statement->bindParam(13, $id);
                }
                //Falta pasar paramentros
                if($statement->execute()){
                    $result = $statement->rowCount();
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Insercion de Empleado correctamentes", $result];
            }catch(PDOException $e){
                return [false, "Error al insertar datos", $e->getMessage()];
            }
        }
        public function getEmpleados(){
            $sql = "CALL empleadosGet()";
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
        public function getHorarios(){
            $sql = "CALL horariosGet()";
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $resut = $statement->errorInfo();
                }
                return [true, "Exito al solicitar informacion", $result];
            }catch(PDOException $e){
                return [false, "Error al solicitar informacion", $e->getMessage()];
            }
        }
        public function getCargos(){
            $sql = "CALL cargoGet()";
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al solictar informacion", $result];
            }catch(PDOException $e){
                return [false, "Error al solicitar informacion", $e->getMessage()];
            }
        }
        public function deleteEmpleado($id){
            $sql = "CALL empleadosDelete(?)";
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $id);
                if($statement->execute()){
                    $result = $statement->rowCount();
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Empleado Eliminado Correctamente", $result];
            }catch(PDOException $e){
                return [false, "Error al eliminar empleado", $e->getMessage()];
            }
        }
    }
?>