<?php
class quotationController{
    private $model;

    public function __construct(){
        $this->model = new quotationModel();
    }

    public function ins($coti_data = array()){
        return $this->model->ins($coti_data);
    }

    public function set_detalle($coti_query) {
        return $this->model->set_detalle($coti_query);
    }

    public function upd($coti_data = array()){
        return $this->model->upd($coti_data);
    }

    public function sel($coti_id = ''){
        return $this->model->sel($coti_id);
    }

    public function sel_estado($fest_id = ''){
        return $this->model->sel_estado($fest_id);
    }
    
    public function del($coti_id = ''){
        return $this->model->del($coti_id);
    }
}
