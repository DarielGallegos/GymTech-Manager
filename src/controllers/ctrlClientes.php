<?php
include(".././models/mdlClientes.php");
class ctrlClientes extends mdlClientes{
    public function getClientes(){
        return mdlClientes::getClientes();
    }
    public function insertClientes($nombres, $apellidoP, $apellidoM, $dni, $fInsc, $fNac, $gen, $tel, $email, $IdEmpl, $ID)
    {
        return mdlClientes::insertClientes($nombres, $apellidoP, $apellidoM, $dni, $fInsc, $fNac, $gen, $tel, $email, $IdEmpl, $ID);
    }
    public function deleteCliente($id)
    {
        return mdlClientes::deleteCliente($id);
    }
}

if(isset($_POST['cliente'])){
    header('Content-Type: application/json; charset=utf-8');
    $response = array(
        'status' => 'error',
        'msg' => 'Error al ejecutar peticion',
        'data' => null
    );

    $controller = new ctrlClientes();
    //Extraer toda la informacion de la peticion
    extract($_POST);
    switch($cliente){
        case 'insertCliente':
            $result = $controller->insertClientes($nombres, $apellidoP, $apellidoM, $dni, $fInsc, $fNac, $gen, $tel, $email, $IdEmpl, $ID);
            if($result[0]){
                $response['status'] = 'success';
                $response['msg'] = $result[1];
                $response['data'] = $result[2];
            }else{
                $response['status'] = 'error';
                $response['msg'] = $result[1];
                $response['data'] = $result[2];
            }
            echo json_encode($response);
            break;
        case 'updateCliente':
            $result = $controller->insertClientes($nombres, $apellidoP, $apellidoM, $dni, $fInsc, $fNac, $gen, $tel, $email, $IdEmpl, $ID);
            if($result[0]){
                $response['status'] = 'success';
                $response['msg'] = $result[1];
                $response['data'] = $result[2];
            }else{
                $response['status'] = 'error';
                $response['msg'] = $result[1];
                $response['data'] = $result[2];
            }
            echo json_encode($response);
            break;
        case 'deleteCliente':
            $result = $controller->deleteCliente($id);
            if($result[0]){
                $response['status'] = 'success';
                $response['msg'] = $result[1];
                $response['data'] = $result[2];
            }else{
                $response['status'] = 'error';
                $response['msg'] = $result[1];
                $response['data'] = $result[2];
            }
            echo json_encode($response);
            break;
    }
}
?>