<?php


$link = mysql_connect('localhost:3306','root','') or die("Connecton error");
mysql_select_db("users");


if($_GET['q']!='') //Username Suggestions are retrived from here
{
    if($_GET['q']=='onlineNumbers')
    {
        $query = "select * from details where status='online'";
        $res=mysql_query($query) or die("Could not connect to database ");
        echo mysql_num_rows($res);
    }


    else if($_GET['q']=='onlineInfo')
    {
        $query = "select * from details where status='online'";
        $res=mysql_query($query) or die("Could not connect to database ");
        echo '<table class="table-hover table-bordered" style="width: 100%">';
        echo '<tr>';
        echo '<td>'.'Username'.'</td>';
        echo '<td>'.'Privilege'.'</td>';
        echo '<td>'.'Status'.'</td>';


        echo '</tr>';

        while($row=mysql_fetch_array($res))
        {
            echo '<tr>';
            echo '<td>'.$row['username'].'</td>';
            echo '<td>'.$row['privilege'].'</td>';
            echo '<td>'.$row['status'].'</td>';


            echo '</tr>';

        }
        echo '</table>';
    }


    else{
    $query = "UPDATE details SET status='" . $_GET['status'] . "'WHERE username='" . $_GET['username'] . "';";
    mysql_query($query) or die("Could not connect to database ");

    if ($_GET['status'] == 'offline') session_destroy();
}
}
?>