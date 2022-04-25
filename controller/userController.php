<?php
class userController{
    private $model;

    public function __construct(){
        $this->model = new userModel();
    }

    public function ins($usu_data = array()){
        return $this->model->ins($usu_data);
    }

    public function ins_cargo($cargo_data = array()){
        return $this->model->ins_cargo($cargo_data);
    }

    public function upd($usu_data = array()){
        return $this->model->upd($usu_data);
    }

    public function sel($usua_id = ''){
        return $this->model->sel($usua_id);
    }

    public function sel_area($area_id = ''){
        return $this->model->sel_area($area_id);
    }

    public function sel_cargo($care_id = ''){
        return $this->model->sel_cargo($care_id);
    }

    public function del($usua_id = ''){
        return $this->model->del($usua_id);
    }
    public function del_cargo($care_id = ''){
        return $this->model->del_cargo($care_id);
    }

    public function update_pass($new_pass, $usua_id){
        return $this->model->update_pass($new_pass, $usua_id);
    }
}
