<?php 
// CONSTANT + __construct
// ******************************************************


// class Company{
//     public $name;

//     const NAME = "Mostafiz Rahman <br>";

//    function __construct($cmp)
//    {
//     define('MYNAME', 'Mostafiz Rahman <br>');

//     echo self::NAME;
//     echo MYNAME;
//    }

//    function helloCompany()
//    {
//     echo "from helloCompany - ". $this->name ."<br>";
//    }

// }

// $obj = new Company('Dcodea IT Technologies');


// Interface 
// ****************************************************************

// interface Country{
//     public function Desh($nm, $pp);
// }


// class Saarc implements Country{
    
//     function Desh($name, $population){
//        echo "$name is a saarc listed Country.<br>";

//        if($population != null)
//        {
//          echo "which population is $population";
//        }
//     }


// }


// $obj = new Saarc;
// $obj->Desh("Bangladesh", 5);


class Dcodea{
  
    public static $programmer = "Shajid Khan";

    static public function software()
    {
        return "I am a software <br>";
    }

    static function website()
    {
        echo "I am a website <br>";
        echo self::software();
        echo self::$programmer;

    
    }

}

// Dcodea::software();
Dcodea::website();


