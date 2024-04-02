<?php
include("../models/mdlEmpleados.php");
class CtrlEmpleados extends mdlEmpleados
{
    public function getEmpleados()
    {
        return mdlEmpleados::getEmpleados();
    }
    public function getHorarios()
    {
        return mdlEmpleados::getHorarios();
    }
    public function getCargos(){
        return mdlEmpleados::getCargos();
    }
    public function deleteEmpleado($id){
        return mdlEmpleados::deleteEmpleado($id);
    }
}

if(isset($_POST['reg'])){
    header("Content-Type: application/json; charset=utf-8");
    $response = array(
        'status' => 'error',
        'message' => 'Error al ejecutar peticion',
        'data' => null
    );

    $controller = new CtrlEmpleados();

    extract($_POST);
    switch($reg){
        case 'deleteEmpleado':
            $request = $controller->deleteEmpleado($id);
            if($request[0]){
                $response['status'] = 'success';
                $response['message'] = $request[1];
                $response['data'] = $request[2];
            }else{
                $response['status'] = 'error';
                $response['message'] = $request[1];
                $response['data'] = $request[2];
            }
            echo json_encode($response);
            break;
    }
}
