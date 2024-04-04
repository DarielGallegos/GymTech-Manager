<?php
include("../repository/connectMySQL.php");
    class mdlEmpleados extends connectMySQL{
        public function insertEmpleados($nombres, $apellidoP, $apellidoM, $dni, $fechaNac, $genero, $id_cargo, $id_horario, $telefono, $email, $domicilio, $fechaIniLabores, $id){
            $sql = "CALL empleadosInsert(?,?,?,?,?,?,?,?,?,?,?,?)";
            if($id != 0){
                $sql = "CALL empleadosUpdate(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            }
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $nombres);
                $statement->bindParam(2, $apellidoP);
                $statement->bindParam(3, $apellidoM);
                $statement->bindParam(4, $dni);
                $statement->bindParam(5, $fechaNac);
                $statement->bindParam(6, $genero);
                $statement->bindParam(7, $id_cargo);
                $statement->bindParam(8, $id_horario);
                $statement->bindParam(9, $telefono);
                $statement->bindParam(10, $email);
                $statement->bindParam(11, $domicilio);
                $statement->bindParam(12, $fechaIniLabores);
                if($id != 0){
                    $statement->bindParam(13, $id);
                }
                if($statement->execute()){
                    $result = $statement->rowCount();
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al ejecutar peticion", $result];
            }catch(PDOException $e){
                return [false, "Error al ejecutar peticion", $e->getMessage()];
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
        public function getOneEmpleado($id){
            $sql = 'CALL empleadosGetOne(?)';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $id);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al solicitar registro", $result];
            }catch(PDOException $e){
                return [false, "Error al procesar consulta", $e->getMessage()];
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