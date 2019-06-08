<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>

<title>Start</title>

<meta charset="utf-8" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="styling.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body>
<script src="functions.js"></script>

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
	<br><br>
					<form name="backTo" action="loggedPage.php" class="unusedClass" method="POST"> 
		<input type="submit" name ="Result" class="logOutButton" value="Own page" />
	</form>
	<br>
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
	<br><br><br>
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



	
<div class="aboutColumn">
<h2 class="column1">The Journey for efficient tracking starts here!</h2>	
</div>




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


