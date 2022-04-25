<?php  
class quotationModel extends model{

    public function ins($coti_data = array()){
        foreach ($coti_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_cotizacion (coti_des, coti_tyc, coti_fec, coti_esta_fk, coti_soli_fk, coti_usua_fk) VALUES ('$coti_des', '$coti_tyc', '$coti_fec', $coti_esta_fk, $coti_soli_fk, $coti_usua_fk);";
       $id_reg = $this->set_query();
        return $id_reg; 
    }
    public function set_detalle($coti_query) {
        $this->query = $coti_query;
        $this->set_query();
    }
    public function upd($coti_data = array()){
        foreach ($coti_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE tbl_factura SET fact_cli_id = $fac_cli,fact_ser_id = $fac_ser, fact_usu_id = $fac_usu, fact_cod = '$fact_id', fact_tit = '$fac_tit', fact_nom = '$fac_nom', fact_fin = '$fac_fin', fact_fec = '$fac_fec', fact_des = '$fac_des', fact_pre = '$fac_pre', fact_dto = '$fac_dto', fact_doc = '$fac_doc' WHERE fact_id = $fact_id";
        $this->set_query();
        $this->query = "UPDATE tbl_cuenta SET cue_num = '$fac_cue', cue_ban_fk = $fac_ban WHERE cue_fact_fk = $fact_id";
        $this->set_query();
    }
    public function sel($fact_id = ''){
        $this->query = ($fact_id != '') ? "SELECT * FROM tbl_factura WHERE fact_id = $fact_id"
        : "SELECT F.fact_id,F.fact_tit,F.fact_des,F.fact_fin,fact_fec,E.empr_nom, FE.fest_nom,SUM(FD.fdet_pre) AS total, SUM(SD.sdet_val) AS total_serv FROM tbl_factura AS F
        INNER JOIN tbl_factura_detalle AS FD ON FD.fdet_fact_fk = f.fact_id
        INNER JOIN tbl_servicio_detalle AS SD ON SD.sdet_id = fdet_sdet_fk
        LEFT JOIN tbl_servicio AS S ON S.serv_id = SD.sdet_serv_fk
        LEFT JOIN tbl_factura_estado AS FE ON FE.fest_id = F.fact_esta_fk
        LEFT JOIN tbl_cliente AS C ON C.clie_id = F.fact_clie_fk
        LEFT JOIN tbl_empresa AS E ON E.empr_id = C.clie_empr_fk
        GROUP BY F.fact_id
        ORDER BY F.fact_id DESC";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function sel_estado($fest_id = ''){
        $this->query = ($fact_id != '') ? "SELECT * FROM tbl_factura_estado WHERE fest_id = $fest_id"
        : "SELECT * FROM tbl_factura_estado ";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function del($fact_id = ''){
        $this->query = "DELETE FROM tbl_factura WHERE fact_id = $fact_id";
        $this->set_query();
    }
}
