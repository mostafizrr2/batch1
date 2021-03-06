<?php 

class DB{

    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbname = "db_contact";

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
            die("Error! Something went wrong when fetching data");
        }

    }

    public function update($q)
    {
        $this->connect();
        
        $data = $this->conn->query($q);

        if($data)
        {
            return true;
        }
        else 
        {
            die('Something went wrong when updating.');
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