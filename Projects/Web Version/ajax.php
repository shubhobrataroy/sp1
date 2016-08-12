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
else if($_GET["username"]!='')
{
    $res= mysql_query("select username from users.details where username='".$_GET["username"]."';") or die("Could not connect to database ");
    if (sizeof($res) != 0)
    {
        while ($row = mysql_fetch_array($res)) {
             if($row['username']==$_GET['username'])echo 'This username is already taken';
    }}
}
else if($_GET['pending']=='true')
{
    $res= mysql_query("select * from users.Registration ;") or die("Could not connect to database ");
    echo mysql_num_rows($res);
}

else if($_GET['pending']=='info')
{
    $res= mysql_query("select * from users.Registration ;") or die("Could not connect to database ");
    echo '<table class="table-hover table-bordered" style="width: 100%">';
    while($row=mysql_fetch_array($res))
    {
        echo '<tr>';
          echo '<td>'.$row['uname'].'</td>';
          echo '<td>'.$row['email'].'</td>';
          echo '<td>'.$row['password'].'</td>';
          echo '<td>'.$row['address'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
}


?>