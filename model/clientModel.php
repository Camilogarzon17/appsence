<?php
class clientModel extends model{

    public function ins($clie_data = array()){
        foreach ($clie_data as $key => $value) {
            $$key = $value;
        }
        $pas = MD5($clie_pas);
        $this->query = "INSERT INTO tbl_cliente (clie_ema,clie_pas,clie_pno,clie_sno,clie_pap,clie_sap,clie_cel,clie_nid,clie_dir,clie_ciu,clie_pai,clie_ipe,clie_fec,clie_empr_fk,clie_esta_fk,clie_usua_fk) VALUES ('$clie_ema','$pas','$clie_pno','$clie_sno','$clie_pap','$clie_sap','$clie_cel','$clie_nid','$clie_dir','$clie_ciu','$clie_pai','$clie_ipe','$clie_fec',$clie_empr_fk,$clie_esta_fk,$clie_usua_fk)";
        $this->set_query();
    }

    public function ins_company($empr_data = array()){
        foreach ($empr_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_empresa (empr_nom,empr_des,empr_nit,empr_web,empr_dir,empr_ciu,empr_pai,empr_ipe,empr_ipo,empr_fec,empr_tipo_fk,empr_usua_fk) VALUES ('$empr_nom','$empr_des','$empr_nit','$empr_web','$empr_dir','$empr_ciu','$empr_pai','$empr_ipe','$empr_ipo','$empr_fec',$empr_tipo_fk,$empr_usua_fk)";
        $this->set_query();
    }

    public function upd($clie_data = array()){
        foreach ($clie_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE tbl_cliente SET clie_usua_fk = $clie_usua_fk, clie_ema = '$clie_ema', clie_pno = '$clie_pno',clie_sno = '$clie_sno',clie_pap = '$clie_pap',clie_sap = '$clie_sap', clie_cel = '$clie_cel',clie_nid = '$clie_nid',clie_dir = '$clie_dir', clie_ciu = '$clie_ciu', clie_pai = '$clie_pai', clie_fec = '$clie_fec', clie_ipe = '$clie_ipe', clie_esta_fk = $clie_esta_fk,clie_empr_fk = $clie_empr_fk WHERE clie_id = $clie_id";
        $this->set_query();
    }

    public function upd_company($clie_data = array()){
        foreach ($clie_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE tbl_empresa SET empr_nom = '$empr_nom', empr_nit = '$empr_nit', empr_des = '$empr_des', empr_web = '$empr_web', empr_dir = '$empr_dir', empr_ciu = '$empr_ciu', empr_pai = '$empr_pai', empr_ipe = '$empr_ipe', empr_ipo = '$empr_ipo', empr_fec = '$empr_fec', empr_tipo_fk = $empr_tipo_fk, empr_usua_fk = $empr_usua_fk WHERE empr_id = $empr_id";
        $this->set_query();
    }

    public function sel($clie_id = ''){
        $this->query = ($clie_id != '') ? "SELECT * FROM tbl_cliente WHERE clie_id = $clie_id"
        : "SELECT * FROM tbl_cliente";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function sel_client_company($empr_id = ''){
        $this->query = ($empr_id != '') ? "SELECT C.*,E.* FROM tbl_cliente AS C INNER JOIN tbl_empresa AS E ON E.empr_id = C.clie_empr_fk AND clie_empr_fk = $empr_id"
        : "SELECT C.*,E.* FROM tbl_cliente AS C INNER JOIN tbl_empresa AS E ON E.empr_id = C.clie_empr_fk";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function sel_company($empr_id = ''){
        $this->query = ($empr_id != '') ? "SELECT E.*FROM tbl_empresa AS E  WHERE E.empr_tipo_fk = $empr_id"
        :"SELECT E.*,ET.* FROM tbl_empresa AS E LEFT JOIN tbl_empresa_tipo AS ET ON E.empr_tipo_fk = ET.etip_id";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }

    public function sel_company_type($empr_id = ''){
        $this->query = ($empr_id != '') ? "SELECT * FROM tbl_empresa_tipo WHERE etip_id = $etip_id"
        : "SELECT * FROM tbl_empresa_tipo";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }


    public function del($clie_id = ''){
        $this->query = "DELETE FROM tbl_cliente WHERE clie_id = $clie_id";
        $this->set_query();
    }
    public function del_company($empr_id = ''){
        $this->query = "DELETE FROM tbl_empresa WHERE empr_id = $empr_id";
        $this->set_query();
    }
    public function client_company($clie_id = ''){
        $this->query = ($clie_id != '') ? "SELECT E.*,ET.*,C.*,CONCAT(C.clie_pno,' ',C.clie_sno,' ',C.clie_pap,' ',C.clie_sap) AS clie_nom FROM tbl_empresa AS E LEFT JOIN tbl_empresa_tipo AS ET ON E.empr_tipo_fk = ET.etip_id LEFT JOIN tbl_cliente AS C ON C.clie_empr_fk = E.empr_id WHERE C.clie_id = $clie_id"
        :"SELECT E.*,ET.*,C.*,CONCAT(C.clie_pno,' ',C.clie_sno,' ',C.clie_pap,' ',C.clie_sap) AS clie_nom FROM tbl_empresa AS E LEFT JOIN tbl_empresa_tipo AS ET ON E.empr_tipo_fk = ET.etip_id LEFT JOIN tbl_cliente AS C ON C.clie_empr_fk = E.empr_id";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
}
