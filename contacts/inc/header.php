<?php 
  include __DIR__."/../config.php";
  
  include($base_path."helpers/menu-helper.php");
  include($base_path."helpers/dump.php");

  session_start();


  include $base_path."classes/DB.php";
  $db = new DB;

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>

    <style>
        *{
            margin:0;
            padding: 0;
        }
        
        .footer{
            width: 100%;
            height: 130px;
            line-height: 100px;
            text-align: center;
            color: white;
            clear: both;
        }
    </style>
  </head>
  <body>
    <?php include "inc/menu.php" ?>

    <?php

      $rq = $_SERVER['REQUEST_URI'];
     
      $rq = trim($rq, '/');

      if($rq == "contacts" || $rq == "contacts/index.php")
      {
    ?>

        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Welcome to Contact Manager</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                <p>You can save your contacts in this application.</p>
                <a class="btn btn-primary btn-lg" href="create.php" role="button">CREATE NEW</a>
            </div>
        </div>

    <?php 
      }
    ?>

    <div class="container">