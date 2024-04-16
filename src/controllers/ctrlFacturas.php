<?php
include("../models/mdlFacturas.php");
class CtrlFacturas extends mdlFacturas
{
    public function getFacturas()
    {
        return mdlFacturas::getFacturas();
    }
}
