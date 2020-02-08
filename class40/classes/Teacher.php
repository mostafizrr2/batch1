<?php

include __DIR__."/../client/MessageClient.php";

class Teacher{

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
        $text .= "From Teacher";

        new MessageClient($this->number, $text);
    }

}