<?php
    include($_SERVER['DOCUMENT_ROOT'].'/GymTech-Manager/src/models/mdlUsuarios.php');
    class CtrlUsuarios extends mdlUsuarios{
        public function getUsuarios(){
            return mdlUsuarios::getUsuarios();
        }
        public function getEmpleadosSinUsuarios(){
            return mdlUsuarios::getEmpleadosSinUsuarios();
        }
        public function insertUsuarios($registro){
            return mdlUsuarios::insertUsuarios($registro);
        }
        public function usuariosGetOne($id){
            return mdlUsuarios::usuariosGetOne($id);
        }
        public function updateUsuario($alias, $passwd, $pCliente, $pFact, $pRep, $pAdmin, $id){
            return mdlUsuarios::updateUsuario($alias, $passwd, $pCliente, $pFact, $pRep, $pAdmin, $id);
        }
        public function deleteUsuario($id){
            return mdlUsuarios::deleteUsuario($id);
        }
    }

    if(isset($_POST['peticion'])){
        header('Content-Type: application/json; charset=utf-8');
        $response = array(
            'status' => 'error',
            'msg' => 'Error al crear peticion',
            'data' => null
        );

        $controller = new CtrlUsuarios();

        extract($_POST);
        switch($peticion){
            case 'insertUsuario':
                $request = $controller->insertUsuarios($register);
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
            case 'getUsuario':
                $request = $controller->usuariosGetOne($id);
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
            case 'updateUsuario':
                $request = $controller->updateUsuario($alias, $passwd, $pCliente, $pFact, $pRep, $pAdmin, $id);
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
            case 'deleteUsuario':
                $request = $controller->deleteUsuario($id);
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