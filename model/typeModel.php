<?php
class typeModel extends Model{

    public function ins($tipo_data = array()){
        foreach ($tipo_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "REPLACE INTO tbl_fact_tipo (ftip_id,ftip_nom) VALUES ($tipo_id,'$tipo_des')";
        $this->set_query();
    }
    public function upd($tipo_data = array()){
        foreach ($tipo_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "REPLACE INTO tbl_fact_tipo (ftip_id,ftip_nom) VALUES ($tipo_id,'$tipo_des')";
        $this->set_query();
    }
    public function sel($tipo_id = ''){
        $this->query = ($tipo_id != '')
        ? "SELECT * FROM tbl_fact_tipo WHERE ftip_id = $tipo_id"
        : 'SELECT * FROM tbl_fact_tipo';
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        //var_dump($data);
        return $data;
    }
    public function del($tipo_id = ''){
        $this->query = "DELETE FROM tbl_fact_tipo WHERE ftip_id = $tipo_id";
        $this->set_query();
    }

    public function get_tipo_pago($tpag_id = ''){
        $this->query = ($tpag_id != '')
        ? "SELECT * FROM tbl_fact_tipopago WHERE ftpa_id = $tpag_id"
        : 'SELECT * FROM tbl_fact_tipopago';
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        //var_dump($data);
        return $data;
    }
}
