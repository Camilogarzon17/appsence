<?php
class typeController{
    private $model;

    public function __construct(){
        $this->model = new typeModel();
    }
    public function ins($tipo_data = array()){
        return $this->model->ins($tipo_data);
    }
    public function upd($tipo_data = array()){
        return $this->model->upd($tipo_data);
    }
    public function sel($tipo_id = ''){
        return $this->model->sel($tipo_id);
    }
    public function del($tipo_id = ''){
        return $this->model->del($tipo_id);
    }
    public function get_mes($mes_id = ''){
        return $this->model->get_mes($mes_id);
    }
    public function get_tipo_pago($tpag_id = ''){
        return $this->model->get_tipo_pago($tpag_id);
    }
}
