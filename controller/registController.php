<?php
class registController{

    private $model;

    public function __construct(){
        $this->model = new registModel();
    }

    public function ins($regi_data = array()){
        return $this->model->ins($regi_data);
    }

    public function upd($regi_data = array()){
        return $this->model->upd($regi_data);
    }
    
    public function sel($regi_id = ''){
        return $this->model->sel($regi_id);
    }
    
    public function del($regi_id = ''){
        return $this->model->del($regi_id);
    }
}
