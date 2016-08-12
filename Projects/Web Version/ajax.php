<?php

$link = mysql_connect('localhost:3306','root','') or die("Connecton error");
mysql_select_db("users");


if($_GET['q']!='') {
    $res= mysql_query("select username from users.details where username like '".$_GET["q"]."%';") or die("Could not connect to database ");
    if (sizeof($res) == 0) echo 'No suggestions';

    else {
        echo 'Username Suggestion : ';
        while ($row = mysql_fetch_array($res)) {
            echo $row['username'];
        }

    }
}
else
{
    $res= mysql_query("select username from users.details where username='".$_GET["username"]."';") or die("Could not connect to database ");
    if (sizeof($res) != 0)
    {
        while ($row = mysql_fetch_array($res)) {
             if($row['username']==$_GET['username'])echo 'This username is already taken';
    }}
}

?>