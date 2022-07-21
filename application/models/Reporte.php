<?php

class Reporte  extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    //CANTONES
    public function obtenerDatosBarrios(){
        $query = $this->db->get("locations");
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
}



?>