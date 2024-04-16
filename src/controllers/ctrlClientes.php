<?php
include(".././models/mdlClientes.php");
class ctrlClientes extends mdlClientes{
    public function getClientes(){
        return mdlClientes::getClientes();
    }
    public function insertClientes($nombres, $apellidoP, $apellidoM, $dni, $fNac, $gen, $tel, $email, $IdEmpl, $estado, $plan_id, $plan_nombre,$mem_tip_id, $ID)
    {
        return mdlClientes::insertClientes($nombres, $apellidoP, $apellidoM, $dni, $fNac, $gen, $tel, $email, $IdEmpl, $estado, $plan_id, $plan_nombre,$mem_tip_id, $ID);
    }
    public function deleteCliente($id)
    {
        return mdlClientes::deleteCliente($id);
    }
    public function getMembresias(){
        return mdlClientes::getMembresias();
    }
    public function getIntegrantes($nombre_plan){
        return mdlClientes::getIntegrantes($nombre_plan);
    }

    public function clientesUpdate($nombres,$apellidoP,$apellidoM,$dni,$fNac,$gen,$tel,$email,$id){
        $data = mdlClientes::updateCliente($nombres, $apellidoP, $apellidoM, $dni, $fNac, $gen, $tel, $email, $id);
        return $data;
    }

    public function clientesGetOne($id){
        $data = mdlClientes::clientesGetOne($id);
        return $data;
    }
}


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    header('Content-Type: application/json; charset=utf-8');
    $response = array(
        'status' => 'error',
        'msg' => 'Error al ejecutar peticion',
        'data' => null
    );

    $controller = new ctrlClientes();

    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    extract($data);

    switch($cliente){
        case 'insertCliente':
            $result = $controller->insertClientes(
                    $nombres,
                    $primer_apellido,
                    $segundo_apellido,
                    $dni,
                    $fec_nacimiento,
                    $genero,
                    $telefono,
                    $email,
                    $empleado_id,
                    1,
                    $plan_id,
                    $plan_nombre,
                    $mem_tip_id,
                    0
            );

            if($result[0]){
                $response['status'] = 'success';
                $response['success'] = true;
                $response['msg'] = $result[1];
                $response['error'] = 0;
                $response['data'] = $result[2];
            }else{
                $response['success'] = false;
                $response['msg'] = $result[1];
                $response['error'] = 1;
                $response['data'] = $result[2];
            }
            echo json_encode($response);
        break;
        case 'getOneCliente':
            $request = $controller->clientesGetOne($id);
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
        case 'clientesUpdate':
            $request = $controller->clientesUpdate($nombres, $apellidoP, $apellidoM, $dni, $fNac, $gen, $tel, $email, $id);
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
        default:;
        break;
    }
} 

if(isset($_GET['nombre_plan'])){
    header('Content-Type: application/json; charset=utf-8');
    $response = array(
        'status' => 'error',
        'msg' => 'Error al ejecutar peticion',
        'data' => null
    );

    $controller = new ctrlClientes();
    //Extraer toda la informacion de la peticion
    /* extract($_GET); */
    switch($_GET['metodo']){
        case 'getMembresiaIntegrantes':
            $result = $controller->getIntegrantes($_GET['nombre_plan']);
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