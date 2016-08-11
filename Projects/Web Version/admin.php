<link rel="stylesheet" type="text/css" href="style.css" >
<link rel="stylesheet" href="employee/css/bootstrap.min.css">
<script src="employee/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width">
<script>
/*
 function resize()
 {
 document.getElementById("head").style.width=window.innerWidth*0.98;
 document.getElementById("head").style.height=window.innerHeight/4;


 }*/
 </script>

<body onresize=resize() onload=resize() >
<form name="myForm" action="">
    <div class="row">
        <div id='head' class="col-sm-12" style="background-color:#2D2E2F">
            <h1 style='color:white;text-align:center;font-size: 200%;'>Admin Panel</h1>
                    <?php

                     session_start();
                     if(sizeof($_SESSION["username"])==0)
                      {
                        session_destroy();
                        echo "<script>alert('Sorry You are not allowed ');window.location='index.html'</script>";
                      }
                     echo "<label style='color:white;margin:0% 0% 0% 85%;'><h5>Looged as ".$_SESSION["username"]."</h5></label>";
                    ?>
                <br />
            <a href="logout.php?logout=yes" style='color:white;margin:0% 0% 0% 85%;'>Log out </a>
       </div>


    <table width=75% height=70% id='container' style="float: left">

        <tr><td>
      <div class='pending' id='body' >
         <h1  style="color:white;text-align:center;">0</h1>
         <h4  style="color:white;text-align:center">Pending Requests</h4>
      </div></td>

       <td><div class="online" id='body2' >
          <h1  style="color:white;text-align:center; ">0</h1>
          <h4  style="color:white;text-align:center">Online Users</h4>
       </div></td></tr>

       <tr><td>
       <div class="reminders" id='body3' >
          <h1  style="color:white;text-align:center;">0</h1>
          <h4  style="color:white;text-align:center">Reminders</h4>
       </div></td>

       <td>
       <div class='tasks' id='body4'>
            <h1  style="color:white;text-align:center;">0</h1>
          <h4  style="color:white;text-align:center">Assigned Tasks</h4>
       </div> </td>
       </tr>
      </table>

        <table width='24%' border="4" bordercolor="white" style="float: right">

          <tr><td><input type='button' class='buttonRed btn-block'    value='Post a notice' /></td></tr>
          <tr><td><input type='button' class='buttonBlue btn-block'   value='Assign A Task' /></td></tr>
          <tr><td><input type='button' class='buttonBlack btn-block'  value='Add/Change/Delete Users' /></td></tr>
          <tr><td><input type='button' class='buttonGreen btn-block'  value='Employee Performance Report' /></td></tr>
        </table>

    </div>
</form>
</body>


