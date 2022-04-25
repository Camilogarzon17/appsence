<?php
class paymentModel extends Model{

    public function ins($mpag_data = array())
    {
        foreach ($mpag_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "REPLACE INTO tbl_fact_mediopago (fmpa_id,fmpa_nom) VALUES ($mpag_id,'$mpag_des')";
        $this->set_query();
    }
    public function upd($mpag_data = array())
    {
        foreach ($mpag_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "REPLACE INTO tbl_fact_mediopago (fmpa_id,fmpa_nom) VALUES ($mpag_id,'$mpag_des')";
        $this->set_query();
    }
    public function sel($mpag_id = ''){
        $this->query = ($mpag_id != '')
        ? "SELECT * FROM tbl_fact_mediopago WHERE fmpa_id = $mpag_id"
        : 'SELECT * FROM tbl_fact_mediopago';
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function del($mpag_id = '')
    {
        $this->query = "DELETE FROM tbl_fact_mediopago WHERE fmpa_id = $mpag_id";
        $this->set_query();
    }
}
