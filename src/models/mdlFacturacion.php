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
        public function insertFactura($header, $detalle, $pie){
            $sqlHeader = 'CALL facturacionInsertCabecera(?,?,?,?,?)';
            $sqlDetalle = 'CALL facturacionInsertDetalle(?,?,?,?,?,?,?,?)';
            $sqlFooter = 'CALL facturacionInsertPie(?,?,?,?)';
            try{
                $conn = connectMySQL::getInstance()->createConnection();
                $statement = $conn->prepare($sqlHeader);
                $statement->bindParam(1, $header['subtotal']);
                $statement->bindParam(2, $header['descuento']);
                $statement->bindParam(3, $header['sobrecargo']);
                $statement->bindParam(4, $header['total']);
                $statement->bindParam(5, $header['idEmpleado']);
                if($statement->execute()){
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    $result = $statement->errorInfo();
                }
                for($i=0; $i<count($detalle); $i++){
                    $statement = $conn->prepare($sqlDetalle);
                    $statement->bindParam(1, $result[0]['ID']);
                    $rgn = $i+1;
                    $statement->bindParam(2, $rgn);
                    $statement->bindParam(3, $detalle[$i]['idMembresia']);
                    $statement->bindParam(4, $detalle[$i]['idCliente']);
                    $statement->bindParam(5, $detalle[$i]['idConcepto']);
                    $statement->bindParam(6, $detalle[$i]['precio']);
                    $statement->bindParam(7, $detalle[$i]['sobrecargo']);
                    $statement->bindParam(8, $detalle[$i]['descuento']);
                    $statement->execute();
                    $statement = null;
                }
                $statement = $conn->prepare($sqlFooter);
                $statement->bindParam(1, $result[0]['ID']);
                $statement->bindParam(2, $pie['efectivo']);
                $statement->bindParam(3, $pie['monto']);
                $statement->bindParam(4, $pie['cambio']);
                if($statement->execute()){
                    $result = $statement->rowCount();
                }else{
                    $result = $statement->errorInfo();
                }
                return [true, "Exito al insertar Factura", $result];
            }catch(PDOException $e){
                return [false, 'Error al insertar factura', $e->getMessage()];
            }

        }
    }
?>