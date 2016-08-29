function validate()
{
   var username= document.myForm.username.value;
   var password= document.myForm.password.value;
   var x=0;

   if(username==""){document.getElementById("name").innerHTML="This Field is empty"; x=1;}
   
   if(password==""){document.getElementById("password").innerHTML="This Field is empty"; x=1;}


   if(x==1) return false;

   else return true;
}