<?php
include("../repository/connectMySQL.php");
class mdlClientes extends connectMySQL{
    public function getClientes(){
        $sql = "CALL clientesGet()";
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorCode();
            }
            return [true, "Exito al procesar peticion", $result];
        }catch(PDOException $e){
            return [false, "Error al solicitar informacion", $e->getMessage()];
        }
    }
    public function deleteCliente($id){
        $sql = 'CALL clientesDelete(?)';
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            $statement->bindParam(1, $id);
            if($statement->execute()){
                $result = $statement->rowCount();
            }else{
                $result = $statement->errorCode();
            }
            return [true, "Exito al alterar registro", $result];
        }catch(PDOException $e){
            return [false, "Error al eliminar empleado", $e->getMessage()];
        }
    }
    public function insertClientes(
            $nombres,
            $apellidoP,
            $apellidoM,
            $dni,
            $fNac,
            $gen,
            $tel,
            $email,
            $IdEmpl,
            $estado,
            $plan_id,
            $plan_nombre,
            $mem_tip_id,
            $ID
        ){
        $sql = 'CALL clientesInsert(?,?,?,?,?,?,?,?,?,?,?,?,?)';
        /* if($ID != 0){
            $sql = 'CALL clientesUpdate(?,?,?,?,?,?,?,?,?,?,?)';
        } */
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            $statement->bindParam(1, $nombres);
            $statement->bindParam(2, $apellidoP);
            $statement->bindParam(3, $apellidoM);
            $statement->bindParam(4, $dni);
            $statement->bindParam(5, $fNac);
            $statement->bindParam(6, $gen);
            $statement->bindParam(7, $tel);
            $statement->bindParam(8, $email);
            $statement->bindParam(9, $IdEmpl);
            $statement->bindParam(10, $estado);
            $statement->bindParam(11, $plan_id);
            $statement->bindParam(12, $plan_nombre);
            $statement->bindParam(13, $mem_tip_id);
     
            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorCode();
            }

                return [true, "Exito al insertar registro", $result];
            
        }catch(PDOException $e){
            return [false, "Error al insertar cliente", $e->getMessage()];
        }
    }

    public function getMembresias(){
        $sql = "CALL tipoMembresiaGet()";
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

    public function getIntegrantes($prm_nombre_plan){
        $sql = "CALL membresiaIntegrantesGet(?)";
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            if($statement->execute([$prm_nombre_plan])){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result = $statement->errorCode();
            }
            return [true, "Exito al procesar peticion", $result];
        }catch(PDOException $e){
            return [false, "Error al solicitar informacion", $e->getMessage()];
        }
    }
}
?>