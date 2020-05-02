<?php
class Query {
    private $conn;
    private $query;


    public function __construct($db, $query) {
        $this->conn = $db;
        $this->query = $query;
        $this->stmt = null;
    }

    public function read() {
      
        try {
            
            $this->stmt = $this->conn->query($this->query);
        } catch (Exception $e) {
            echo "An error occurred";
        }
        return $this->stmt;
    }
    public function next() {
        return $this->stmt->fetch(PDO::FETCH_ASSOC) ;
    }
    public function fetchAll() {
        if (!$this->stmt) {
            $this->read();
        }
        $queryData['data'] = array();
         while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC) ) {
             $item = array();
             foreach(array_keys($row) as $key) {
                $item[$key]=utf8_encode($row[$key]);
             }
             array_push($queryData['data'], $item);
         }
         return $queryData;
    }

}?>