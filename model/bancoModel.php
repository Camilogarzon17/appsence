<?php
class bancoModel extends model{

    public function ins($banco_data = array()){
        foreach ($banco_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_usuario (usu_pas,usu_id_usu, usu_ema, usu_nom, usu_prof, usu_ciud, usu_pais, usu_fech, usu_url, usu_tel, usu_rol, usu_ced, usu_est,usu_col, usu_por) VALUES ('$usu_pas',$usu_id_usu, '$usu_ema', '$usu_nom', '$usu_pro', '$usu_ciu', '$usu_pai', '$usu_fec', '$usu_url' , '$usu_tel', '$usu_rol', '$usu_ced','$usu_est','$usu_col','$usu_por')";
        $this->set_query();
        $this->query = "INSERT INTO tbl_cuenta (cue_num,cue_cban_fk,cue_usu_fk) VALUES ('$usu_cue',$usu_ban, $usu_id)";
        $this->set_query();
    }

    public function upd($banco_data = array()){
        foreach ($banco_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE tbl_usuario SET usu_pas = '$usu_pas', usu_id_usu = $usu_id_usU, usu_ema = '$usu_ema', usu_nom = '$usu_nom', usu_prof = '$usu_pro', usu_ciud = '$usu_ciu', usu_pais = '$usu_pai', usu_fech = '$usu_fec', usu_url = '$usu_url', usu_tel = '$usu_tel', usu_rol = '$usu_rol', usu_ced = '$usu_ced', usu_est = '$usu_est',usu_col = '$usu_col', usu_por = '$usu_por' WHERE usu_id = $usu_id";
        $this->set_query();
        $this->query = "UPDATE tbl_cuenta SET cue_num = '$usu_cue', cue_ban_fk = $usu_ban WHERE cue_cod = $usu_id";
        $this->set_query();
    }
    public function sel($cban_id = ''){
        $this->query = ($cban_id != '') ? "SELECT * FROM tbl_cuenta_banco WHERE cban_id = $cban_id"
        : "SELECT * FROM tbl_cuenta_banco";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function del($cban_id = ''){
        $this->query = "DELETE FROM tbl_cuenta_banco WHERE cban_id = $cban_id";
        $this->set_query();
    }
}
