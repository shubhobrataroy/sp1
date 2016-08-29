<?php

    if($_GET['username']!="" && $_GET['password']!="")
    {
        session_start();
        $_SESSION['username']=$_GET['username'];
        $_SESSION['password']=$_GET['password'];
        echo 'We got your request to login . Trying to connect to the server please wait';
            echo "<script>window.location='db_connect.php';</script>";
    }

  else 
   {
        echo "<script>alert('Varification Failed. Please Try Again';window.location='index.html';</script>";
   }
   
?>