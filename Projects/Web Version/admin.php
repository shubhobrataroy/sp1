<link rel="stylesheet" type="text/css" href="style.css" >

<script>

 function resize()
 {
 document.getElementById("head").style.width=window.innerWidth*0.98;
 document.getElementById("head").style.height=window.innerHeight/4;
//  document.getElementById("body").style.width=window.innerWidth/2.05;
//  document.getElementById("body").style.height=window.innerHeight/3;
//  document.getElementById("body2").style.width=window.innerWidth/2.05;
//  document.getElementById("body2").style.height=window.innerHeight/3;
//  document.getElementById("body3").style.width=window.innerWidth/2.05;
//  document.getElementById("body3").style.height=window.innerHeight/3;
//  document.getElementById("body4").style.width=window.innerWidth/2.05;
//  document.getElementById("body4").style.height=window.innerHeight/3;
//  document.getElementById("body5").style.width=window.innerWidth/2.05;
//  document.getElementById("body5").style.height=window.innerHeight/2;
 document.getElementById("container").style.width=window.innerWidth*.98;
 document.getElementById("container").style.height=window.innerHeight*0.8;
 
 }
 </script>

<body onresize=resize() onload=resize()>
<form name="myForm" action="">
  <div id='head' class="div_one" style="width:0px;height:0px;background-color:#2D2E2F">
   <h1 style='color:white;margin-left:40%'>Admin Panel</h1>
<?php 

 session_start();
 if(sizeof($_SESSION["username"])==0)
  {
    session_destroy();
    echo "<script>alert('Sorry You are not allowed ');window.location='index.html'</script>";
  }
 echo "<label style='color:white;margin:0% 0% 0% 85%;'>Looged as ".$_SESSION["username"]."</label>";
?>
    <br />
    <a href="logout.php?logout=yes" style='color:white;margin:0% 0% 0% 85%;'>Log out </a>
    
  </div>
 
<table width=100% height=70% id='container'  ><tr><td>
  <div class='pending' id='body' >
     <h1  style="color:white;text-align:center;font-size:400%;">0</h1>
     <h3  style="color:white;text-align:center">Pending Requests</h3>
  </div></td>
   
   <td><div class="online" id='body2' >
      <h1  style="color:white;text-align:center;font-size:400%;">0</h1>
      <h3  style="color:white;text-align:center">Online Users</h3>
   </div></td></tr>
    
   <tr><td>
   <div class="reminders" id='body3' >
      <h1  style="color:white;text-align:center;font-size:400%;">0</h1>
      <h3  style="color:white;text-align:center">Reminders</h3>
   </div></td>

   <td>
   <div class='tasks' id='body4'>
    <h1  style="color:white;text-align:center;font-size:400%;">0</h1>
      <h3  style="color:white;text-align:center">Assigned Tasks</h3>    
   </div> </td>
   </tr>
  </table>
   <div class='leftPanel' id='body5'>
    <br />
    <table width='100%'>
      <tr><td><input type='button' class='buttonRed'    value='Post a notice' /></td></tr>
      <tr><td><input type='button' class='buttonBlue'   value='Assign A Task' /></td></tr>
      <tr><td><input type='button' class='buttonBlack'  value='Add/Change/Delete Users' /></td></tr>
      <tr><td><input type='button' class='buttonGreen'  value='Employee Performance Report' /></td></tr>
    <table>
   </div>
</form>
</body>


