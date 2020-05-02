<?php
class Account {
    private $conn;
    private $table='t_accounts';

    public $acc_id;
    public $acc_fullname;

    public function __construct($db) {
        $this->conn = $db;
        $this->stmt = null;
    }

    public function read() {
        $query = "SELECT acc_UIC, acc_fullname FROM $this->table";
        try {
            $rs = sqlsrv_query($this->conn, $query,array(), array("Scrollable"=>"buffered")  );
            $this->stmt = $rs;

        } catch (Exception $e) {
            echo "An error occurred";
        }
        return $rs;
    }
    public function next() {
        $res = sqlsrv_fetch_array($this->stmt, SQLSRV_FETCH_ASSOC);
        return $res;
    }

}?>