<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include($_SERVER['DOCUMENT_ROOT'] . '/GymTech-Manager/src/repository/connectMySQL.php');

class mdlEmpleados extends connectMySQL
{
    //FUNCION PARA MOSTRAR LOS DATOS DE LA TABLA
    protected function get_empleados()
    {
        $sql = 'SELECT * FROM get_empleados';

        try {
            
            $conn = connectMySQL::getInstance()->createConnection();
            $query = $conn->prepare($sql);

            if ($query->execute()) {
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                return [TRUE, "LA CONSULTA SE EJECUTÓ CORRECTAMENTE", $resultado];
            } else {
                $resultado = $query->errorInfo();
                return [FALSE, 'ERROR EN LA CONSULTA: ', $resultado];
            }
        } catch (PDOException $e) {
            return [FALSE, 'ERROR EN LA CONSULTA: ', $e->getMessage()];
        }
    }

//Funcion para registrar un empleado
protected function insertEmpleados($id, $nombres, $apellidoP, $apellidoM, $dni, $fechaNac, $genero, $id_cargo, $id_horario, $telefono, $email, $domicilio, $fechaIniLabores)
{
    if ($id == '') {
        $sql = "CALL INSERT_EMPLEADOS(?,?,?,?,?,?,?,?,?,?,?,?)";
        
    }
    error_log("Query ejecutada: " . $sql);

    try {
        $conn = connectMySQL::getInstance()->createConnection();
        $query = $conn->prepare($sql);
        $query -> bindParam(1, $nombres);
        $query -> bindParam(2, $apellidoP);
        $query -> bindParam(3, $apellidoM);
        $query -> bindParam(4, $dni);
        $query -> bindParam(5, $fechaNac);
        $query -> bindParam(6, $genero);
        $query -> bindParam(7, $id_cargo);
        $query -> bindParam(8, $id_horario);
        $query -> bindParam(9, $telefono);
        $query -> bindParam(10, $email);
        $query -> bindParam(11, $domicilio);
        $query -> bindParam(12, $fechaIniLabores);
        if($id != ''){
            $query -> bindParam(13, $id);
        }
        error_log("Query ejecutada: " . $sql);


        if ($query->execute()) {
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = $query -> errorInfo();
        }
        return true;
        
    } catch (PDOException $e) {
        error_log($e -> getMessage());
        return false;
    }
}
}
?>
