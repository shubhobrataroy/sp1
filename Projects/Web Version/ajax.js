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


function accept(username,password)
    {
        runAjaxcommand('','','',username,'',password);
    }

function reject(username)
{
    runAjaxcommand('','','','',username,'');
}


function postNotice()
{

    var notice = document.getElementById('notice').value;
    var username = document.getElementById('username_notice').value;
    var empType= document.getElementById('noticeTo').value;



    if(notice!='') {
        if(username=='') username='All';
        runAjaxcommand('', '', '', '', '', '', notice, empType, username);
    }

    else
    alert('Notice field is empty');
}


function postTask()
{

    var task = document.getElementById('task').value;
    var username = document.getElementById('username_task').value;




    if(task!='') {
        if(username=='') username='All';

        runAjaxcommand('', '', '', '', '', '', '', '', username,task);
    }

    else
        alert('Notice field is empty');
}


function retrive(str,suggestor,loading) {
    if(str=='') {document.getElementById(suggestor).innerHTML='No Suggestion'; return; }
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if(xhttp.readyState!=4) document.getElementById(loading).style.visibility='visible';

        else{
            document.getElementById(loading).style.visibility='hidden';
            document.getElementById(suggestor).innerHTML= xhttp.responseText;
        }
    };
    xhttp.open("GET",'ajax.php?q='+str,true);
    xhttp.send();
}




function rmv (username)
{
    var xhttp = new xmlhttprequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readystate==4)
        {
           alert(xhttp.response);
        }
    }

    xhttp.open("get",'ajax.php?q=delete&username='+username+'&pending=',true);
    xhttp.send();

}