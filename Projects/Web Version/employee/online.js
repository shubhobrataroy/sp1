
function setStatus(username,status)

{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange= function () {
        if(xhttp.readyState==4)
        {
            $('#pendingContainer').html(xhttp.response);
        }
        else document.getElementById('loading2').style.visibility='visible';
    }

    xhttp.open("GET",'online.php?q=setStatus&username='+username+'&status='+status,true);
    xhttp.send();
}



$(document).ready(
    function () {
       var x= $('#currentUser').html();
        setStatus(x,'online');
    }
);

$(window).bind("beforeunload", function() {
    var x= $('#currentUser').html();
    setStatus(x,'offline');
    return confirm("Do you really want to close?");
})