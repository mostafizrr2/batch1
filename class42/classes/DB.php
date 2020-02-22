<?php 

class DB{

    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbname = "image_db";

    public $conn;

    private function connect()
    {
        $this->conn =  new mysqli($this->host, $this->user, $this->pwd, $this->dbname);

        if($this->conn)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    public function insert($q)
    {
       $this->connect();

       $insert = $this->conn->query($q);

       if($insert)
       {
           return true;
       }
       else 
       {
           die("Error! Something went wrong when insertation");
       }
    }

    public function getData($q)
    {
        $this->connect();
        $data = $this->conn->query($q);

        if($data)
        {
            return $data;
        }
        else 
        {
            die("Error! Something went wrong when insertation");
        }

    }


    public function delete($q)
    {
        $this->connect();

        $data = $this->conn->query($q);

        if($data)
        {
            return true;
        }
        else 
        {
            die("Error! Something went wrong when insertation");
        }
    }
    

}