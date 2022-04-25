<?php
class clientController{
    private $model;

    public function __construct(){
        $this->model = new clientModel();
    }
    public function ins($clie_data = array()){
        return $this->model->ins($clie_data);
    }
    public function ins_company($empr_data = array()){
        return $this->model->ins_company($empr_data);
    }
    public function upd($clie_data = array()){
        return $this->model->upd($clie_data);
    }
    public function upd_company($empr_data = array()){
        return $this->model->upd_company($empr_data);
    }
    public function sel($clie_id = ''){
        return $this->model->sel($clie_id);
    }
    public function sel_client_company($empr_id = ''){
        return $this->model->sel_client_company($empr_id);
    }
    public function sel_company($empr_id = ''){
        return $this->model->sel_company($empr_id);
    }
    public function sel_company_type($empr_id = ''){
        return $this->model->sel_company_type($empr_id);
    }
    public function del($clie_id = ''){
        return $this->model->del($clie_id);
    }
    public function del_company($empr_id = ''){
        return $this->model->del_company($empr_id);
    }
    public function client_company($clie_id = ''){
        return $this->model->client_company($clie_id);
    }
}
