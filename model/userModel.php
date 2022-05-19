<?php
class userModel extends model{

    public function ins($usua_data = array()){
        foreach ($usua_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_usuario (usua_ema, usua_nid, usua_pas, usua_pno, usua_sno, usua_pap, usua_sap, usua_pro, usua_dir, usua_ciu, usua_pai, usua_fna, usua_cel, usua_rol, usua_ipe,usua_ipo, usua_col, usua_sex, usua_care_fk, usua_esta_fk) VALUES ('$usua_ema', '$usua_nid', '$usua_pas', '$usua_pno', '$usua_sno', '$usua_pap', '$usua_sap', '$usua_pro', '$usua_dir', '$usua_ciu', '$usua_pai', '$usua_fna', '$usua_cel', '$usua_rol', '$usua_ipe','$usua_ipo', '$usua_col','$usua_sex', $usua_care_fk, $usua_esta_fk)";
        $this->set_query();

    }

    public function ins_cargo($cargo_data = array()){
        foreach ($cargo_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_cargo_area (care_nom, care_area_fk) VALUES ('$care_nom', $care_area_fk)";
        return $this->set_query();
    }

    public function upd($usua_data = array()){
        foreach ($usua_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE tbl_usuario SET usua_ema = '$usua_ema', usua_pno = '$usua_pno', usua_sno = '$usua_sno',usua_pap = '$usua_pap',usua_sap = '$usua_sap', usua_pro = '$usua_pro',usua_dir = '$usua_dir', usua_ciu = '$usua_ciu', usua_pai = '$usua_pai', usua_fna = '$usua_fna', usua_ipe = '$usua_ipe', usua_ipo = '$usua_ipo', usua_cel = '$usua_cel', usua_rol = $usua_rol, usua_nid = '$usua_nid', usua_esta_fk = $usua_esta_fk,usua_col = '$usua_col' WHERE usua_id = $usua_id";
        $this->set_query();
        $this->query = "UPDATE tbl_cuenta SET cuen_num = '$cuen_num', cuen_banc_fk = $cuen_banc_fk WHERE cuen_usua_fk = $usua_id";
        $this->set_query();
    }

    public function sel($usua_id = ''){
        $this->query = ($usua_id != '') ? "SELECT U.*,CONCAT(U.usua_pno,' ',U.usua_sno,' ',U.usua_pap,' ',U.usua_sap) AS usua_nom, CA.* FROM tbl_usuario AS U 
            LEFT JOIN tbl_cargo_area AS CA ON CA.care_id = U.usua_care_fk
            WHERE U.usua_id =  $usua_id"
        : "SELECT U.*,CONCAT(U.usua_pno,' ',U.usua_sno,' ',U.usua_pap,' ',U.usua_sap) AS usua_nom, CA.* FROM tbl_usuario AS U 
            LEFT JOIN tbl_cargo_area AS CA ON CA.care_id = U.usua_care_fk";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }

    public function sel_area($area_id = ''){
        $this->query = ($area_id != '') ? "SELECT * FROM tbl_area WHERE area_id =  $area_id"
        : "SELECT * FROM tbl_area";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }

    public function sel_cargo($care_id = ''){
        $this->query = ($care_id != '') ? "SELECT * FROM tbl_cargo_area AS CA
        INNER JOIN tbl_area AS A ON A.area_id = CA.care_area_fk WHERE CA.care_id =  $care_id"
        : "SELECT * FROM tbl_cargo_area AS CA
        INNER JOIN tbl_area AS A ON A.area_id = CA.care_area_fk";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }

    public function del($usua_id = ''){
        $this->query = "DELETE FROM tbl_cuenta WHERE cuen_usua_fk = $usua_id";
        $this->set_query();
        $this->query = "DELETE FROM tbl_usuario WHERE usua_id = $usua_id";
        $this->set_query();
    }

    public function del_cargo($care_id = ''){
        $this->query = "DELETE FROM tbl_cargo_area WHERE care_id = $care_id";
        $this->set_query();
    }

    public function validate_user($usua_ema, $usua_pas = ''){
        $this->query = "SELECT * FROM tbl_usuario WHERE usua_ema = '$usua_ema'";
        $this->get_query();
        $data = array();
        foreach ($this->rows as $key => $value) {
            if (password_verify($usua_pas, $value['usua_pas']))
                array_push($data, $value);
        }
        return $data;

        



    }

    public function update_pass($new_pass, $usua_id){
        $after_pass  = password_hash($new_pass, PASSWORD_DEFAULT);
        $this->query = "UPDATE tbl_usuario SET usua_pas='$after_pass' WHERE usua_id = '$usua_id'";
        $this->set_query();
    }

    public function ins_historial()
    {
        $this->query = "INSERT INTO tbl_historial(usuario,contraseña,fec_hor_ingreso) VALUES () ";
        return $this->query;
    }
}
