<?php
include($_SERVER['DOCUMENT_ROOT'].'/GymTech-Manager/src/repository/connectMySQL.php');
class mdlLog extends connectMySQL{
    public function getAccess($alias, $passwd){
        $query = "CALL logAccess(?,?)";
        try{
            $conn = connectMySQL::getInstance()->createConnection();
            $statement = $conn->prepare($query);
            $statement->bindParam(1, $alias);
            $statement->bindParam(2, $passwd);
            if($statement->execute()){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                if(count($result)>0){
                    $_SESSION['GYM']['id'] = $result[0]['ID_EMPLEADO'];
                    $_SESSION['GYM']['alias'] = $result[0]['alias'];
                    $_SESSION['GYM']['nombre'] = $result[0]['Nombre'];
                    $_SESSION['GYM']['clientes'] = $result[0]['clientes'];
                    $_SESSION['GYM']['membresias'] = $result[0]['membresias'];
                    $_SESSION['GYM']['facturacion'] = $result[0]['facturacion'] ;
                    $_SESSION['GYM']['seguridad'] = $result[0]['seguridad'];
                }
            }else{
                $result = $statement->errorCode();
            }
            return [true, "Credenciales Validas", $result];
        }catch(PDOException $e){
            return [false, "Credenciales No encontradas", $e->getMessage()];
        }
    }
}
?>