/*
 function resize()
 {
 document.getElementById("head").style.width=window.innerWidth*0.98;
 document.getElementById("head").style.height=window.innerHeight/4;


 }*/

var refresh=function()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readyState==4)
        {
            $('#pendingNumbers').html(xhttp.response);
        }
        else document.getElementById('loading2').style.visibility='visible';
    }

    xhttp.open("GET",'ajax.php?q=&username=&pending=true',true);
    xhttp.send();

}

setInterval(refresh,3000);


var refreshTask=function () {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readyState==4)
        {
            $('#assignedNumbers').html(xhttp.response);
        }
        else document.getElementById('loading2').style.visibility='visible';
    }

    xhttp.open("GET",'ajax.php?q=assignedNumber&username=&pending=',true);
    xhttp.send();
}
setInterval(refreshTask,3000);


var refreshNotice=function () {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readyState==4)
        {
            $('#noticeNumbers').html(xhttp.response);
        }
    }

    xhttp.open("GET",'ajax.php?q=noticeNumbers&username=&pending=',true);
    xhttp.send();
}
setInterval(refreshNotice,3000);


function runAjaxcommand(q,username,pending,accept,reject,password)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readyState==4)
        {
            $('#pendingNumbers').html(xhttp.response);
        }
        else document.getElementById('loading2').style.visibility='visible';
    }
    var command='ajax.php?q='+q+'&username='+username+'&pending='+pending+'&accept='+accept+'&reject='+reject+'&password='+password;
    xhttp.open("GET",command,true);
    xhttp.send();
}


function runAjaxcommand(q,username,pending,accept,reject,password,notice,empType,empName)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readyState==4)
        {
            $('#pendingNumbers').html(xhttp.response);
        }
        else document.getElementById('loading2').style.visibility='visible';
    }
    var command='ajax.php?q='+q+'&username='+username+'&pending='+pending+'&accept='+accept+'&reject='+reject+'&password='+password+'&notice='+notice+'&empType='+empType+'&empName='+empName+'&task=';

    xhttp.open("GET",command,true);
    xhttp.send();
}


function runAjaxcommand(q,username,pending,accept,reject,password,notice,empType,empName,task)
{

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readyState==4)
        {
            $('#pendingNumbers').html(xhttp.response);
        }
        else document.getElementById('loading2').style.visibility='visible';
    }
    var command='ajax.php?q='+q+'&username='+username+'&pending='+pending+'&accept='+accept+'&reject='+reject+'&password='+password+'&notice='+notice+'&empType='+empType+'&empName='+empName+'&task='+task;

    xhttp.open("GET",command,true);
    xhttp.send();
}


function runAjaxcommand(q,username,pending,accept,reject,password,notice,empType,empName,task,startdate,enddate)
{

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readyState==4)
        {
            $('#pendingNumbers').html(xhttp.response);
        }
        else document.getElementById('loading2').style.visibility='visible';
    }
    var command='ajax.php?q='+q+'&username='+username+'&pending='+pending+'&accept='+accept+'&reject='+reject+'&password='+password+'&notice='+notice+'&empType='+empType+'&empName='+empName+'&task='+task+'&startdate='+startdate+'&enddate='+enddate;

    xhttp.open("GET",command,true);
    xhttp.send();
}


function runAjaxcommand2(query,param1,loadResultOn, ResultContainer)
{
    if(loadResultOn!='')
    $(loadResultOn).modal('show');

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readyState==4)
        {
            $(ResultContainer).html(xhttp.response);
        }

    }


    var command='ajax.php?q='+query+'&param1='+param1;

    xhttp.open("GET",command,true);
    xhttp.send();
}

function runAjaxcommand3(query,param1,param2, ResultContainer)
{

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readyState==4)
        {
            $(ResultContainer).html(xhttp.response);
            document.getElementById('loading4').style.visibility='hidden';
        }
        else
            document.getElementById('loading4').style.visibility='visible';

    }


    var command='ajax.php?q='+query+'&param1='+param1+'&param2='+param2;

    xhttp.open("GET",command,true);
    xhttp.send();
}



$(document).ready(function() {
    $('#body').click(function () {
        $('#pendingReq').modal('show');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange= function () {
            if(xhttp.readyState==4)
            {
                $('#pendingContainer').html(xhttp.response);
            }
            else document.getElementById('loading2').style.visibility='visible';
        }

        xhttp.open("GET",'ajax.php?q=&username=&pending=info',true);
        xhttp.send();

    });
});


