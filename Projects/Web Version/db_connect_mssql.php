<?php
 

 $connectionInfo = array("UID" => "shubho@shubhobrataroy", "pwd" => "{shu2MU32}", "Database" => "Windows10Iot", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
 $serverName = "tcp:shubhobrataroy.database.windows.net,1433";
 $conn = sqlsrv_connect($serverName, $connectionInfo) or die("Failed");
 session_start();
 $query="select * from Windows10Iot.dbo.users where username='".$_SESSION['username']."'";
 
 $res = sqlsrv_query($conn,$query);

  if ( $res === false)
            { echo  serialize(sqlsrv_errors()) ; die("error"); }
 $row = sqlsrv_fetch_array($res);
 
 if (sizeof($row)==0)
  { 
    //echo "<script>alert('Username Not found'); window.location('index.html');</script>";
  }

  else if($row['password']==$_SESSION['password']) 
  {
  echo 'Connection Succeded';
  
  
  
  if($_SESSION['username']=='admin' | $_SESSION['username']=='Admin' | $_SESSION['username']=='ADMIN' )
  {
  echo "<script>window.location='admin.php'</script>";
  }
  }
  else 
    //echo "<script>alert('Username Not found/ Invalid Password. Please Try again'); window.location='index.html';</script>";

 ?>