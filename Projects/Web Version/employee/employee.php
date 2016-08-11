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
 startTime();
 }
 function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt1').value =
    "Clock: "+ h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
	
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
 </script>

<body onresize=resize() onload=resize()>
<form name="myForm" action="">
  <div id='head' class="div_one" style="width:0px;height:0px;background-color:#660033">
   <h1 style='color:white;margin-left:40%'>Employee Panel</h1>
<?php 

 session_start();
 if(sizeof($_SESSION["username"])==0)
  {
    session_destroy();
    echo "<script>alert('Sorry You are not allowed ');window.location='index.html'</script>";
  }
 echo "<label style='color:white;margin:0% 0% 0% 85%;'>Loged as ".$_SESSION["username"]."</label>";
?>
    <br />
    <a href="logout.php?logout=yes" style='color:white;margin:0% 0% 0% 85%;'>Log out </a>
    
  </div>
 
<table width=100% height="70%" >
<td>
	<table width='10%'>
      <tr>
		<td>
			<input type='button' class='buttonRed'    value='View Notice Board' />
		</td>
		<td>
			<input type='button' class='buttonGreen'   value='View Task History' />
		</td>
		<td>
			<input type='button' class='buttonBlue'   value='Download Task Document' />
		</td>
		<td>
			<input type='button' class='buttonBrownie'   value='Employee Profile' />
		</td>
		<td>
			<input type='button' class='buttonBlueman'   value=Time  id="txt1"/>
		</td>
		<td>
			<input type='button' class='buttonRed'    value='Contact Info' />
		</td>
		<td>
			<input type='button' class='buttonGreen'    value='Check Unavailable ' />
		</td>
		
	</tr>
	<tr>
		<marquee behavior="scroll" direction="Left" color="red" id="scrolltext" font-size=100%>This is Automated Human Resource Monitoring System (AHRMS). All Employees welcome ....... </marquee>
	</tr>
    <table>
</td>
<td>
	<table width=90% height=70% id='container'>
<tr>
	<td>
	<div class="assign_task" id='body1'>
     <h1  style="color:white;text-align:center;font-size:400%;">0</h1>
     <h3  style="color:white;text-align:center;">Incomplete Tasks</h3>
	</div>
  </td>
   
   <td>
	<div class="online" id='body2' >
      <h1  style="color:white;text-align:center;font-size:400%;">0</h1>
      <h3  style="color:white;text-align:center">Online Users</h3>
	</div>
	</td>
</tr>
    
<tr>
	<td>
		<div class="reminders" id='body3'>
		<h1  style="color:white;text-align:center;font-size:400%;">0</h1>
		<h3  style="color:white;text-align:center">Reminders</h3>
   </div>
   </td>

   <td>
   <div class='tasks' id='body4'>
		<h1  style="color:white;text-align:center;font-size:400%;">0</h1>
		<h3  style="color:white;text-align:center">Assigned Tasks</h3>    
   </div> 
   </td>
 </tr>
</table>
</td>

</table>

</form>
</body>


