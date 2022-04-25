<?php  
class serviceModel extends model{

    public function ins($serv_data = array()){
        foreach ($serv_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_servicio (serv_nom,serv_des,serv_usua_fk) VALUES ('$serv_nom', '$serv_des',$serv_usua_fk);";
        $this->set_query();
    }
    public function ins_service($serv_data = array()){
        foreach ($serv_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_servicio_detalle (sdet_nom,sdet_des,sdet_gar,sdet_val,sdet_serv_fk) VALUES ('$sdet_nom','$sdet_des','$sdet_gar','$sdet_val',$sdet_serv_fk);";
        $this->set_query();
    }
    public function sel($serv_id = ''){
        $this->query = ($serv_id != '')?"SELECT * FROM tbl_servicio WHERE serv_id = $serv_id"
        :"SELECT * FROM tbl_servicio ORDER BY serv_id DESC";
        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data,$value);
        }
        return $data;
    }
    public function sel_service($serv_id = ''){
        $this->query = ($serv_id != '')?"SELECT * FROM tbl_servicio_detalle WHERE sdet_serv_fk = $serv_id"
        :"SELECT S.*,SD.* FROM tbl_servicio_detalle AS SD INNER JOIN tbl_servicio AS S ON SD.sdet_serv_fk = S.serv_id";
        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data,$value);
        }
        return $data;
    }
    public function upd($serv_data = array()){
        foreach ($serv_data as $key => $value) {
            $$key = $value;
        }
        var_dump($serv_data);
        $this->query = "UPDATE tbl_servicio SET serv_nom = '$serv_nom',serv_des = '$serv_des', serv_usua_fk = $serv_usua_fk WHERE serv_id = $serv_id;"; 
        $this->set_query();
    }

    public function upd_service($serv_data = array()){
        foreach ($serv_data as $key => $value) {
            $$key = $value;
        }
        //var_dump($serv_data);
        $this->query = "UPDATE tbl_servicio_detalle SET sdet_nom = '$sdet_nom',sdet_des = '$sdet_des',sdet_gar = '$sdet_gar',sdet_val = '$sdet_val', sdet_serv_fk = $sdet_serv_fk WHERE sdet_id = $sdet_id;"; 
        $this->set_query();
    }

    public function del($serv_id = ''){
        $this->query = "DELETE FROM tbl_servicio WHERE serv_id = $serv_id"; 
        $this->set_query();
    }

    public function del_service($serv_id = ''){
        $this->query = "DELETE FROM tbl_servicio_detalle WHERE sdet_id = $serv_id"; 
        $this->set_query();
    }
}
?>