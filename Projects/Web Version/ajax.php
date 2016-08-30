<?php

$link = mysql_connect('localhost:3306','root','') or die("Connecton error");
mysql_select_db("users");


function getTaskDetails()
{
    $res= mysql_query("select * from users.Task ;") or die("Could not connect to database ");
    echo '<table class="table-hover table-bordered" style="width: 100%">';

    echo '<tr>';
    echo '<td>'.'Assigned To'.'</td>';
    echo '<td>'.'Assigned By'.'</td>';
    echo '<td>'.'Task Description'.'</td>';
    echo '<td>'.'Status'.'</td>';
    echo '<td>'.'Start Date'.'</td>';
    echo '<td>'.'End Date'.'</td>';
    echo '<td>'.'Completed At'.'</td>';
    echo '</tr>';

    while($row=mysql_fetch_array($res))
    {
        echo '<tr>';
        echo '<td>'.$row['assigned_to'].'</td>';
        echo '<td>'.$row['assigned_from'].'</td>';
        echo '<td>'.$row['description'].'</td>';
        echo '<td>'.$row['status'].'</td>';
        echo '<td>'.$row['start_date'].'</td>';
        echo '<td>'.$row['end_date'].'</td>';
        echo '<td>'.$row['completed_at'].'</td>';
        echo '</tr>';

    }
    echo '</table>';
}

function getNoticeDetails()
{
    $res= mysql_query("select * from users.notice ;") or die("Could not connect to database ");
    echo '<table class="table-hover table-bordered" style="width: 100%">';

    echo '<tr>';
    echo '<td>'.'Notice'.'</td>';
    echo '<td>'.'Notice For'.'</td>';
    echo '<td>'.'Employee Type'.'</td>';
    echo '<td>'.'Posted On'.'</td>';

    echo '</tr>';

    while($row=mysql_fetch_array($res))
    {
        echo '<tr>';
        echo '<td>'.$row['notice'].'</td>';
        echo '<td>'.$row['username'].'</td>';
        echo '<td>'.$row['eType'].'</td>';
        echo '<td>'.$row['date'].'</td>';

        echo '</tr>';

    }
    echo '</table>';
}

function getNoticeNumbers()
{
    $res= mysql_query("select * from users.notice ;") or die("Could not connect to database ");
    echo mysql_num_rows($res);
}

function manage()
{
    $res= mysql_query("select * from users.details ;") or die("Could not connect to database ");
    echo '<table class="table-hover table-bordered" style="width: 100%">';

    echo '<tr>';
    echo '<td>'.'Username'.'</td>';
    echo '<td>'.'Priviledge'.'</td>';
    echo '<td>'.'Status'.'</td>';

    echo '<td>'.'Delete'.'</td>';
    echo '</tr>';

    while($row=mysql_fetch_array($res))
    {
        echo '<tr>';
        echo '<td>'.$row['username'].'</td>';
        echo '<td>'.$row['privilege'].'</td>';
        echo '<td>'.$row['status'].'</td>';


        echo '<td>'."<button type='button' class='btn btn-danger' onclick=rmv('".$row['username']."')>Delete</button>".'</td>';
        echo '</tr>';

    }
    echo '</table>';
}

function alert ($message)
{
    echo "<script type='text/javascript'>alert('$message');</script>";
}

function delete ()
{

    $query = "DELETE FROM details WHERE username='".$_GET['username']."'";

    $res= mysql_query($query) or die('Error 1');

}

