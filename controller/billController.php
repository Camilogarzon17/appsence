<?php
class billController{
    private $model;

    public function __construct(){
        $this->model = new billModel();
    }

    public function ins($fac_data = array()){
        return $this->model->ins($fac_data);
    }
    public function ins_payment($pay_data = array()){
        return $this->model->ins_payment($pay_data);
    }

    public function set_detalle($facts_query) {
        return $this->model->set_detalle($facts_query);
    }
    public function fact_grafic($empr_id = '',$fact_est = false){
        return $this->model->fact_grafic($empr_id,$fact_est);
    }
    public function pays_total($empr_id){
        return $this->model->pays_total($empr_id);
    }
    
    public function upd($fac_data = array()){
        return $this->model->upd($fac_data);
    }
    public function upd_status($fact_id,$fact_est){
        return $this->model->upd_status($fact_id,$fact_est);
    }
    public function upd_precio($fact_id,$fact_vto){
        return $this->model->upd_precio($fact_id,$fact_vto);
    }

    public function sel($fact_id = ''){
        return $this->model->sel($fact_id);
    }
    
    public function sel_payment_month($empr_id='',$tipo){
        return $this->model->sel_payment_month($empr_id,$tipo);
    }

    public function sel_detalle($fact_id = ''){
        return $this->model->sel_detalle($fact_id);
    }
    public function sel_payment($fact_id, $all = true) {
        return $this->model->sel_payment($fact_id, $all);
    }

    public function sel_estado($fest_id = ''){
        return $this->model->sel_estado($fest_id);
    }
    
    public function del($fact_id = ''){
        return $this->model->del($fact_id);
    }

    public function del_detalle($fdet_id = ''){
        return $this->model->del_detalle($fdet_id);
    }

    public function clientFacture($fac_cod){
        return $this->model->clientFacture($fac_cod);
    }
}
