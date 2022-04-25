<?php
abstract class model{
    //Atributos
    private static $db_host    = 'localhost';
    private static $db_user    = 'root';
    private static $db_pass    = '';
    private static $db_name    = 'db_appsence';
    private static $db_charset = "utf8";
    private $conn;
    protected $query;
    protected $rows = array();

    //Metodos
    //Metodos abstractos protegidos para CRUD para las clases que hereden
    abstract protected function ins();
    abstract protected function upd();
    abstract protected function sel();
    abstract protected function del();
    //Metodo para conectarse a la base de datos
    private function db_open()
    {
        $this->conn = new mysqli(
            self::$db_host,
            self::$db_user,
            self::$db_pass,
            self::$db_name
        );
        $this->conn->set_charset(self::$db_charset);
    }

    //Metodo para desconectarse de la base de datos
    private function db_close()
    {
        $this->conn->close();

    }
    protected function set_query()
    {
        $this->db_open();
        $this->conn->query($this->query);
        if ($this->conn->errno <> 0) {
            $id = -1;
        }else {
            $id = $this->conn->insert_id;
        }
        $this->db_close();
        return $id;
    }
    protected function get_query()
    {
        $this->db_open();
        $result = $this->conn->query($this->query) or die($this->conn->error);
        $num_rows = $result->num_rows;
        while ($this->rows[] = $result->fetch_assoc());
        $result->close();
        $this->db_close();
        return array_pop($this->rows);
    }

}
