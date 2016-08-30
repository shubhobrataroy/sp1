<?php
	$link = mysql_connect('localhost:3306','root','') or die("Connecton error");
	mysql_select_db("users");
	
	session_start();

    function alert ($message)
    {
        echo "<script type='text/javascript'>alert('$message');</script>";
    }


if($_GET['notice']=='show') //Notice table is retrived here
	{
		$res= mysql_query("select * from users.notice;") or die("Could not connect to database ");
		echo '<table class="table-hover table-bordered" style="width: 100%">';

		echo "<center><h4>Notice</h4></center>";
		echo '<tr>';
			echo '<td>'.'To'.'</td>';
			echo '<td>'.'Employee Type'.'</td>';
			echo '<td>'.'Date'.'</td>';
			echo '<td>'.'Notice'.'</td>';
			echo '</tr>';

		while($row=mysql_fetch_array($res))
		{
			if($row['username'] == 'All' | $row['username'] == $_SESSION["username"] ){
				echo '<tr>';
				echo '<td>'.$row['username'].'</td>';
				echo '<td>'.$row['eType'].'</td>';
				echo '<td>'.$row['date'].'</td>';
				echo '<td>'.$row['notice'].'</td>';
				echo '</tr>';
			}
		}
		    echo '</table>';
			
    }

    else if($_GET['q']=='accept')
    {
        $query="UPDATE task SET status='accepted' WHERE task_id=".$_GET['accept'];
        echo $query;
        $res= mysql_query($query) or die("Could not connect to database ");

    }

    else if($_GET['q']=='complete')
    {
        $query="UPDATE task SET status='complete' WHERE task_id=".$_GET['accept'];
        echo $query;
        $res= mysql_query($query) or die("Could not connect to database ");

        $query2="UPDATE task SET completed_at='".date("Y-m-d")."' WHERE task_id=".$_GET['accept'];
        echo $query2;
        $res= mysql_query($query2) or die("Could not connect to database ");

    }


    else if($_GET['notice'] == 'pending'){    //notice number
		$res= mysql_query("SELECT * FROM `notice` WHERE (username='All' or username='".$_SESSION["username"]."')") or die("Could not connect to database ");
		echo mysql_num_rows($res);
	}
	else if($_GET['profile'] == 'tasknumber'){    //task number
		$res= mysql_query("select * from users.task where assigned_to='".$_SESSION['username']."' and status='Assigned';") or die("Could not connect to database ");
		echo mysql_num_rows($res);
	}
	else if($_GET['profile'] == 'incomplete'){    //task number
		$res= mysql_query("select * from users.task where status='accepted';") or die("Could not connect to database ");
		echo mysql_num_rows($res);
	}
	else if($_GET['profile'] == 'show') //profile in loaded here
	{
		$res= mysql_query("select * from users.registration where uname='".$_SESSION['username']."';") or die("Could not connect to database ");
		
		echo '<table class="table-hover table-bordered" style="width: 100%">';
		while($row=mysql_fetch_array($res))
		{
			echo '<tr>';
			echo '<td>Name: </td>';
			echo '<td>'.$row['uname'].'</td>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<td>Email: </td>';
			echo '<td>'.$row['email'].'</td>';
			echo '</tr>';

			echo '<tr>';
			echo '<td>Address</td>';
			echo '<td>'.$row['address'].'</td>';
			echo '</tr>';

		}
		echo '</table>';
	}
	else if($_GET['profile'] == 'taskwork') //task in loaded here
	{
		$res= mysql_query("select * from users.task where assigned_to='".$_SESSION['username']."' and status='assigned';") or die("Could not connect to database ");
		echo '<table class="table-hover table-bordered" style="width: 100%">';
		
		echo '<tr>';
			echo '<td>'.'Asssigned To'.'</td>';
			echo '<td>'.'From '.'</td>';
			echo '<td>'.'Description'.'</td>';
			echo '<td>'.'status'.'</td>';
            echo '<td>'.'Action'.'</td>';
			echo '</tr>';

		while($row=mysql_fetch_array($res))
		{
				echo '<tr>';
				echo '<td>'.$row['assigned_to'].'</td>';
				echo '<td>'.$row['assigned_from'].'</td>';
				echo '<td>'.$row['description'].'</td>';
				echo '<td>'.$row['status'].'</td>';
                echo '<td>'."<button type='button' class='btn btn-success' onclick=acceptTask('".$row['task_id']."')>Accept</button>".'<td/>';
				echo '</tr>';
		}
		    echo '</table>';
		
	}

    else if($_GET['profile'] == 'taskwork2') //task in loaded here
    {
        $res= mysql_query("select * from users.task where assigned_to='".$_SESSION['username']."' and status='accepted';") or die("Could not connect to database ");
        echo '<table class="table-hover table-bordered" style="width: 100%">';

        echo '<tr>';
        echo '<td>'.'Asssigned To'.'</td>';
        echo '<td>'.'From '.'</td>';
        echo '<td>'.'Description'.'</td>';
        echo '<td>'.'status'.'</td>';
        echo '<td>'.'Action'.'</td>';
        echo '</tr>';

        while($row=mysql_fetch_array($res))
        {
            echo '<tr>';
            echo '<td>'.$row['assigned_to'].'</td>';
            echo '<td>'.$row['assigned_from'].'</td>';
            echo '<td>'.$row['description'].'</td>';
            echo '<td>'.$row['status'].'</td>';
            echo '<td>'."<button type='button' class='btn btn-success' onclick=completeTask('".$row['task_id']."')>Completed</button>".'<td/>';
            echo '</tr>';
        }
        echo '</table>';

    }

	else if($_GET['profile'] == 'scroll') //task in loaded here
	{
		$res= mysql_query("SELECT * FROM `notice` WHERE (username='All' or username='".$_SESSION["username"]."')") or die("Could not connect to database ");

		while($row=mysql_fetch_array($res))
		{
				echo $row['notice']." *** ";
				
		}
		    
		
	}
	else if($_GET['profile'] == 'attend') //attendance in calculated here
	{
		
		$res=mysql_query("SELECT * FROM users.attendance");
		while($row=mysql_fetch_array($res))
		{
				if( $row['day']===date("Y/m/d")  ){
					echo '<script language="javascript">alert("You have already attended for today..");</script>';
					
					ob_start();
					header('Location:', 'employee.php');
					ob_end_flush();
					die();	
				}
				
		}
		$res2= mysql_query("insert into `attendance` values ('".$_SESSION["username"]."','".date("Y/m/d")."','".date("h:i:sa")."')") or die("Could not connect to database ");
		echo $_SESSION["username"]." have atended for today";
	}
	else if($_GET['profile'] == 'present') //attendance in loaded here
	{
		$res= mysql_query("select * from users.attendance where uname='".$_SESSION['username']."';") or die("Could not connect to database ");
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
?>