<?php
class bancoController{
    private $model;

    public function __construct(){
        $this->model = new bancoModel();
    }
    public function ins($ban_data = array()){
        return $this->model->ins($ban_data);
    }
    public function upd($ban_data = array()){
        return $this->model->upt($ban_data);
    }
    public function sel($ban_cod = ''){
        return $this->model->sel($ban_cod);
    }
    public function del($ban_cod = ''){
        return $this->model->del($ban_cod);
    }
}
