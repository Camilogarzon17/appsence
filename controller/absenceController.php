<?php
class absenceController{
    private $model;

    public function __construct(){
        $this->model = new absenceModel();
    }

    public function ins($ause_data = array()){
        return $this->model->ins($ause_data);
    }
    
    public function ins_taus($tause_data = array()){
        return $this->model->ins_taus($tause_data);
    }

    public function upd($ause_data = array()){
        return $this->model->upd($ause_data);
    }
    
    public function upd_estado($ause_id,$ause_est){
        return $this->model->upd_estado($ause_id,$ause_est);
    }

    public function sel($usua_id = '',$usua_est = '',$ause_dia = false){
        return $this->model->sel($usua_id,$usua_est,$ause_dia);
    }
    public function sel_ause($ause_id){
        return $this->model->sel_ause($ause_id);
    }

    public function sel_tipo($taus_id = ''){
        return $this->model->sel_tipo($taus_id);
    }
    
    public function del($ause_id = ''){
        return $this->model->del($ause_id);
    }
}
