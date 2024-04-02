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
    public function insertClientes($nombres, $apellidoP, $apellidoM, $dni, $fInsc, $fNac, $gen, $tel, $email, $IdEmpl, $ID){
        $sql = 'CALL clientesInsert(?,?,?,?,?,?,?,?,?,?)';
        if($ID != 0){
            $sql = 'CALL clientesUpdate(?,?,?,?,?,?,?,?,?,?,?)';
        }
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($sql);
            $statement->bindParam(1, $nombres);
            $statement->bindParam(2, $apellidoP);
            $statement->bindParam(3, $apellidoM);
            $statement->bindParam(4, $dni);
            $statement->bindParam(5, $fInsc);
            $statement->bindParam(6, $fNac);
            $statement->bindParam(7, $gen);
            $statement->bindParam(8, $tel);
            $statement->bindParam(9, $email);
            $statement->bindParam(10, $IdEmpl);
            if($ID != 0){
                $statement->bindParam(11, $ID);
            }
            if($statement->execute()){
                $result = $statement->rowCount();
            }else{
                $result = $statement->errorInfo();
            }
            return [true, "Exito al insertar registro", $result];
        }catch(PDOException $e){
            return [false, "Error al eliminar empleado", $e->getMessage()];
        }
    }
}
?>