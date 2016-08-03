<?php

    if($_POST['username']!="" && $_POST['password']!="")
    {
        session_start();
        $_SESSION['username']=$_POST['username'];
        $_SESSION['password']=$_POST['password'];
        echo 'hello';
        echo "<script>window.location='db_connect_mssql.php';</script>";
    }

  else 
   {
        echo "<script>alert('Varification Failed. Please Try Again';window.location='index.html';</script>";
   }
   
?>