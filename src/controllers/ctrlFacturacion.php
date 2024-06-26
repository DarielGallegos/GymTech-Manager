<?php
    include($_SERVER['DOCUMENT_ROOT'].'/GymTech-Manager/src/models/mdlFacturacion.php');
    class CtrlFacturacion extends MdlFacturacion{
        public function getMembresiasDisponibles(){
            return MdlFacturacion::getMembresiasDisponibles();
        }
        public function getClientesAsociadosMembresia($id){
            return MdlFacturacion::getClientesAsociadosMembresia($id);
        }
        public function getDatosContables($data){
            return MdlFacturacion::getDatosContables($data);
        }
        public function insertFactura($header, $detalle, $pie){
            return MdlFacturacion::insertFactura($header, $detalle, $pie);
        }
    }

    if(isset($_POST['peticion'])){
        header('Content-Type: application/json; charset=utf-8');
        $response = array(
            'status' => 'error',
            'msg' => 'Error al procesar consulta',
            'data' => null
        );

        $controller = new CtrlFacturacion();
        extract($_POST);
        switch($peticion){
            case 'getClientesAsociados':
                $request = $controller->getClientesAsociadosMembresia($id);
                if($request[0]){
                    $response['status'] = 'success';
                    $response['msg'] = $request[1];
                    $response['data'] = $request[2];
                }else{
                    $response['status'] = 'error';
                    $response['msg'] = $request[1];
                    $response['data'] = null;
                }
                echo json_encode($response);
                break;
            case 'getDataContable':
                $request = $controller->getDatosContables($data);
                if($request[0]){
                    $response['status'] = 'success';
                    $response['msg'] = $request[1];
                    $response['data'] = $request[2];
                }else{
                    $response['status'] = 'error';
                    $response['msg'] = $request[1];
                    $response['data'] = null;
                }
                echo json_encode($response);
                break;
            case 'insertFactura':
                $request = $controller->insertFactura($header, $detalle, $footer);
                if($request[0]){
                    $response['status'] = 'success';
                    $response['msg'] = $request[1];
                    $response['data'] = $request[2];
                }else{
                    $response['status'] = 'error';
                    $response['msg'] = $request[1];
                    $response['data'] = null;
                }
                echo json_encode($response);
                break;
        }
    }
?>