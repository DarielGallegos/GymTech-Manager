
<?php
    include("../repository/connectMySQL.php");

    $respuesta = array();
    // Obtiene los parametros enviados del front
    $datos = json_decode(file_get_contents('php://input'), true);
    header('Content-Type: application/json');

    // extrae los datos en variables separadas
    $nombre = $datos["nombres"];
    $primerApellido = $datos["primer_apellido"];
    $segundoApellido = $datos["segundo_apellido"];
    $dni = $datos["dni"];
    $fechaNacimiento = $datos["nac"];
    $genero = $datos["genero"];
    $cargos = $datos["cargos"];
    $horarios = $datos["horarios"];
    $telefono = $datos["telefono"];
    $email = $datos["email"];
    $domicilio = $datos["domicilio"];
    $IniLabores = $datos["IniLab"];
   

    try {
        // conecta a la base de datos
        $conn = new connectMySQL();
        $condb = $conn->getInstance()->createConnection();
        //prepara la consulta
        $query = "CALL empleadosInsert(?,?,?,?,?,?,?,?,?,?,? ,?)";
        $statement = $condb->prepare($query);

        // le pasamos los datos que se insertarán en la consulta
        $statement->bindParam(1, $nombre);
        $statement->bindParam(2, $primerApellido);
        $statement->bindParam(3, $segundoApellido);
        $statement->bindParam(4, $dni);
        $statement->bindParam(5, $fechaNacimiento);
        $statement->bindParam(6, $genero); 
        $statement->bindParam(7, $cargos);
        $statement->bindParam(8, $horarios);  
        $statement->bindParam(9, $telefono);    
        $statement->bindParam(10, $email);   
        $statement->bindParam(11, $domicilio);
        $statement->bindParam(12, $IniLabores);
        
        // ejecuta la consulta
        $statement->execute();

        // envía respuesta al front
        $respuesta['msg'] = "El cliente se ha registrado correctamente.";
        $respuesta['success'] = true;
        $respuesta['error'] = 0;
        echo json_encode($respuesta);
        return false;

    } catch(PDOException $e){
        // valida error en la base de datos
        $respuesta['msg'] = "Error en la base de datos" . $e->getMessage();
        $respuesta['success'] = false;
        $respuesta['error'] = 1;
        echo json_encode($respuesta);
        return false;

    }