
function checkingContact()
{
	if(nameNotEmpty2() == false || nameNotSpecials() == false || ValidEmailAddress2() == false || textAreaNotEmpty() == false)
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



function nameNotEmpty2()
{
	  var x = document.forms["contactForm"]["name"].value;
  if (x == "") {
    alert("Name input is empty");
	
    return false;
				}
}


function nameNotSpecials()
{								  
 if (/^[a-zA-Z0-9]+$/.test(contactForm.name.value))
  {
    return (true)
  }
    alert("Name cannot contain special characters");
	
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



