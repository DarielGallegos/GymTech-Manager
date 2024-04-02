<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/GymTech-Manager-main/configuracion/conexion.php';

class mdlClientes extends connectMySQL
{
     //FUNCION PARA MOSTRAR LOS DATOS DE LA TABLA
     protected function get_clientes()
     {
         $sql = 'SELECT * FROM get_clientes';
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
}

?>
