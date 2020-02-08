<?php

include __DIR__."/../client/MessageClient.php";

class Student{

    public $number;
    public $message;

    function __construct($num, $msg)
    {
        $this->number = $num;
        $this->message = $msg;
    }

    function sendMessage()
    {
       $text = $this->message."\n"; 
       $text .= "From Student"; 

       new MessageClient($this->number, $text);
       
    }
}