/* 
 * Redirects the Page to the redirectpage.php page after clicking the button with name "Cone adding questions" on the addques.php p         age
 */

function redirect(){

    window.location = './redirectpage.php';
}

function validateform(){

    var q=document.forms["addques"]["ques"].value;
	if(q==null||q=="")
	{
		alert("Enter the question in the Question Field!");
		return false;
	}

        var op1=document.forms["addques"]["op1"].value;
        var op2=document.forms["addques"]["op2"].value;
        var op3=document.forms["addques"]["op3"].value;
        var op4=document.forms["addques"]["op4"].value;

        if (op1){
            if(op2){
                return true;
            }
            else {
                alert("Please Enter the Option 2");
                return false;
            }
        }
        if (op3){
            if(op4){
                return true;
            }
            else {
                alert("Please Enter the Option 4");
                return false;
            }
        }
        if (op1 && op2 && op3){
            if(op4){
                return true;
            }
            else {
                alert("Please Enter the Option 4");
                return false;
            }
        }


}
