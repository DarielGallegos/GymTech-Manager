<?php
include(".././models/mdlLog.php");
include(".././config.php");
class CtrlLog extends mdlLog{
    public function getAccess($alias, $passwd){
        return mdlLog::getAccess($alias, $passwd);
    }
}

if(isset($_POST['log'])){
    header("Content-Type: application/json; charset=utf-8");
    $response = array(
        "status" => "Error",
        "message" => "Credenciales no validas",
        "data" => null,
    );

    $controller = new CtrlLog();

    extract($_POST);
    switch($log){
        case 'getAccess':
            $request = $controller->getAccess($alias, $passwd);
            if($request[0]){
                $response['status'] = 'Success';
                $response['message'] = $request[1];
                $response['data'] = $request[2];
                session_start();
                $_SESSION['GYM'] = $request[2];
                cargarVista("main");
            }else{
                $response['status'] = 'error';
                $response['message'] = $request[1];
                $response['data'] = $request[2];
            }
            echo json_encode($response);
            break;
    }
}
?>