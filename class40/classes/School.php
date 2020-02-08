<?php

include __DIR__."/../client/MessageClient.php";


class School{

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
        $text .= "From school";
          
        new MessageClient($this->number, $text);

    }

    
}