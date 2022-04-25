<?php 
class programModel extends model{

    public function set($prog_data = array()){
        foreach ($facture_data as $key => $value) {
            //$$ = variable de variable
            $$key = $value;
        }
        $this->query = "REPLACE INTO tbl_programas (usu_id, usu_ema, usu_pas, usu_nom, usu_prof, usu_ciud, usu_pais, usu_fech, usu_url, usu_tel, usu_rol, usu_ced, usu_id_usu) VALUES ('','$usu_cor', '$encript', '$usu_nom', '$usu_pro', '$usu_ciu', '$usu_pai', '$usu_fec', '$url_usu' , '$usu_cel', '$usu_rol', '$usu_ced', $id);";
        $this->set_query();
    }

    public function get($prog_cod = ''){
        $this->query = ($prog_cod != '')?"SELECT * FROM tbl_programas WHERE fact_id = $prog_cod"
        :"SELECT * FROM tbl_programas";
        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data,$value);
        }
        return $data;
    }

    public function del($prog_cod = ''){
        $this->query = "DELETE FROM tbl_programas WHERE fact_id = $prog_cod"; 
        $this->set_query();
    }
}
 ?>