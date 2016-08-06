<?php

    if($_GET['username']!="" && $_GET['password']!="" && $_GET['server'])
    {
        session_start();
        $_SESSION['username']=$_GET['username'];
        $_SESSION['password']=$_GET['password'];
        echo 'We got your request to login . Trying to connect to the server please wait';
        if($_GET['server']==1)
            echo "<script>window.location='db_connect_mssql.php';</script>";
        else if($_GET['server']==2)
            echo "<script>window.location='db_connect.php';</script>";
    }

  else 
   {
        echo "<script>alert('Varification Failed. Please Try Again';window.location='index.html';</script>";
   }
   
?>