function getAttandenceReport ()
{
    $res= mysql_query("select * from users.attendance;") or die("Could not connect to database ");
    echo '<table class="table-hover table-bordered" style="width: 100%">';

    echo '<tr>';
    echo '<td>'.'Username To'.'</td>';
    echo '<td>'.'Day '.'</td>';
    echo '<td>'.'Time'.'</td>';
    echo '</tr>';

    while($row=mysql_fetch_array($res))
    {
        echo '<tr>';
        echo '<td>'.$row['uname'].'</td>';
        echo '<td>'.$row['day'].'</td>';
        echo '<td>'.$row['tim'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
}

function getPerformanceReport ()
{
    $res= mysql_query("select username from users.details;") or die("Could not connect to database ");



    echo '<table class="table-hover table-bordered" style="width: 100%">';

    echo '<tr>';
    echo '<td>'.'Username'.'</td>';
    echo '<td>'.'Total attendence '.'</td>';
    echo '<td>'.'Assigned tasks'.'</td>';
    echo '<td>'.'Completed tasks'.'</td>';
    echo '<td>'.'Incomplete tasks'.'</td>';
    echo '<td>'.'Delayed tasks'.'</td>';
    echo '<td>'.'Efficiency'.'</td>';
    echo '<td>'.'Modify'.'</td>';
    echo '</tr>';
    error_reporting(E_ERROR | E_PARSE);
    while($row=mysql_fetch_array($res))
    {
        $attendence = mysql_query("select uname from users.attendance where uname='".$row['username']."';") or die("Could not connect to database ");
        $total_attendence=mysql_num_rows($attendence);
        $assignedtask = mysql_query("select * from users.task where assigned_to='".$row['username']."';") or die("Could not connect to database ");
        $total_task=mysql_num_rows($assignedtask);
        $completed_task=0;

        $delayed=0;
        while($task=mysql_fetch_array($assignedtask))
        {
            $task_deadline = strtotime($task['end_date']);
            $task_completed= strtotime($task['completed_at']);

            if($task_completed>$task_deadline) $delayed++;

            if($task['completed_at']!='') $completed_task++;
        }
        $incomplete_task=$total_task-$completed_task;

            $efficiency = ((($total_attendence/30) * 0.5 + ($completed_task / $total_task) * 0.5 - $delayed * 0.20) * 100) | 0;

        echo '<tr>';
        echo '<td>'.$row['username'].'</td>';
        echo '<td>'.$total_attendence.'</td>';
        echo '<td>'.$total_task.'</td>';
        echo '<td>'.$completed_task.'</td>';
        echo '<td>'.$incomplete_task.'</td>';
        echo '<td>'.$delayed.'</td>';
        echo '<td>'.$efficiency. '%'.'</td>';
        echo '<td>'."<button type='button' class='btn btn-danger' onclick=modify('".$row['username']."') >Modify</button>".'</td>';
        echo '</tr>';
    }
    echo '</table>';
}

function modify ()
{
    $username = $_GET['param1'];
    $res= mysql_query("select * from users.Task where assigned_to='".$username."';") or die("Could not connect to database ");
    echo '<table class="table-hover table-bordered" style="width: 100%">';

    echo '<tr>';
    echo '<td>'.'Assigned To'.'</td>';
    echo '<td>'.'Assigned By'.'</td>';
    echo '<td>'.'Task Description'.'</td>';
    echo '<td>'.'Status'.'</td>';
    echo '<td>'.'Start Date'.'</td>';
    echo '<td>'.'End Date'.'</td>';
    echo '<td>'.'Completed At'.'</td>';

    echo '</tr>';

    while($row=mysql_fetch_array($res))
    {

        echo '<tr>';
        echo '<td>'.$row['assigned_to'].'</td>';
        echo '<td>'.$row['assigned_from'].'</td>';
        echo '<td>'.$row['description'].'</td>';
        echo '<td>'.$row['status'].'</td>';
        echo '<td>'.$row['start_date'].'</td>';
        echo '<td>'.$row['end_date'].'</td>';
        echo '<td><input type="text" value="'.$row['completed_at'].'" onkeyup='."'updateComplete".'(this.value,"'.$row['task_id'].'")'."'".'/></td>';
        echo '</tr>';

    }
    echo '</table>';
}

function message ($message)
{
    echo $message;
}

function updateDate ()
{
    echo '';
    $query="UPDATE task SET completed_at="."'".$_GET['param1']."' WHERE task_id='".$_GET['param2']."'";
    $res= mysql_query($query) or die("Database error") ;
    echo 'Updated Successfully';
}

if($_GET['q']!='') //Username Suggestions are retrived from here
{
    if($_GET['q']=='assignedNumber')
    {
        $res= mysql_query("select * from users.Task ;") or die("Could not connect to database ");
        echo mysql_num_rows($res);
    }

    else if ($_GET['q']=='assignedTaskDetail')
    {
        getTaskDetails();
    }

    else if ($_GET['q']=='setStatus')
    {
         $query="UPDATE details SET status='".$_GET['status']."'WHERE username='".$_GET['username']."';";
        mysql_query($query) or die("Could not connect to database ");

        if($_GET['status']=='offline') session_destroy();
    }
    else if($_GET['q']=='noticeDetails'){
        getNoticeDetails();
    }

    else if ($_GET['q']=='noticeNumbers')
    {
        getNoticeNumbers();
    }


    else if ($_GET['q']=='manage')
    {

        manage();
    }

    else if ($_GET['q']=='delete')
    {
        delete ();
        //alert('hello');
    }

    else if ($_GET['q']=='attendenceReport')
    {
        getAttandenceReport ();
        //alert('hello');
    }

    else if ($_GET['q']=='performanceReport')
    {
        getPerformanceReport ();
        //alert('hello');
    }


    else if ($_GET['q']=='modify')
    {
      modify();
    }

    else if ($_GET['q']=='updateDate')
    {
        updateDate();

    }

    else{
    $res = mysql_query("select username from users.details where username like '" . $_GET["q"] . "%';") or die("Could not connect to database ");
    if (sizeof($res) == 0) echo 'No suggestions';

    else {
        echo 'Username Suggestion : ';
        while ($row = mysql_fetch_array($res)) {
            echo $row['username'];
        }

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
        echo '<td>'.'Address'.'</td>';
        echo '<td>'.'Accept'.'</td>';
        echo '<td>'.'Reject'.'</td>';
    echo '</tr>';

    while($row=mysql_fetch_array($res))
    {
        echo '<tr>';
          echo '<td>'.$row['uname'].'</td>';
          echo '<td>'.$row['email'].'</td>';
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
    $query2 = "insert into details values ('".$_GET['accept']."','".$_GET['password']."','employee','offline');";
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

        if($_GET['startdate']!='')
         $startdate=$_GET['startdate'];
        else
          $startdate=date("Y-m-d");
        $query = "INSERT INTO task(assigned_to, assigned_from, description, status,start_date,end_date) VALUES ('".$_GET['empName']."','admin','".$_GET['task']."','Assigned','".$startdate."','".$_GET['enddate']."');";
        alert($query);
        $res= mysql_query($query,$link) ;
        //or die('<script>alert("Notice posting failed")</script>');

        $x= mysql_error($link);
        echo $x;

    }
}


?>