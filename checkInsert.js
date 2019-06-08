function NoneIsEmpty()
{
  
	if(nameNotEmpty() == false || nameNotSpecials() == false || mealNotEmpty() == false || mealNotSpecials() == false ||  dateNotEmpty() == false || dateNotSpecials() == false || dateIsValid() == false || timeNotEmpty() == false || timeNotSpecials() == false )
		{
			return false;
		}

	else
		{
			return true;
		}
  
}


function nameNotEmpty()
{
	var y = document.forms["saveMeal"]["petName"].value;
	
	if(y=="")
	{
		alert("Insert pet's name");
		return false;
	}
}


function nameNotSpecials()
{						
 if (/^[a-zA-Z0-9!@#\$%\^\&*\)\(+=._-]+$/g.test(saveMeal.petName.value))
  {
    return (true)
  }
    alert("Special characters in name are prohibited!")
	
    return false;
}



function mealNotEmpty()
{
	var y = document.forms["saveMeal"]["petMeal"].value;
	
	if(y=="")
	{
		alert("Insert pet's meal");
		return false;
	}
}


function mealNotSpecials()
{						
 if (/^[a-zA-Z0-9!@#\$%\^\&*\)\(+=._-]+$/g.test(saveMeal.petMeal.value))
  {
    return (true)
  }
    alert("Special characters in meal are prohibited!")
	
    return false;
}


function dateNotEmpty()
{
	var y = document.forms["saveMeal"]["mealDate"].value;
	
	if(y=="")
	{
		alert("Insert the date for the meal");
		return false;
	}
}


function dateNotSpecials()
{						
 if (/^[a-zA-Z0-9!@#\$%\^\&*\)\(+=._-]+$/g.test(saveMeal.mealDate.value))
  {
    return (true)
  }
    alert("Special characters in date are prohibited!")
	
    return false;
}

function dateIsValid()
{
  if ( /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/.test(saveMeal.mealDate.value))
  {
    return (true)
  }
    alert("See the example in the input box on how to insert the date")
	
    return false;
}


function timeNotEmpty()
{
	var y = document.forms["saveMeal"]["mealTime"].value;
	
	if(y=="")
	{
		alert("Insert meal time");
		return false;
	}
}

function timeNotSpecials()
{						
 if (/^[a-zA-Z0-9!@#\$%\^\&*\)\(+=._-]+$/g.test(saveMeal.mealTime.value))
  {
    return (true)
  }
    alert("Special characters in time are prohibited!")
	
    return false;
}
