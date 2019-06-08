<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>

<title>Logged in</title>

<meta charset="utf-8" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="styling.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


</head>

<body>
<script src="checkInsert.js"></script>

<div class="wholePage1">

	<h1 class="title"> <a id="titles" href="start.php">Hemppa's Foodcellar</a></h1>
	
		<?php
	if(isset($_SESSION['globalName']))
		
	{
		$var = $_SESSION['globalName'];
		echo '
    <div class="aboutColumn">
    <div class="columnG">
	<div class="centering">
	<strong>
    You are logged in as '.$var.'
    </strong>
	</div>
    </div>
    </div>
		<form name="logOut" action="logOut.php" class="unusedClass" method="POST"> 
		<input type="submit" name ="Result" class="logOutButton" value="Logout" />
	</form>
	<br><br><br>
    ';
	echo nl2br ("\n");
	}
	
	else
	{
			echo '
    <div class="aboutColumn">
    <div class="columnR">
	<div class="centering">
	<strong>
    You are not logged in
    </strong>
	</div>
    </div>
    </div>
	
		<a href="logIn.php">
			<button class="logOutButton">Log in</button>
		</a> 
	<br>
    ';
	echo nl2br ("\n");
	}
	?>
	
<div class="wholePage2">

<div class="list">
		<a href="about.php">About</a>
		<a href="instructions.php">Instructions</a>
		<a href="whoIsHemppa.php">Who is Hemppa?</a>
		<a href="createUser.php">Create user</a>
		
		
		<a href="contact.php">Contact</a>
		<a href="documentation.php">Documentation</a>
</div>	
	<br>
		
		



<?php

if (isset($_SESSION['globalName']))
{	
	

echo '	<div class="aboutColumn">
		<div class="column1">
		<form name="saveMeal" action="mealInsertForm.php" onsubmit="return NoneIsEmpty()"  class="createUserForm" method="POST">
		Pet name:<br>
		<input type="text" id="inputText" name="petName" value="" placeholder="e.g. Hemuli"/>
		<br>
  
		Meal:<br>
		<input type="text" id="inputText" name="petMeal" value="" placeholder="e.g. MincedMeat"/>
		<br>
		
		
		Date:<br>
		<input type="text" id="inputText" name="mealDate" value="" placeholder="e.g. yyyy-mm-dd"/>
		<br>
		
		
		Time:<br>
		<input type="text" id="inputText" name="mealTime" value="" placeholder="e.g. 12.50"/>
		<br><br>
		
		<input type="submit" name ="Result" class="nappi" id="btns" value="Save" />
		
		</form>
		</div>
		</div>
		
		<form name="backForm" action="loggedPage.php" method=POST">
		<input type="submit" name ="Result" class="nappi" id="backButton" value="Back" />
		</form>
		';
		
		
			
		
}

else
{
	header('Location:start.php');
}

?>


	<footer>
	&copyHemppaCompany
	<br><br>
	<strong>See Us also at:</strong>
	<br>
	<a href="https://www.facebook.com" i class="fab fa-facebook fa-2x"></i></a>
	<a href="https://wwww.instagram.com" i class="fab fa-instagram fa-2x"></i></a>
	<a href="https://www.twitter.com" i class="fab fa-twitter fa-2x"></i></a>
	</footer>
</div>	
</div>
</body>	
	
</html>
