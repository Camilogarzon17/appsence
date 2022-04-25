<?php  
require_once('connection.php');

class publicationModule extends Connection{

    public function __construct(){
        $this->db_name = 'develtec_web';
    }

    public function create($pub_data = array()){
        foreach ($facture_data as $key => $value) {
            //$$ = variable de variable
            $$key = $value;
        }
        $this->query = "INSERT INTO tbl_cotizacion (cot_ema, cot_ser, cot_cli, cot_tit, cot_con, cot_fec) VALUES ('$correo', $servicio, '$cliente', '$titulo', '$contenido', '$fecha');";
        $this->set_query();
    }
    public function read($pub_id = ''){
        $this->query = ($usua_cod != '')?"SELECT * FROM tbl_cotizacion WHERE usua_cod = $usua_cod"
        :"SELECT * FROM tbl_cotizacion";
        $this->get_query();
        $num_rows = count($this->rows);
        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data,$value);
        }
        return $data;
    }
    public function update($pub_data = array()){
        foreach ($facture_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "UPDATE tbl_cotizacion SET usu_ema = '$correo', usu_nom = '$nombre', usu_prof = '$profesion', usu_ciud = '$ciudad', usu_pais = '$pais', usu_tel = '$celular', usu_rol = '$rolUsu', usu_ced = '$cedula', usu_fech = '$fechNac' WHERE usu_id = $usu_id;"; 
        $this->set_query();
    }
    public function delete($pub_id = ''){
        $this->query = "DELETE FROM tbl_cotizacion WHERE usu_id = $id"; 
        $this->set_query();
    }
}
?>