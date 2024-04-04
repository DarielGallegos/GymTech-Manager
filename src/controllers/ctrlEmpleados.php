<?php
include("../models/mdlEmpleados.php");
class CtrlEmpleados extends mdlEmpleados
{
    public function getEmpleados()
    {
        return mdlEmpleados::getEmpleados();
    }
    public function getOneEmpleado($id)
    {
        return mdlEmpleados::getOneEmpleado($id);
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
    public function insertEmpleados($nombres, $apellidoP, $apellidoM, $dni, $fechaNac, $genero, $id_cargo, $id_horario, $telefono, $email, $domicilio, $fechaIniLabores, $id)
    {
        return mdlEmpleados::insertEmpleados($nombres, $apellidoP, $apellidoM, $dni, $fechaNac, $genero, $id_cargo, $id_horario, $telefono, $email, $domicilio, $fechaIniLabores, $id);
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
        case 'insertEmpleados':
            $request = $controller->insertEmpleados($nombres, $apellidoP, $apellidoM, $dni, $fechaNac, $genero, $id_cargo, $id_horario, $telefono, $email, $domicilio, $fechaIniLabores, 0);
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
        case 'getOneEmpleado':
            $request = $controller->getOneEmpleado($id);
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
        case 'updateEmpleados':
            $request = $controller->insertEmpleados($nombres, $apellidoP, $apellidoM, $dni, $fechaNac, $genero, $id_cargo, $id_horario, $telefono, $email, $domicilio, $fechaIniLabores, $id);
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
        case 'deleteEmpleado':
            $request = $controller->deleteEmpleado($id);
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
