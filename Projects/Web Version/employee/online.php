<?php


$link = mysql_connect('localhost:3306','root','') or die("Connecton error");
mysql_select_db("users");


if($_GET['q']!='') //Username Suggestions are retrived from here
{
        $query="UPDATE details SET status='".$_GET['status']."'WHERE username='".$_GET['username']."';";
        mysql_query($query) or die("Could not connect to database ");

        if($_GET['status']=='offline') session_destroy();

}
?>