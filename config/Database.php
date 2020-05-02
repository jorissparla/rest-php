<?php
class Database {
    private $host = 'nlbavwixsdb1.infor.com';
    private $db_name = 'ToolsSupport';
    private $username = 'ps';
    private $password = 'm5Password';
    private $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn =  new PDO("sqlsrv:Server=$this->host;Database=$this->db_name", $this->username, $this->password);
        } catch (Exception $e) {
            echo 'Connection error'. $e->getMessage();
        }
        return $this->conn;
    }

}