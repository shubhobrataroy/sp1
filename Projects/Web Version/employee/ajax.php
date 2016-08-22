<?php
	$link = mysql_connect('localhost:3306','root','') or die("Connecton error");
	mysql_select_db("users");
	
	if($_GET['notice']=='show') //Notice table is retrived here
	{
		$res= mysql_query("select * from users.notice;") or die("Could not connect to database ");
		echo '<table class="table-hover table-bordered" style="width: 100%">';

		echo '<tr>';
			echo '<td>'.'From'.'</td>';
			echo '<td>'.'To'.'</td>';
			echo '<td>'.'Date'.'</td>';
			echo '<td>'.'Notice'.'</td>';
			echo '</tr>';

		while($row=mysql_fetch_array($res))
		{
			echo '<tr>';
			echo '<td>'.$row['username'].'</td>';
			echo '<td>'.$row['eType'].'</td>';
			echo '<td>'.$row['date'].'</td>';
			echo '<td>'.$row['notice'].'</td>';
			echo '</tr>';
		}
		    echo '</table>';
    }
	if($_GET['notice'] == 'pending'){
		$res= mysql_query("select * from users.notice;") or die("Could not connect to database ");
		echo mysql_num_rows($res);
	}

?>