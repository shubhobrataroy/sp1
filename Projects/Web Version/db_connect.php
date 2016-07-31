<?php
  $link = mysql_connect('localhost:3306','root','') or die("Connecton error");
  mysql_select_db("users");
  $res= mysql_query("select * from users.details where username='".$_GET["username"]."';") or die("Error");
  
  $row = mysql_fetch_array($res);


  if (sizeof($row)==0)
  { 
    //echo "<script>alert('Username Not found'); window.location('index.html');</script>";
  }

  else if($row['password']==$_GET['password']) 
  {
  echo 'Connection Succeded';
  session_start();
  $_SESSION['username']=$_GET['username'];
  $_SESSION['password']=$_GET['password'];
  $_SESSION['logout']='no';
  
  if($_SESSION['username']=='admin')
  {
  echo "<script>window.location='admin.php'</script>";
  }
  }
  else 
    //echo "<script>alert('Username Not found/ Invalid Password. Please Try again'); window.location='index.html';</script>";
?>