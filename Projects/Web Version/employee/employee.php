<link rel="stylesheet" type="text/css" href="style.css" >
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="ajax.js"></script>
<script src="online.js"></script>
<meta name="viewport" content="width=device-width">

<style>
    h1{
        color:white;
        font-size: 400%;
    }
    h4
    {
        color:white;
        font-size: 100%;
    }

</style>

<?php
	$notice = array("No more games.....");
	session_start();
?>

<script>

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
 

<body onload="startTime()">
	<div class="row">
	<form name="myForm" action="">
		<div id='head' class="col-sm-12" style="background-color:#660033">
			<h1 style='color:white;margin-left:35%'>Employee Panel</h1>
				<?php 
					if(sizeof($_SESSION["username"])==0)
					{
						session_destroy();
						echo "<script>alert('Sorry You are not allowed ');window.location='index.html'</script>";
					}
					echo "<label style='color:white;margin:0% 0% 0% 85%;'>Loged as <span id='currentUser'>".$_SESSION["username"]."</span></label>";
				?>
			<br/>
			<a href="../logout.php?logout=yes" style='color:red;margin:0% 0% 0% 85%;'>Log out </a>
		</div>
 

	 <div class="row btn-block col-md-12 " style="margin: auto;margin-top: 0.3%;">
			<input type='button' class='buttonRed col-md-2'    value='View Notice Board' id="notice" data-toggle="modal" data-target="#viewnotice" />
			<input type='button' class='buttonGreen col-md-2'   value='View Task History' id="notice" data-toggle="modal" data-target="#viewtask" />
			<input type='button' class='buttonBlue col-md-2'   value='Download Task Document' id="notice" data-toggle="modal" data-target="#downloadtask" />
			<input type='button' class='buttonBrownie col-md-2'   value='Employee Profile' id="profilebtn" data-toggle="modal" data-target="#viewprofile" />
			<input type='button' class='buttonBlueman col-md-2'   value=Time  id="txt1" id="notice" />
			<input type='button' class='buttonRed col-md-2'   value="Mark Unavailable" />
			<marquee behavior="scroll" direction="Left" color="red">This is Automated Human Resource Monitoring System (AHRMS). All Employees welcome ....... </marquee>
	</div>
		
	<div class="row col-md-12 col-sm-12 col-xs-12"  style="margin: auto;margin-top: 0.3%;height: 35%">
		<div class="assign_task col-md-6 col-sm-6 col-xs-6" id='body'>
			<h1  class="text-center">0</h1>
			<h4  style="color:white;text-align:center">Incomplete Tasks</h3>
		</div>

		<div class="online col-md-6 col-sm-6 col-xs-6" id='body2'>
			<h1  style="color:white;text-align:center;" id="noticenumber">0</h1>
			<h4  style="color:white;text-align:center;">Notices</h3>
		</div>

		<div class="reminders col-md-6 col-sm-6 col-xs-6" id='body3' >
			<h1  style="color:white;text-align:center;">0</h1>
			<h3  style="color:white;text-align:center">Reminders</h3>
		</div>

		<div class='tasks col-md-6 col-sm-6 col-xs-6' id='body4'>
			<h1  style="color:white;text-align:center;"">0</h1>
			<h4  style="color:white;text-align:center">Assigned Tasks</h4>  
		</div>
	</div>		
    <!--PopUP-->
	<div id="viewnotice" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Notices</h4>
                    </div>
                    <div class="modal-body" id="noticecontainer">
						
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
     </div>
	 <div id="viewtask" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <span></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
     </div>
	 <div id="downloadtask" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
     </div>
	 <div id="viewprofile" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body" id="profilecontainer">
					   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
     </div>
	 

</div>
</form>
</body>


