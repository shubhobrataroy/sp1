<?php
$link = mysql_connect('localhost:3306','root','') or die("Connecton error");
mysql_select_db("users");

$query = "insert into users.registration values ('".$_GET['username']."','".$_GET['email']."','".$_GET['password']."','".$_GET['username']."')";
echo $query;
//$res= mysql_query($query) or die("Error");

?>