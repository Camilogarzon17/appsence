<?php
class serviceController{
    private $model;

    public function __construct(){
        $this->model = new serviceModel();
    }
    public function ins($serv_data = array()){
        return $this->model->ins($serv_data);
    }
    public function ins_service($sdet_data = array()){
        return $this->model->ins_service($sdet_data);
    }
    public function upd($serv_data = array()){
        return $this->model->upd($serv_data);
    }
    public function upd_service($serv_data = array()){
        return $this->model->upd_service($serv_data);
    }
    public function sel($serv_id = ''){
        return $this->model->sel($serv_id);
    }
    public function sel_service($sdet_id = ''){
        return $this->model->sel_service($sdet_id);
    }
    public function del($serv_id = ''){
        return $this->model->del($serv_id);
    }
    public function del_service($serv_id = ''){
        return $this->model->del_service($serv_id);
    }
}
