
// JavaScript Document

function phonenumber(inputtxt)
{	
  var phoneno = /^\d{10}$/;
  if(inputtxt.value.match(phoneno))
  {
      return true;
  }
  else
  {
     alert("Not a valid Phone Number");
     return false;
	 window.history.back();
  }
  }


//login 
function checklogin(){
	var username,password,typee;
	loginusername=document.getElementById('email').value;
	loginpassword=document.getElementById('password').value;
	typee=document.getElementById('typee').value;
	if(loginusername=="" ||  typee=="" ){
		alert('Please Provide all the information');
		return false;
	}
	if(loginpassword==""){
		alert('Please provide Password');
		return false;
	}
	
	}
//end 


function checkform()
{
	alert('Please Fill Full Form');
var name,pass,pass1,email,phone,adress;
	name=document.getElementById('namee').value;
	email=document.getElementById('email').value;
	pass=document.getElementById('pass').value;
	pass1=document.getElementById('pass1').value;
	phone=document.getElementById('phone').value;
	adress=document.getElementById('address').value;
	if(name=="" || pass=="" || pass1=="" || email=="" || phone=="" || adress=="" ){
		alert('Please Fill Full Form');
		return false;
	}	
 
 
 
 }



//end
function checksub(){
	var email;
	emial=document.getElementById('itemtitle').value;
	if(email==""){
		alert('Please Enter Email Address');
		return false;
	}
	}
	//end function

function formValidate() {
  var fm = document.forms["form1"]["cname"].value;
  var em = document.forms["form1"]["csv"].value;
  
 
  if (fm == "") 
  {
    alert("Card Number must be filled out!");
    return false;
  }
  
  if (em == "") 
  {
    alert("CSV must be filled out!");
    return false;
  }

  
   var phoneno = /^\d{16}$/;
  if(fm.match(phoneno))
  {
      return true;
  }
  else
  {
     alert("Not a valid Card Number");
     return false;
  }
  
  
  
  
  
  
}

//checkout end






//Old start



