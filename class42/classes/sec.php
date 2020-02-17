<?php 

function sec($data)
{
    $dt = filter_var($data, FILTER_SANITIZE_STRIPPED);
    return $dt;
}