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
	
        xhttp.open("GET",'ajax.php?q=&username=&notice=show',true);
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
        xhttp.open("GET",'ajax.php?q=&username=&notice=show',true);
        xhttp.send();

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

    xhttp.open("GET",'ajax.php?q=&username=&notice=pending',true);
    xhttp.send();

}

setInterval(refresh,3000);