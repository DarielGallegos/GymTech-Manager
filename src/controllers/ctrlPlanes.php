<?php
include("../models/mdlPlanes.php");
class ctrlPlanes extends mdlPlanes
{
    public function getPlanes()
    {
        return mdlPlanes::getPlanes();
    }

}
?>