<link rel="stylesheet" type="text/css" href="style.css" >
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<meta name="viewport" content="width=device-width">
<script src="ajax.js">
</script>
<script src="online.js"></script>


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
        <div id='head' class="col-sm-12" style="background-color:#2D2E2F;" >
            <h1 class="text-center">Admin Panel</h1>
                    <?php

                     session_start();
                     if(sizeof($_SESSION["username"])==0 )
                      {
                        session_destroy();
                        echo "<script>alert('Sorry You are not allowed ');window.location='index.html'</script>";
                      }

                      $user=strtolower($_SESSION["username"]);
                      if($user != 'admin')
                      {
                          session_destroy();
                          echo "<script>alert('Sorry You are not allowed ');window.location='index.html'</script>";
                      }

                    echo "<label style='color:white;margin:0% 0% 0% 85%;'><h5>Looged as <span id='currentUser'>".$_SESSION["username"]."</span></h5></label>";
                    ?>
                <br />
            <a href="logout.php?logout=yes" style='color:white;margin:0% 0% 0% 85%;'>Log out </a>
       </div>

        <!-- Upper Buttons -->
        <div class="row btn-block col-md-12 " style="margin: auto;margin-top: 0.3%;">
            <input type='button' class='buttonViolate  col-md-3 '    value='Post a notice'  data-toggle="modal" data-target="#postNotice"/>

            <input type='button' class='buttonBlack   col-md-3'   value='Assign A Task'     data-toggle="modal" data-target="#assignTask"/>

            <input type='button' class='buttonGreen col-md-3' id="manageAcc"  value='Manage accounts' />
            <input type='button' class='buttonBlue col-md-3'  value='My Account' />
        </div>

        <!-- Metro style tiles -->
      <div class="row col-md-12 col-sm-12 col-xs-12"  style="margin: auto;margin-top: 0.3%;height: 35%">
      <div class='pending col-md-6 col-sm-6 col-xs-6' id='body' >
         <h1 class="text-center" id="pendingNumbers">0</h1>
         <h4  style="color:white;text-align:center">Pending Requests</h4>
      </div>

       <div class="online col-md-6 col-sm-6 col-xs-6" id='body2' >
          <h1  style="color:white;text-align:center; " id="onlineNumber">0</h1>
          <h4  style="color:white;text-align:center">Online Users</h4>
       </div>


       <div class="reminders col-md-6 col-sm-6 col-xs-6" id='body3' >
          <h1  style="color:white;text-align:center;" id="noticeNumbers">0</h1>
          <h4  style="color:white;text-align:center">Notices</h4>
       </div>


       <div class='tasks col-md-6 col-sm-6 col-xs-6' id='body4'>
            <h1  style="color:white;text-align:center;" id="assignedNumbers">0</h1>
          <h4  style="color:white;text-align:center">Assigned Tasks</h4>
       </div>

    <!-- Popup windows -->
   <form name="noticeContainer" >
    </div>
        <div id="postNotice" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        Employee Type <select id="noticeTo" name="noticeTo" class="form-control">
                            <option>All</option>
                            <option>Employee</option>
                            <option>Admin</option>
                        </select>
                        <br />

                        Username:(Optional) <img id="loading" name="loading" src="loading.gif"  height="25" width="25" style="visibility: hidden" /><span id="suggestor"></span>
                        <input type="text" name="username_notice" id="username_notice" class="form-control" placeholder="Post notice for specific employee" onkeyup="retrive(this.value,'suggestor','loading')"/>
                        <br />
                        Notice:
                        <textarea class="form-control" placeholder="Write notice here" name="notice" id="notice"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-lg" data-dismiss="modal" onclick=postNotice()>Post</button>
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
</form>

        <div id="notification" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <a href="#">Server Error</a> <br />
                        <a href="#">Server Error</a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="assignTask" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        Employee Type <select class="form-control">
                            <option>All</option>
                            <option>Employee</option>
                            <option>Admin</option>
                        </select>
                        <br />
                        Username: <img id="loading2" name="loading" src="loading.gif"  height="25" width="25" style="visibility: hidden" /><span id="suggestor2"></span>
                        <input id="username_task" type="text" class="form-control" placeholder="Post notice for specific employee" onkeyup="retrive(this.value,'suggestor2','loading2')"/>
                        <br />
                        Task Desciption:
                        <textarea id="task" class="form-control" placeholder="Write task description here here"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-lg" onclick=postTask()>Post</button>
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="pendingReq" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body" id="pendingContainer">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="assignedTask" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body" id="assignedTaskContainer">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="onlineNumbersPopup" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body" id="onlineContainer">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div id="noticeNumbersPopup" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body" id="noticeContainer">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


<div id="managePopup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body" id="manageContainer">

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


