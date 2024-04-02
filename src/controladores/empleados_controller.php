<?php
include $_SERVER['DOCUMENT_ROOT'].'/GymTech-Manager-main/src/modelos/empleados_model.php';

class ctrEmpleados extends mdlEmpleados {

    public function get_empleados() {
        $data = mdlEmpleados::get_empleados();
        return $data;
    }
   /*
    public function get_cargos() {
        $datos = mdlEmpleados::get_cargos();
        return $datos;
    }
*/
}
?>
