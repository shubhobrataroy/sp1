<?php
	$link = mysql_connect('localhost:3306','root','') or die("Connecton error");
	mysql_select_db("users");
	
	session_start();
	
	
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
	if($_GET['notice'] == 'pending'){    //notice number
		$res= mysql_query("SELECT * FROM `notice` WHERE (username='All' or username='".$_SESSION["username"]."')") or die("Could not connect to database ");
		echo mysql_num_rows($res);
	}
	if($_GET['profile'] == 'tasknumber'){    //task number
		$res= mysql_query("select * from users.task where assigned_to='".$_SESSION['username']."';") or die("Could not connect to database ");
		echo mysql_num_rows($res);
	}
	if($_GET['profile'] == 'show') //profile in loaded here
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
	if($_GET['profile'] == 'taskwork') //task in loaded here
	{
		$res= mysql_query("select * from users.task where assigned_to='".$_SESSION['username']."';") or die("Could not connect to database ");
		echo '<table class="table-hover table-bordered" style="width: 100%">';
		
		echo '<tr>';
			echo '<td>'.'Asssigned To'.'</td>';
			echo '<td>'.'From '.'</td>';
			echo '<td>'.'Description'.'</td>';
			echo '<td>'.'status'.'</td>';
			echo '</tr>';

		while($row=mysql_fetch_array($res))
		{
				echo '<tr>';
				echo '<td>'.$row['assigned_to'].'</td>';
				echo '<td>'.$row['assigned_from'].'</td>';
				echo '<td>'.$row['description'].'</td>';
				echo '<td>'.$row['status'].'</td>';
				echo '</tr>';
		}
		    echo '</table>';
		
	}
?>