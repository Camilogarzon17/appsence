<?php
class requestModel extends model{

    public function ins($soli_data = array()){
        foreach ($soli_data as $key => $value) {
            $$key = $value;
        }   
        $this->query = "INSERT INTO tbl_solicitud (soli_asu, soli_des, soli_nom, soli_ema, soli_emp, soli_cel, soli_ubi, soli_fec, soli_serv_fk,soli_esta_fk) VALUES ('$soli_asu', '$soli_men', '$soli_nom', '$soli_ema', '$soli_emp', '$soli_cel', '$soli_ciu', '$soli_fec',$soli_serv_fk,1)";
        $this->set_query();
    }
    public function upd($soli_data = array()){
        foreach ($soli_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE tbl_solicitud SET soli_asu = '$soli_asu', soli_des = '$soli_men', soli_nom = '$soli_nom', soli_ema = '$soli_ema', soli_emp = '$soli_emp', soli_cel = '$soli_cel', soli_ubi = '$soli_ciu', soli_ser = $soli_serv_fk, soli_fec = '$soli_fec' WHERE soli_id = $soli_id";
        $this->set_query();
    }
    public function upd_estado($soli_id,$soli_esta){
        $this->query = "UPDATE tbl_solicitud SET soli_esta_fk = $soli_esta WHERE soli_id = $soli_id";
        $this->set_query();
    }
    public function sel($soli_id = ''){
        $this->query = ($soli_id != '') ? "SELECT * FROM tbl_solicitud WHERE soli_id = $soli_id" : "SELECT S.*, SE.serv_nom,C.coti_id FROM tbl_solicitud AS S
        WHERE S.soli_esta_fk <> 4";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function num_request(){

        return 0;
    }
    public function del($soli_id = ''){
        $this->query = "DELETE FROM tbl_solicitud WHERE soli_id = $soli_id";
        $this->set_query();
    }
}
