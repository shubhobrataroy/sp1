<?php

$link = mysql_connect('localhost:3306','root','') or die("Connecton error");
mysql_select_db("users");


if($_GET['q']!='') //Username Suggestions are retrived from here
{
    $res= mysql_query("select username from users.details where username like '".$_GET["q"]."%';") or die("Could not connect to database ");
    if (sizeof($res) == 0) echo 'No suggestions';

    else {
        echo 'Username Suggestion : ';
        while ($row = mysql_fetch_array($res)) {
            echo $row['username'];
        }

    }
}
else if($_GET["username"]!='') // Duplicate usernames are checked here
{
    $res= mysql_query("select username from users.details where username='".$_GET["username"]."';") or die("Could not connect to database ");
    if (sizeof($res) != 0)
    {
        while ($row = mysql_fetch_array($res)) {
             if($row['username']==$_GET['username'])echo 'This username is already taken';
    }}
}
else if($_GET['pending']=='true') //Total pending requests are retrived from here
{
    $res= mysql_query("select * from users.Registration ;") or die("Could not connect to database ");
    echo mysql_num_rows($res);
}

else if($_GET['pending']=='info') //Pending request table is retrived here
{
    $res= mysql_query("select * from users.Registration ;") or die("Could not connect to database ");
    echo '<table class="table-hover table-bordered" style="width: 100%">';

    echo '<tr>';
        echo '<td>'.'Username'.'</td>';
        echo '<td>'.'Email'.'</td>';
        echo '<td>'.'Password'.'</td>';
        echo '<td>'.'Address'.'</td>';
        echo '<td>'.'Accept'.'</td>';
        echo '<td>'.'Reject'.'</td>';
    echo '</tr>';

    while($row=mysql_fetch_array($res))
    {
        echo '<tr>';
          echo '<td>'.$row['uname'].'</td>';
          echo '<td>'.$row['email'].'</td>';
          echo '<td>'.$row['password'].'</td>';
          echo '<td>'.$row['address'].'</td>';
          echo '<td>'."<button type='button' class='btn btn-success' onclick=accept('".$row['uname']."','".$row['password']."')>Accept</button>".'</td>';
          echo '<td>'."<button type='button' class='btn btn-danger' onclick=reject('".$row['uname']."')>Reject</button>".'</td>';
        echo '</tr>';

    }
    echo '</table>';
}

else if($_GET['accept']!='')
{
    $query = "DELETE FROM registration WHERE uname='".$_GET['accept']."'";
    $query2 = "insert into details values ('".$_GET['accept']."','".$_GET['password']."','employee');";
    $res= mysql_query($query2,$link) ;
    $res= mysql_query($query) or die('Error 1');
}

else if($_GET['reject']!='')
{
    $query = "DELETE FROM registration WHERE uname='".$_GET['reject']."'";
    $res= mysql_query($query) or die('Error 1');
}

else
{
    if($_GET['notice']!='')
    {

        $query = "INSERT INTO notice(notice, username, eType, date) Values". "('".$_GET['notice']."','".$_GET['empName']."','".$_GET['empType']."','".date('Y-m-d H:i:s')."')";
        $res= mysql_query($query,$link) ;
        //or die('<script>alert("Notice posting failed")</script>');

           $x= mysql_error($link);

    }

    else if($_GET['task']!='')
    {

        $query = "INSERT INTO task(assigned_to, assigned_from, description, status) VALUES ('".$_GET['empName']."','admin','".$_GET['task']."','Assigned');";
        $res= mysql_query($query,$link) ;
        //or die('<script>alert("Notice posting failed")</script>');

        $x= mysql_error($link);
        echo $x;

    }
}


?>