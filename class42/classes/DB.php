<?php 

class DB{
   
    private $dbhost = DB_HOST;
    private $dbname = DB_NAME;
    private $dbuser = DB_USER;
    private $dbpass = DB_PASS;

    public $conn;

    function __construct()
    {
       $this->connectDB();
    }

    function connectDB()
    {
       $this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname );
    }


    function insert($q)
    {
       $data = $this->conn->query($q);

       return $data;
    }


}