<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/GymTech-Manager-main/configuracion/conexion.php';

class mdlEmpleados extends connectMySQL
{
     //FUNCION PARA MOSTRAR LOS DATOS DE LA TABLA
     protected function get_empleados()
     {
         $sql = 'SELECT * FROM get_empleados';
         try {
             $conexion = new connectMySQL();
             $conn = $conexion->createConnection();
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
/*
    protected function get_cargos()
     {
         $sql = 'SELECT ID, nombre FROM cargo';
         try {
             $conexion = new connectMySQL();
             $conn = $conexion->createConnection();
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
    }*/
}

?>
