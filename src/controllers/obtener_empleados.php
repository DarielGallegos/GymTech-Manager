<?php
    include("../../configuracion/conexion.php");

    $respuesta = array();
    // Obtiene los parametros enviados del front
    $datos = json_decode(file_get_contents('php://input'), true);
    header('Content-Type: application/json');

    $conn = connectMySQL::getInstance()->createConnection();

    $query = "SELECT * FROM empleados";

    // Ejecutar consulta
    $stmt = $conn->prepare($query);
        $stmt->execute();

// Obtener resultados
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $rows = array();

    // Verificar si hay resultados y almacenarlos en el arreglo
    if ($results) {
        echo json_encode($results);
        return;
    }
    
    // Convertir resultados a JSON
    echo json_encode([]);
   