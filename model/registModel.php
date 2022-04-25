<?php 
class registModel extends model{

    public function ins($regi_data = array()){
        foreach ($regi_data as $key => $value) {
            $$key = $value;
        }   
        $this->query = "INSERT INTO tbl_contador (cont_pai, cont_ip, cont_fec) VALUES ('$cont_pai', '$cont_ip', '$cont_fec')";
        $this->set_query();
    }
    public function upd($regi_data = array()){
        foreach ($regi_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE tbl_contador SET cont_pai = '$cont_pai', cont_ip = '$cont_ip', cont_fec = '$cont_fec' WHERE cont_id = $cont_id";
        $this->set_query();
    }
    public function sel($regi_id = ''){
        $this->query = ($regi_id != '') ? "SELECT * FROM tbl_contador WHERE cont_id = $regi_id" : "SELECT c1.cont_id, cont_pai, cont_ip , c2.cont_fec FROM tbl_contador AS c1 RIGHT JOIN (SELECT cont_id, MAX(cont_fec) AS cont_fec FROM tbl_contador WHERE cont_id > '394' GROUP BY cont_ip) AS c2 ON c1.cont_id = c2.cont_id ORDER BY cont_id DESC";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function del($regi_id = ''){
        $this->query = "DELETE FROM tbl_contador WHERE cont_id = $regi_id";
        $this->set_query();
    }
}
