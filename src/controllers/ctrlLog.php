<?php
include($_SERVER['DOCUMENT_ROOT'].'/GymTech-Manager/src/models/mdlLog.php');
class CtrlLog extends mdlLog{
    public function getAccess($alias, $passwd){
        return mdlLog::getAccess($alias, $passwd);
    }
}

if(isset($_POST['log'])){
    header("Content-Type: application/json; charset=utf-8");
    $response = array(
        "status" => "error",
        "message" => "Credenciales no validas",
        "data" => null,
    );

    $controller = new CtrlLog();

    extract($_POST);
    switch($log){
        case 'getAccess':
            $request = $controller->getAccess($alias, $passwd);
            if($request[0]){
                $response['status'] = 'success';
                $response['message'] = $request[1];
                $response['data'] = $request[2];
            }else{
                $response['status'] = 'error';
                $response['message'] = $request[1];
                $response['data'] = null;
            }
            echo json_encode($response);
            break;
    }
}
?>