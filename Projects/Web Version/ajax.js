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


function accept(username,password)
    {
        runAjaxcommand('','','',username,'',password);
    }

function reject(username)
{
    runAjaxcommand('','','','',username,'');
}