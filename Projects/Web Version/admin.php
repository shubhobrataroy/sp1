<link rel="stylesheet" type="text/css" href="style.css" >
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<meta name="viewport" content="width=device-width">
<script>
/*
 function resize()
 {
 document.getElementById("head").style.width=window.innerWidth*0.98;
 document.getElementById("head").style.height=window.innerHeight/4;


 }*/
 </script>


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

<body  >
<form name="myForm" action="">
    <div class="row">
        <div id='head' class="col-sm-12" style="background-color:#2D2E2F">
            <h1 class="text-center">Admin Panel</h1>
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

        <div class="row btn-block col-md-12 " style="margin: auto;margin-top: 0.3%;">
            <input type='button' class='buttonViolate  col-md-2 '    value='Post a notice'  data-toggle="modal" data-target="#postNotice"/>
            <input type='button' class='buttonBlue  col-md-2'  value='Notifications' />
            <input type='button' class='buttonBlack   col-md-2'   value='Assign A Task' />
            <input type='button' class='buttonRed col-md-2'  value='Employee Performance Report' />
            <input type='button' class='buttonGreen col-md-2'  value='Manage accounts' />
            <input type='button' class='buttonBlue col-md-2'  value='My Account' />
        </div>


      <div class="row col-md-12 col-sm-12 col-xs-12"  style="margin: auto;margin-top: 0.3%;height: 35%">
      <div class='pending col-md-6 col-sm-6 col-xs-6' id='body' >
         <h1 class="text-center" >0</h1>
         <h4  style="color:white;text-align:center">Pending Requests</h4>
      </div>

       <div class="online col-md-6 col-sm-6 col-xs-6" id='body2' >
          <h1  style="color:white;text-align:center; ">0</h1>
          <h4  style="color:white;text-align:center">Online Users</h4>
       </div>


       <div class="reminders col-md-6 col-sm-6 col-xs-6" id='body3' >
          <h1  style="color:white;text-align:center;">0</h1>
          <h4  style="color:white;text-align:center">Reminders</h4>
       </div>


       <div class='tasks col-md-6 col-sm-6 col-xs-6' id='body4'>
            <h1  style="color:white;text-align:center;">0</h1>
          <h4  style="color:white;text-align:center">Assigned Tasks</h4>
       </div>

    </div>
        <div id="postNotice" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <textarea placeholder="Your Notice" id="noticeText" style="width: 100%"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-lg">Post</button>
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</form>
</body>


