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

setInterval(refresh,3000);

