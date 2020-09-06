<?php

class DB
{

    private $servername;
    private $username;
    private $password;
    private $dbname;


    public function connect()
    {

        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "eshop";


        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        return $conn;
    }
}
