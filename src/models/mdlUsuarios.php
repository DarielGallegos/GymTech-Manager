<?php
    include($_SERVER['DOCUMENT_ROOT'].'/GymTech-Manager/src/repository/connectMySQL.php');
    class mdlUsuarios extends connectMySQL{
        public function getUsuarios(){
            $sql = 'CALL usuariosGet()';
            try{   
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, 'Exito al procesar consulta', $result];
            }catch(PDOException $e){
                return [false, 'Error al procesar consulta', $e->getMessage()];
            }
        }
        public function getEmpleadosSinUsuarios(){
            $sql = 'CALL usuariosGetEmpSinUsuario';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, 'Exito al ejecutar consulta', $result];
            }catch(PDOException $e){
                return [false, 'Error al ejecutar consulta', $e->getMessage()];
            }
        }
        public function insertUsuarios($registro){
            $sql = 'CALL usuariosInsert(?,?,?,?,?,?,?)';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $registro[0]['ID']);
                $statement->bindParam(2, $registro[0]['Alias']);
                $statement->bindParam(3, $registro[0]['Password']);
                $statement->bindParam(4, $registro[0]['pClientes']);
                $statement->bindParam(5, $registro[0]['pFacturacion']);
                $statement->bindParam(6, $registro[0]['pReporteria']);
                $statement->bindParam(7, $registro[0]['pAdministracion']);
                if($statement->execute()){
                    $result = $statement->rowCount();
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, 'Exito al ejecutar consulta', $result];
            }catch(PDOException $e){
                return [false, 'Error al ejecutar consulta', $e->getMessage()];

            }
        }
        public function usuariosGetOne($id){
            $sql = 'CALL usuariosGetOne(?)';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $id);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, 'Exito al ejecutar consulta', $result];
            }catch(PDOException $e){
                return [false, 'Error el ejecutar consulta', $e->getMessage()];
            }
        }
        public function updateUsuario($alias, $passwd, $pCliente, $pFact, $pRep, $pAdmin, $id){
            $sql = 'CALL usuariosUpdateSP(?,?,?,?,?,?)';
            if($passwd != ""){
                $sql = 'CALL usuariosUpdate(?,?,?,?,?,?,?)';
            }
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $alias);
                $statement->bindParam(2, $pCliente);
                $statement->bindParam(3, $pFact);
                $statement->bindParam(4, $pRep);
                $statement->bindParam(5, $pAdmin);
                $statement->bindParam(6, $id);
                if($passwd != ""){
                    $statement->bindParam(7, $passwd);
                }
                if($statement->execute()){
                    $result = $statement->rowCount();
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, 'Exito al ejecutar peticion', $result];
            }catch(PDOException $e){
                return [false, 'Error al ejecutar peticion', $e->getMessage()];
            }
        }
        public function deleteUsuario($id){
            $sql = 'CALL usuariosDelete(?)';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $id);
                if($statement->execute()){
                    $result = $statement->rowCount();
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, 'Exito al ejecutar peticion', $result];
            }catch(PDOException $e){
                return [false, 'Error al ejecutar peticion', $e->getMessage()];
            }
        }
    }
?>