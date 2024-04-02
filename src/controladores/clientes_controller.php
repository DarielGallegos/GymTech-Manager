<?php
include $_SERVER['DOCUMENT_ROOT'].'/GymTech-Manager-main/src/modelos/clientes_model.php';

class ctrClientes extends mdlClientes {

    public function get_clientes() {
        $data = mdlClientes::get_clientes();
        return $data;
    }
}
?>
