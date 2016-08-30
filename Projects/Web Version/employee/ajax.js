$(document).ready(function() {
    $('#body2').click(function () {
        $('#viewnotice').modal('show');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange= function () {
            if(xhttp.readyState==4)
            {
                $('#noticecontainer').html(xhttp.response);
            }
            
        }
	
        xhttp.open("GET",'ajax.php?q=&username=&notice=show&profile=',true);
        xhttp.send();

    });
});


$(document).ready(function() {
	$('#notice').click(function () {
        $('#viewnotice').modal('show');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange= function () {
            if(xhttp.readyState==4)
            {
                $('#noticecontainer').html(xhttp.response);
            }
            
        }
        xhttp.open("GET",'ajax.php?q=&username=&notice=show&profile=',true);
        xhttp.send();
	e.preventDefault(); 
    });
});

var refresh=function()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readyState==4)
        {
            $('#noticenumber').html(xhttp.response);
        }
        
    }

    xhttp.open("GET",'ajax.php?q=&username=&notice=pending&profile=',true);
    xhttp.send();

}
setInterval(refresh,2000);

var refresh_task=function()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readyState==4)
        {
            $('#tasknumber').html(xhttp.response);
        }
        
    }

    xhttp.open("GET",'ajax.php?q=&username=&notice=&profile=tasknumber',true);
    xhttp.send();

}
setInterval(refresh_task,2000);

var refresh_incompletetask=function()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readyState==4)
        {
            $('#incompletetxt').html(xhttp.response);
        }
        
    }

    xhttp.open("GET",'ajax.php?q=&username=&notice=&profile=incomplete',true);
    xhttp.send();

}
setInterval(refresh_incompletetask,2000);


$(document).ready(function() {
   $('#profilebtn').click(function () {
        $('#viewprofile').modal('toggle');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange= function () {
            if(xhttp.readyState==4)
            {
                $('#profilecontainer').html(xhttp.response);
            }
            
        }
        xhttp.open("GET",'ajax.php?q=&username=&notice=&profile=show',true);
        xhttp.send();
		
    });
});

$(document).ready(function() {
    $('#body4').click(function () {
        $('#viewassignedtask').modal('show');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange= function () {
            if(xhttp.readyState==4)
            {
                $('#assigntask').html(xhttp.response);
            }
            
        }
	
        xhttp.open("GET",'ajax.php?q=&username=&notice=&profile=taskwork',true);
        xhttp.send();

    });
});

$(document).ready(function() {
    $('#taskhistorybtn').click(function () {
        $('#viewassignedtask').modal('show');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange= function () {
            if(xhttp.readyState==4)
            {
                $('#assigntask').html(xhttp.response);
            }
            
        }
	
        xhttp.open("GET",'ajax.php?q=&username=&notice=&profile=taskwork',true);
        xhttp.send();

    });
});

$(document).ready(function() {
    $('#body').click(function () {
        $('#viewassignedtask').modal('show');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange= function () {
            if(xhttp.readyState==4)
            {
                $('#assigntask').html(xhttp.response);
            }
            
        }
	
        xhttp.open("GET",'ajax.php?q=&username=&notice=&profile=taskwork2',true);
        xhttp.send();

    });
});

$(document).ready(function() {
    $('#body3').click(function () {
        $('#attendances').modal('show');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange= function () {
            if(xhttp.readyState==4)
            {
                $('#attendcontainer').html(xhttp.response);
            }
            
        }
	
        xhttp.open("GET",'ajax.php?q=&username=&notice=&profile=present',true);
        xhttp.send();

    });
});

$(document).ready(function() {
    $('#at').click(function () {
        var xhttp = new XMLHttpRequest();
        if(xhttp.readyState==4)
        {
            $('#attendcontainer').html(xhttp.response);
        }
        xhttp.open("GET",'ajax.php?q=&username=&notice=&profile=attend',true);
        xhttp.send();

    });
});


function acceptTask(id)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readyState==4)
        {
            $('#attendcontainer').html(xhttp.response);
        }
    }


    var command='ajax.php?q=accept&accept='+id;

    xhttp.open("GET",command,true);
    xhttp.send();
}


function completeTask(id)
{
    alert('Your request will be processed soon');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readyState==4)
        {
            $('#attendcontainer').html(xhttp.response);
        }
    }


    var command='ajax.php?q=complete&accept='+id;

    xhttp.open("GET",command,true);
    xhttp.send();
}
