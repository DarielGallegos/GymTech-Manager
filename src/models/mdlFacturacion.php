<?php
    include($_SERVER['DOCUMENT_ROOT'].'/GymTech-Manager/src/repository/connectMySQL.php');
    class MdlFacturacion extends connectMySQL{
        public function getMembresiasDisponibles(){
            $sql = 'CALL facturacionGetMembresias();';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, 'Exito al ejecutar peticion', $result];
            }catch(PDOException $e){
                return [false, 'Error al ejecutar peticion', $e->getMessage()];
            }
        }
        public function getClientesAsociadosMembresia($id){
            $sql = 'CALL facturacionGetClientesAsociados(?);';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $id);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, 'Exito al ejecutar peticion', $result];
            }catch(PDOException $e){
                return [false, 'Error al ejecutar peticion', $e->getMessage()];
            }
        }
        public function getDatosContables($data){
            $sql = 'CALL facturacionGetDataPago(?,?,?);';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sql);
                $statement->bindParam(1, $data['membresia']);
                $statement->bindParam(2, $data['cliente']);
                $statement->bindParam(3, $data['concepto']);
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
    }
?>