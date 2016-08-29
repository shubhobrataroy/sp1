<?php
  $link = mysql_connect('localhost:3306','root','') or die("Connecton error");
  mysql_select_db("users");
  session_start();
  $res= mysql_query("select * from users.details where username='".$_SESSION["username"]."';") or die("Error");
  
  $row = mysql_fetch_array($res);


  if (sizeof($row)==0)
  { 
    //echo "<script>alert('Username Not found'); window.location('index.html');</script>";
  }

  else if($row['password']==$_SESSION['password']) {
      echo 'Connection Succeded';


      if($_SESSION['username']=='admin' | $_SESSION['username']=='Admin' | $_SESSION['username']=='ADMIN' )
       {
			echo "<script>window.location='admin.php'</script>";
	    } else
          echo "<script>window.location='employee/employee.php'</script>";
  }
?>