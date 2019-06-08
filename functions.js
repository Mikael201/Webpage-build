
function NoneIsEmpty()
{
  
	if(nameNotEmpty() == false || nameNotSpecials() == false || checkGender() == false || ValidEmailAddress() == false  || checkPassword() == false)
		{
			return false;
		}

	else
		{
			return true;
		}
  
}






function checkingContact()
{
	if(nameNotEmpty2() == false || ValidEmailAddress2() == false || textAreaNotEmpty() == false)
		{
			return false;
		}

	else
		{
			return true;
		}
}


function textAreaNotEmpty()
{
	var y = document.forms["contactForm"]["customerComment"].value;
	
	if(y=="")
	{
		alert("Insert comment to send");
		return false;
	}
}



function nameNotEmpty()
{
	  var x = document.forms["formi"]["name"].value;
  if (x == "") 
  {
    alert("Username cannot be empty");
	
    return false;
  }
  
  else
  {
	  return true;
  }
}


function nameNotSpecials()
{								  
 if (/^[a-zA-Z0-9]+$/.test(formi.name.value))
  {
    return (true)
  }
    alert("Username cannot contain special characters");
	
    return false;
}


function nameNotEmpty2()
{
	  var x = document.forms["contactForm"]["name"].value;
  if (x == "") {
    alert("Name input is empty");
	
    return false;
				}
}





function checkGender()
{
	if((document.getElementById('genderMale').checked) || (document.getElementById('genderWomen').checked))
	{
		return (true)
	}
	
	else
	{
		alert("Gender input is empty");
		
		return false;
		
	}
}




function ValidEmailAddress()
{								  
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(formi.email.value))
  {
    return (true)
  }
    alert("You have entered an invalid email address!");
	
    return false;
}



function ValidEmailAddress2()
{								  
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(contactForm.email.value))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
	
    return false;
}




function checkPassword() 
{
	var pass1 = formi.password1.value;
	var pass2 = formi.password2.value;
	
	
	var passReal = pass1.localeCompare(pass2);
	
 if ((/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/.test(formi.password1.value)) && (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/.test(formi.password2.value)) && (passReal==0))
  {
	return true;
  }
    
else
  {	
	alert("Password needs to contain atleast one digit, lower case, upper case, the length should be atleast 8 characters and the passwords need to match.")
	
    return false;
  }
}




