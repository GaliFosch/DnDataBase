<?php

class Database {
    private $instance;

    public function __construct(){
        $this->instance = new mysqli("localhost","root","","dndatabase");
        if ($this->instance -> connect_errno) {
            echo "Failed to connect to MySQL: " . $this->instance -> connect_error;
            exit();
        }
    }

    public function getConnection(){
        return $this->instance;
    }

    public function getAccount($nik, $psw){
        $sql = "SELECT * FROM giocatore WHERE nickname = ? AND password = ?";
        $stmnt = $this->instance->prepare($sql);
        $stmnt->bind_param("ss", $nik, $psw);
        $stmnt->execute();
        $result = $stmnt->get_result();
        if($result->num_rows == 0){
            return false;
        }
        return $result->fetch_assoc();
    }
}