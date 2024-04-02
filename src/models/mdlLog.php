<?php
include(".././repository/connectMySQL.php");
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