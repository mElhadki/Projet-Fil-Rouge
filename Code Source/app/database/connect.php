<?php

class DB
{

    private $servername;
    private $username;
    private $password;
    private $dbname;


    public function connect()
    {

        $this->servername = "us-cdbr-east-02.cleardb.com";
        $this->username = "bb6f8b7a0a4653";
        $this->password = "d99a8602";
        $this->dbname = "heroku_dfd5a2a18c8bae4";


        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        return $conn;
    }
}
