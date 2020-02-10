<?php 

class Hello{

   public $hello = "hi world";

   // __get() & __set() works for properties
   function __set($nm, $value)
   {
      echo "Property name is - $nm<br> Value is - $value";
   }

   // __call works for method

   function __call($mtdName, array $data)
   {
       if(!method_exists($this, $mtdName))
       {
           echo "Vai kono method nai";
       }
       
   }


   function sayHello()
   {
    //    echo "I am saying hello.";
   }

}

$obj = new Hello(); 

$obj->methodNai(); 
