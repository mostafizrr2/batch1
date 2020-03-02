<?php 

function setActive($req ,$cls = false)
{
    $rq = $_SERVER['REQUEST_URI'];
    
    $rq = trim($rq, '/');

    if($req == $rq)
    {
        echo $cls;
    }
    
}