$(document).ready(function() {
    $('#manageAcc').click(function () {
        $('#managePopup').modal('show');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange= function () {
            if(xhttp.readyState==4)
            {
                $('#manageContainer').html(xhttp.response);
            }
            else document.getElementById('loading2').style.visibility='visible';
        }

        xhttp.open("GET",'ajax.php?q=manage&username=&pending=info',true);
        xhttp.send();

    });
});




$(document).ready(function() {
    $('#body4').click(function () {
        $('#assignedTask').modal('show');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange= function () {
            if(xhttp.readyState==4)
            {
                $('#assignedTaskContainer').html(xhttp.response);
            }
            else document.getElementById('loading2').style.visibility='visible';
        }

        xhttp.open("GET",'ajax.php?q=assignedTaskDetail&username=&pending=',true);
        xhttp.send();

    });
});

$(document).ready(function() {
    $('#body3').click(function () {
        $('#noticeNumbersPopup').modal('show');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange= function () {
            if(xhttp.readyState==4)
            {
                $('#noticeContainer').html(xhttp.response);
            }

        }

        xhttp.open("GET",'ajax.php?q=noticeDetails&username=&pending=',true);
        xhttp.send();

    });
});


$(document).ready(function() {
    $('#attendenceReport').click(function () {
        $('#attendencePopup').modal('show');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange= function () {
            if(xhttp.readyState==4)
            {
                $('#attendenceContainer').html(xhttp.response);
            }

        }

        xhttp.open("GET",'ajax.php?q=attendenceReport&username=&pending=',true);
        xhttp.send();

    });
});

$(document).ready(function() {
    $('#performanceReport').click(function () {
        $('#performancePopup').modal('show');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange= function () {
            if(xhttp.readyState==4)
            {
                $('#performanceContainer').html(xhttp.response);
            }

        }

        xhttp.open("GET",'ajax.php?q=performanceReport&username=&pending=',true);
        xhttp.send();

    });
});


function accept(username,password)
    {
        runAjaxcommand('','','',username,'',password);
        alert("User "+username+" has been accepted successfully");
    }

function reject(username)
{
    runAjaxcommand('','','','',username,'');
    alert("User "+username+" has been rejected successfully");
}


function postNotice()
{

    var notice = document.getElementById('notice').value;
    var username = document.getElementById('username_notice').value;
    var empType= document.getElementById('noticeTo').value;


    if(notice!='' ) {
        if(username=='') username='All';

        runAjaxcommand('', '', '', '', '', '', notice, empType, username);
    }


    else
    alert('Fill all fields please');
}


function postTask()
{

    var task = document.getElementById('task').value;
    var username = document.getElementById('username_task').value;
    var startdate = document.getElementById('startdate').value;
    var enddate = document.getElementById('enddate').value;



    if(task!='' && enddate!='') {
        if(username=='') username='All';
        alert('Your request will be processed soon');
        runAjaxcommand('', '', '', '', '', '', '', '', username,task,startdate,enddate);
    }

    else
        alert('Fill all fields please');
}



function rmv (username)
{

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readyState==4)
        {
            $('#pendingNumbers').html(xhttp.response);

            alert("User "+username+" has been deleted successfully");

        }
    }

    xhttp.open("get",'ajax.php?q=delete&username='+username+'&pending=',true);
    xhttp.send();
    //alert('ajax.php?q=delete&username='+username+'&pending=');

}

function retrive(str,suggestor,loading) {
    if(str=='') {document.getElementById(suggestor).innerHTML='No Suggestion';document.getElementById(loading).style.visibility='hidden'; return; }
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if(xhttp.readyState!=4){ document.getElementById(loading).style.visibility='visible';}

        else{
            document.getElementById(loading).style.visibility='hidden';
            document.getElementById(suggestor).innerHTML= xhttp.responseText;
        }
    }
    xhttp.open("GET",'ajax.php?q='+str,true);
    xhttp.send();
}

function modify (username)
{
    //alert('Hello');
 runAjaxcommand2('modify',username,'#modifyPopup','#modifyContainer');

}


function updateComplete(value,id)
{

    runAjaxcommand3('updateDate',value,id,'#modifyMessage')
}

