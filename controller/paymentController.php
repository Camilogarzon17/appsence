<?php
class paymentController
{
    private $model;

    public function __construct(){
        $this->model = new paymentModel();
    }
    public function ins($mpag_data = array()){
        return $this->model->ins($mpag_data);
    }
    public function upd($mpag_data = array()){
        return $this->model->upd($mpag_data);
    }
    public function sel($mpag_id = ''){
        return $this->model->sel($mpag_id);
    }
    public function del($mpag_id = ''){
        return $this->model->del($mpag_id);
    }
}
