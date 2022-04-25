<?php
class requestController{

    private $model;

    public function __construct(){
        $this->model = new requestModel();
    }

    public function ins($req_data = array()){
        return $this->model->ins($req_data);
    }

    public function upd($req_data = array()){
        return $this->model->upd($req_data);
    }
    
    public function upd_estado($soli_id,$soli_esta){
        return $this->model->upd_estado($soli_id,$soli_esta);
    }

    public function sel($req_id = ''){
        return $this->model->sel($req_id);
    }
    public function num_request(){
        return $this->model->num_request();
    }

    public function del($req_id = ''){
        return $this->model->del($req_id);
    }
}
