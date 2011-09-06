//Created By: Ankit Bahuguna

function validateform()
{
        var ci=document.forms["registrationform"]["collegeid"].value;
	if(ci==null||ci=="")
	{
		alert("Enter your College ID!");
		return false;
	}
        var x=document.forms["registrationform"]["uname"].value;
	if(x==null||x=="")
	{
		alert("Enter your Name!");
		return false;
	}
			
	var reg = /^[a-zA-Z]+([_\.-]?[a-zA-Z0-9]+)*@[a-zA-Z0-9]+([\.-]?[a-zA-Z0-9]+)*(\.[a-zA-Z]{2,4})+$/;
	var y = document.forms["registrationform"]["email"].value;
	if(reg.test(y) == false) {
		alert('Invalid Email Address');
		return false;
		}
			
	var z=document.forms["registrationform"]["fname"].value;
	if(z==null||z=="")
	{
		alert("Enter your Full Name!");
		return false;
	}
        var celreg = /[0-9]{10}/;
	var cn=document.forms["registrationform"]["cellnum"].value;
        if(celreg.test(cn) == false) {
		alert('Please provide a 10 digit Cell Number');
		return false;
        }
        if(cn==null||cn=="")
	{
		alert("Enter your Cell Number!");
		return false;
	}


        var ps=document.forms["registrationform"]["password"].value;
	if(ps==null||ps=="")
	{
		alert("Enter your Password!");
		return false;
	}

        var rps=document.forms["registrationform"]["reppassword"].value;
	if(rps==null||rps=="")
	{
		alert("Enter your Password!");
		return false;
	}

}
		
