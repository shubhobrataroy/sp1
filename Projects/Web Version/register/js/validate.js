function validateRegistration()
   {
     //username
     var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange= function () {
       if(xhttp.readyState==4)
       {
         document.getElementById('loading2').style.visibility='hidden';
         document.getElementById('usernameAlert').innerHTML = xhttp.responseText;
         if(xhttp.responseText=='This username is already taken') return false;
       }
       else document.getElementById('loading2').style.visibility='visible';
     }

     xhttp.open("GET",'ajax.php?q=&username='+document.getElementById('username2').value,true);
     xhttp.send();

     //email
     var email = document.getElementById('email').value;
     if(email=='') {document.getElementById('emailAlert').innerHTML='Email field is empty'; return false;}

     else if (email.indexOf("@")>=email.indexOf(".com")){ document.getElementById('emailAlert').innerHTML='Invalid email format'; return false;}

     else document.getElementById('emailAlert').innerHTML='';

     //password
     if(document.getElementById('password').value!=document.getElementById('confirm').value)
     {document.getElementById('passwordAlert').innerHTML='Passwords do not match'; return false;}

     else
       document.getElementById('passwordAlert').innerHTML='';

     //address
     if(document.getElementById('address').value=='')
     {
       document.getElementById('addressAlert').innerHTML='Address Field is empty';
       return false;
     }
     else document.getElementById('addressAlert').innerHTML='';

     return true;
   }