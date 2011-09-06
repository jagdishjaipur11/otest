/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function validateform()
{
    var a=document.forms["addtest"]["tid"].value;
	if(a==null||a=="")
	{
		alert("Enter the Test Code!");
		return false;
	}

        var b=document.forms["addtest"]["tname"].value;
	if(b==null||b=="")
	{
		alert("Enter the test name!");
		return false;
	}


}

