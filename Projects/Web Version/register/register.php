<?php
$link = mysql_connect('localhost:3306','root','') or die("Connecton error");
mysql_select_db("users");

$query = "insert into users.registration values ('".$_GET['username2']."','".$_GET['email']."','".$_GET['password']."','".$_GET['address']."')";

$res= mysql_query($query) or die("Error");
echo "<script>alert('Thank you for regitering . Your request has submitted for admin approval');window.location='../index.html';</script>";
?>