<?php
class billModel extends model{

    public function ins($fact_data = array()){
        foreach ($fact_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_factura (fact_tit,fact_des, fact_fin, fact_fec, fact_esta_fk, fact_usua_fk, fact_clie_fk) VALUES ('$fact_tit','$fact_des','$fact_fin','$fact_fec',$fact_esta_fk,$fact_usua_fk,$fact_clie_fk)";
        $id_reg = $this->set_query();
        return $id_reg; 
    }
    public function ins_payment($pay_data = array()){
        foreach ($pay_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_fact_pago (fpag_fec, fpag_nco, fpag_npa, fpag_vpa, fpag_fact_fk, fpag_mpag_fk, fpag_tpag_fk) VALUES ('$fpag_fec', '$fpag_nco', '$fpag_npa', '$fpag_vpa', $fpag_fact_fk, $fpag_mpag_fk, $fpag_tpag_fk)";
        $id_reg = $this->set_query();
        return $id_reg; 
    }

    public function set_detalle($fact_query) {
        $this->query = $fact_query;
        $this->set_query();
    }

     public function fact_grafic($empr_id = '',$fact_est = false){
        if($empr_id != '') {
            $this->query = ($fact_est!= false) ? "SELECT COUNT(F.fact_id) AS cantidad, SUM(F.fact_vto) AS total FROM tbl_factura AS F
            LEFT JOIN tbl_factura_estado AS FE ON FE.fest_id = F.fact_esta_fk
            LEFT JOIN tbl_cliente AS C ON C.clie_id = F.fact_clie_fk
            LEFT JOIN tbl_empresa AS E ON E.empr_id = C.clie_empr_fk WHERE E.empr_id= $empr_id":"SELECT COUNT(F.fact_id) AS cantidad, SUM(F.fact_vto) AS total FROM tbl_factura AS F
            LEFT JOIN tbl_factura_estado AS FE ON FE.fest_id = F.fact_esta_fk
            LEFT JOIN tbl_cliente AS C ON C.clie_id = F.fact_clie_fk
            LEFT JOIN tbl_empresa AS E ON E.empr_id = C.clie_empr_fk WHERE F.fact_esta_fk = 2 AND E.empr_id= $empr_id";
        }else{
            $this->query = ($fact_est!= false) ? "SELECT COUNT(F.fact_id) AS cantidad, SUM(F.fact_vto) AS total FROM tbl_factura AS F
            LEFT JOIN tbl_factura_estado AS FE ON FE.fest_id = F.fact_esta_fk;":"SELECT COUNT(F.fact_id) AS cantidad, SUM(F.fact_vto) AS total FROM tbl_factura AS F
            LEFT JOIN tbl_factura_estado AS FE ON FE.fest_id = F.fact_esta_fk
            WHERE F.fact_esta_fk = 2";
        }
        
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }

    public function upd($fac_data = array()){
        foreach ($fac_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE tbl_factura SET fact_tit = '$fact_tit',fact_des = '$fact_des', fact_fin = '$fact_fin', fact_fec = '$fact_fec', fact_esta_fk = $fact_esta_fk, fact_usua_fk = $fact_usua_fk, fact_clie_fk = $fact_clie_fk WHERE fact_id = $fact_id";
        $this->set_query();
    }
    public function upd_precio($fact_id,$fact_vto){
        $this->query = "UPDATE tbl_factura SET fact_vto = '$fact_vto' WHERE fact_id = $fact_id";
        $this->set_query();
    }
    public function upd_status($fact_id,$fact_est){
        $this->query = "UPDATE tbl_factura SET fact_esta_fk = '$fact_est' WHERE fact_id = $fact_id";
        $this->set_query();
    }

    public function sel($fact_id = ''){
        $this->query = ($fact_id != '') ? "SELECT F.*,E.empr_nom, FE.fest_nom,SUM(FD.fdet_pre) AS total, SUM(SD.sdet_val) AS total_serv, U.*, C.*, E.* FROM tbl_factura AS F
        INNER JOIN tbl_factura_detalle AS FD ON FD.fdet_fact_fk = F.fact_id
        INNER JOIN tbl_servicio_detalle AS SD ON SD.sdet_id = fdet_sdet_fk
        LEFT JOIN tbl_servicio AS S ON S.serv_id = SD.sdet_serv_fk
        LEFT JOIN tbl_factura_estado AS FE ON FE.fest_id = F.fact_esta_fk
        LEFT JOIN tbl_cliente AS C ON C.clie_id = F.fact_clie_fk
        LEFT JOIN tbl_empresa AS E ON E.empr_id = C.clie_empr_fk
        LEFT JOIN tbl_usuario AS U ON U.usua_id = F.fact_usua_fk WHERE fact_id = $fact_id"
        : "SELECT F.*,E.empr_nom, FE.fest_nom,SUM(FD.fdet_pre) AS total, SUM(SD.sdet_val) AS total_serv, C.clie_ema FROM tbl_factura AS F
        INNER JOIN tbl_factura_detalle AS FD ON FD.fdet_fact_fk = F.fact_id
        INNER JOIN tbl_servicio_detalle AS SD ON SD.sdet_id = fdet_sdet_fk
        LEFT JOIN tbl_servicio AS S ON S.serv_id = SD.sdet_serv_fk
        LEFT JOIN tbl_factura_estado AS FE ON FE.fest_id = F.fact_esta_fk
        LEFT JOIN tbl_cliente AS C ON C.clie_id = F.fact_clie_fk
        LEFT JOIN tbl_empresa AS E ON E.empr_id = C.clie_empr_fk
        LEFT JOIN tbl_usuario AS U ON U.usua_id = F.fact_usua_fk
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
    public function sel_payment_month($empr_id='',$tipo){
        if ($empr_id != '') {
            if ($tipo == "mes") {
                $this->query ="SELECT F.*,FP.*, SUM(FP.fpag_vpa) AS total FROM tbl_fact_pago AS FP
                INNER JOIN tbl_factura AS F ON FP.fpag_fact_fk = F.fact_id
                LEFT JOIN tbl_factura_estado AS FE ON FE.fest_id = F.fact_esta_fk
                LEFT JOIN tbl_cliente AS C ON C.clie_id = F.fact_clie_fk
                LEFT JOIN tbl_empresa AS E ON E.empr_id = C.clie_empr_fk
                LEFT JOIN tbl_usuario AS U ON U.usua_id = F.fact_usua_fk
                WHERE E.empr_id = $empr_id
                GROUP BY MONTH(FP.fpag_fec), YEAR(FP.fpag_fec) 
                ORDER BY FP.fpag_fec";
            }else if($tipo == "anio"){
                $this->query ="SELECT F.*,FP.*, SUM(FP.fpag_vpa) AS total FROM tbl_fact_pago AS FP
                INNER JOIN tbl_factura AS F ON FP.fpag_fact_fk = F.fact_id
                LEFT JOIN tbl_factura_estado AS FE ON FE.fest_id = F.fact_esta_fk
                LEFT JOIN tbl_cliente AS C ON C.clie_id = F.fact_clie_fk
                LEFT JOIN tbl_empresa AS E ON E.empr_id = C.clie_empr_fk
                LEFT JOIN tbl_usuario AS U ON U.usua_id = F.fact_usua_fk
                WHERE E.empr_id = $empr_id
                GROUP BY YEAR(FP.fpag_fec) 
                ORDER BY FP.fpag_fec";
            }
            
        }else{
            if ($tipo == "mes") {
                $this->query ="SELECT F.*,FP.*, SUM(FP.fpag_vpa) AS total FROM tbl_fact_pago AS FP
                INNER JOIN tbl_factura AS F ON FP.fpag_fact_fk = F.fact_id
                LEFT JOIN tbl_factura_estado AS FE ON FE.fest_id = F.fact_esta_fk
                LEFT JOIN tbl_cliente AS C ON C.clie_id = F.fact_clie_fk
                LEFT JOIN tbl_empresa AS E ON E.empr_id = C.clie_empr_fk
                LEFT JOIN tbl_usuario AS U ON U.usua_id = F.fact_usua_fk
                GROUP BY MONTH(FP.fpag_fec), YEAR(FP.fpag_fec) 
                ORDER BY FP.fpag_fec";
            }else if($tipo == "anio"){
                $this->query ="SELECT F.*,FP.*, SUM(FP.fpag_vpa) AS total FROM tbl_fact_pago AS FP
                INNER JOIN tbl_factura AS F ON FP.fpag_fact_fk = F.fact_id
                LEFT JOIN tbl_factura_estado AS FE ON FE.fest_id = F.fact_esta_fk
                LEFT JOIN tbl_cliente AS C ON C.clie_id = F.fact_clie_fk
                LEFT JOIN tbl_empresa AS E ON E.empr_id = C.clie_empr_fk
                LEFT JOIN tbl_usuario AS U ON U.usua_id = F.fact_usua_fk
                GROUP BY YEAR(FP.fpag_fec) 
                ORDER BY FP.fpag_fec";
            }
        }
        
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    

    public function sel_detalle($fact_id = ''){
        $this->query = "SELECT fdet_id,fdet_fec, fdet_dto, fdet_pre,fdet_sdet_fk,sdet_nom,sdet_des,serv_nom,serv_des, fdet_fact_fk FROM tbl_factura_detalle AS FD INNER JOIN tbl_servicio_detalle AS SD ON SD.sdet_id = fdet_sdet_fk LEFT JOIN tbl_servicio AS S ON S.serv_id = SD.sdet_serv_fk WHERE fdet_fact_fk = $fact_id";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function sel_payment($fact_id = '', $all = true){
        $this->query = ($all!= false) ? "SELECT * FROM tbl_fact_pago AS FP
        LEFT JOIN tbl_fact_mediopago AS M ON M.fmpa_id = FP.fpag_mpag_fk WHERE fpag_fact_fk = $fact_id"
        : "SELECT SUM(fpag_vpa) AS pagos FROM tbl_fact_pago WHERE fpag_fact_fk = $fact_id";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function pays_total($empr_id = ''){
        $this->query =  ($empr_id != '')? "SELECT SUM(FP.fpag_vpa) AS total_pago FROM tbl_factura AS F INNER JOIN tbl_fact_pago AS FP ON FP.fpag_fact_fk = F.fact_id LEFT JOIN tbl_factura_estado AS FE ON FE.fest_id = F.fact_esta_fk LEFT JOIN tbl_cliente AS C ON C.clie_id = F.fact_clie_fk LEFT JOIN tbl_empresa AS E ON E.empr_id = C.clie_empr_fk WHERE F.fact_esta_fk = 2 AND E.empr_id= $empr_id":"SELECT SUM(FP.fpag_vpa) AS total_pago FROM tbl_factura AS F INNER JOIN tbl_fact_pago AS FP ON FP.fpag_fact_fk = F.fact_id LEFT JOIN tbl_factura_estado AS FE ON FE.fest_id = F.fact_esta_fk LEFT JOIN tbl_cliente AS C ON C.clie_id = F.fact_clie_fk LEFT JOIN tbl_empresa AS E ON E.empr_id = C.clie_empr_fk WHERE F.fact_esta_fk = 2";
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
    public function del_detalle($fdet_id = ''){
        $this->query = "DELETE FROM tbl_factura_detalle WHERE fdet_id = $fdet_id";
        $this->set_query();
    }
    public function aniosFactura(){
        $this->query = "SELECT YEAR(fact_fin) FROM tbl_factura GROUP BY YEAR(fact_fin)";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
}
