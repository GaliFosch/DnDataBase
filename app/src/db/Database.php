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
}