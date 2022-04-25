<?php
class blogModel extends model{

    public function ins($blog_data = array()){
        foreach ($blog_data as $key => $value) {
            $$key = $value;
        }

        $this->query = "INSERT INTO tbl_usuario (usu_pas,usu_id_usu, usu_ema, usu_nom, usu_prof, usu_ciud, usu_pais, usu_fech, usu_url, usu_tel, usu_rol, usu_ced, usu_est,usu_col, usu_por) VALUES ('$usu_pas',$usu_id_usu, '$usu_ema', '$usu_nom', '$usu_pro', '$usu_ciu', '$usu_pai', '$usu_fec', '$usu_url' , '$usu_tel', '$usu_rol', '$usu_ced','$usu_est','$usu_col','$usu_por')";
        $this->set_query();
        $this->query = "INSERT INTO tbl_cuenta (cue_num,cue_ban_fk,cue_usu_fk) VALUES ('$usu_cue',$usu_ban, $usu_id)";
        $this->set_query();
    }
    public function upd($blog_data = array()){
        foreach ($blog_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE tbl_usuario SET usu_pas = '$usu_pas', usu_id_usu = $usu_id_usU, usu_ema = '$usu_ema', usu_nom = '$usu_nom', usu_prof = '$usu_pro', usu_ciud = '$usu_ciu', usu_pais = '$usu_pai', usu_fech = '$usu_fec', usu_url = '$usu_url', usu_tel = '$usu_tel', usu_rol = '$usu_rol', usu_ced = '$usu_ced', usu_est = '$usu_est',usu_col = '$usu_col', usu_por = '$usu_por' WHERE usu_id = $usu_id";
        $this->set_query();
        $this->query = "UPDATE tbl_cuenta SET cue_num = '$usu_cue', cue_ban_fk = $usu_ban WHERE cue_cod = $usu_id";
        $this->set_query();
    }
    public function sel($blog_cod = ''){
        $this->query = ($blog_cod != '') ? "SELECT * FROM tbl_blog WHERE fact_id = $blog_cod"
        : "SELECT * FROM tbl_blog";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function del($blog_cod = ''){
        $this->query = "DELETE FROM tbl_blog WHERE fact_id = $blog_cod";
        $this->set_query();
    }
    public function articleContent($blog_cod = ''){
        $cod_enc     = base64_decode($blog_cod);
        $this->query = "SELECT blog_des,SUBSTRING(blog_des,1,250) AS intro,blog_vid,blog_img, blog_cod, blog_tit, blog_fec, blog_fpu, blog_mgt,blog_usu, usu_nom, usu_url,usu_prof,usu_ema FROM tbl_blog As blo, tbl_usuario As usu WHERE blo.blog_usu = usu.usu_id AND blo.blog_cod = $cod_enc";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function articleText($blog_cod = '', $pos = ''){
        $cod_enc     = base64_decode($blog_cod);
        $this->query = "SELECT SUBSTRING(blog_des,1,$pos-1) AS txt_p1, SUBSTRING(blog_des FROM $pos + 5) AS txt_p2 FROM tbl_blog As blo, tbl_usuario As usu WHERE blo.blog_usu = usu.usu_id AND blo.blog_cod = $cod_enc";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;

    }
    public function articlesUser($user_id = ''){
        $this->query = ($user_id != '') ? "SELECT blog_cod, blog_tit, blog_des, blog_fec, blog_fpu, blog_mgt, usu_nom, usu_url FROM tbl_blog As blo, tbl_usuario As usu WHERE blo.blog_usu = usu.usu_id AND blo.blog_usu = $user_id ORDER BY blog_fpu DESC" : "SELECT blog_cod, blog_tit, blog_des,blog_vid, blog_fec, blog_fpu, blog_mgt, usu_nom, usu_url FROM tbl_blog As blo, tbl_usuario As usu WHERE blo.blog_usu = usu.usu_id ORDER BY blog_fpu DESC";
        $this->get_query();
        $num_rows = count($this->rows);
        $data     = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
}
