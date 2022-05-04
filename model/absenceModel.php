<?php  
class absenceModel extends model{

    public function ins($ause_data = array()){
        foreach ($ause_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_ausencia (ause_des, ause_fin, ause_ffi, ause_med, ause_est, ause_dia, ause_sop, ause_tipo_fk, ause_usua_fk) VALUES ('$ause_des', '$ause_fin', '$ause_ffi', $ause_med,$ause_est, $ause_dia,'$ause_sop', $ause_tipo_fk, $ause_usua_fk);";
       $id_reg = $this->set_query();
        return $id_reg; 
    }

    public function ins_taus($tause_data = array()){
        foreach ($tause_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_ausencia_tipo (taus_nom, taus_col) VALUES ('$taus_nom', '$taus_col');";
       $id_reg = $this->set_query();
        return $id_reg; 
    }

    public function upd($ause_data = array()){
        foreach ($ause_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE tbl_ausencia SET fact_cli_id = $fac_cli,fact_ser_id = $fac_ser, fact_usu_id = $fac_usu, fact_cod = '$fact_id', fact_tit = '$fac_tit', fact_nom = '$fac_nom', fact_fin = '$fac_fin', fact_fec = '$fac_fec', fact_des = '$fac_des', fact_pre = '$fac_pre', fact_dto = '$fac_dto', fact_doc = '$fac_doc' WHERE fact_id = $fact_id";
        $this->set_query();
    }

    public function upd_estado($ause_id,$ause_est){
        $this->query = "UPDATE tbl_ausencia SET ause_est = $ause_est WHERE ause_id = $ause_id";
        $this->set_query();
    }

    public function sel($usua_id = '',$ause_est = '',$ause_dia = false){
        if ($ause_est != '') {
            if ($usua_id != '') {
                $this->query = ($usua_dia != true) ?  "SELECT COUNT(A.ause_id) AS total FROM tbl_ausencia AS A WHERE A.ause_usua_fk = $usua_id AND  A.ause_est = $ause_est":"SELECT SUM(A.ause_dia) AS dias FROM tbl_ausencia AS A
                WHERE A.ause_usua_fk = $usua_id AND  A.ause_est = $ause_est";
            }else{
                $this->query = "SELECT A.*,U.*,TA.* FROM tbl_ausencia AS A
                INNER JOIN tbl_usuario AS U ON U.usua_id = A.ause_usua_fk
                INNER JOIN tbl_ausencia_tipo AS TA ON TA.taus_id = A.ause_tipo_fk
                WHERE A.ause_est <> $ause_est
                ORDER BY A.ause_id DESC";
            }
            
        }else{
            $this->query = ($usua_id != '') ? "SELECT A.*,U.*,TA.* FROM tbl_ausencia AS A
            INNER JOIN tbl_usuario AS U ON U.usua_id = A.ause_usua_fk
            INNER JOIN tbl_ausencia_tipo AS TA ON TA.taus_id = A.ause_tipo_fk
            WHERE U.usua_id = $usua_id ORDER BY A.ause_id DESC"
            : "SELECT A.*,U.*,TA.* FROM tbl_ausencia AS A
            INNER JOIN tbl_usuario AS U ON U.usua_id = A.ause_usua_fk
            INNER JOIN tbl_ausencia_tipo AS TA ON TA.taus_id = A.ause_tipo_fk
            ORDER BY A.ause_id DESC";
        }
        
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }

    public function sel_ause($ause_id){
        $this->query = "SELECT * FROM tbl_ausencia AS A
        INNER JOIN tbl_usuario AS U ON U.usua_id = A.ause_usua_fk
        INNER JOIN tbl_ausencia_tipo AS TA ON TA.taus_id = A.ause_tipo_fk
        WHERE A.ause_id = $ause_id";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }

    public function sel_tipo($taus_id = ''){
        $this->query = ($taus_id != '') ? "SELECT * FROM tbl_ausencia_tipo WHERE taus_id = $taus_id"
        : "SELECT * FROM tbl_ausencia_tipo ";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function del($ause_id = ''){
        $this->query = "DELETE FROM tbl_ausencia WHERE ause_id = $ause_id";
        $this->set_query();
    }
}
