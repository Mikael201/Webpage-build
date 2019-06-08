<?php
session_start();
?>


<!DOCTYPE HTML>
<html>
<head>

<title>Delete</title>

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
	<br>


<?php

if(isset($_SESSION["globalName"]))
{
	
	
	$username = $_SESSION['globalName'];
	
		
		$servername = "localhost";
		$username1 = "root";
		$password ="";
		$dbname = "loginsystem";


		$conn = new mysqli($servername, $username1, $password, $dbname);
		
		$theId = $_POST["idRow"];
		
		
		$sql = "DELETE FROM $username WHERE id=?";
		
		
		
		$sql = $conn->prepare("DELETE FROM $username WHERE id=?");

		$sql -> bind_param("i", $theId);
		
		$sql->execute();
		
		if(mysqli_affected_rows($conn) >0 ) {
			echo '
			
				<div class="aboutColumn">
								<div class="column1">
									<strong>Meal deleted succesfully!</strong>
								</div>
							</div>	
							
			';
			
			echo'
					<form name="printForm" action="loggedPage.php" class="unusedClass" method="POST"> 
						<input type="submit" name ="Result" class="nappi" id="backButton" value="Back" />
					</form>
			';
												
						 
						 
		}
		else {
			echo '
			
				<div class="aboutColumn">
								<div class="column1">
									<strong>No meal found with such ID</strong>
								</div>
							</div>
			';
			
			echo'
					<form name="printForm" action="loggedPage.php" class="unusedClass" method="POST"> 
						<input type="submit" name ="Result" class="nappi" id="backButton" value="Back" />
					</form>
			';
			
						 
		}
		
		//header('Location:loggedPage.php');
/*
		if(($sql->execute()))
			{
					
						 echo '
							<div class="aboutColumn">
								<div class="column1">
									Meal deleted succesfully!
								</div>
							</div>	
												
						 ';
						 
						 
						 
			}

		else
			{		
					echo '
							<div class="aboutColumn">
								<div class="column1">
									No such meal found in the database. Try printing out the meals again and check the ID again.
								</div>
							</div>	
													
						';
			}

*/


		/*
			$stmt = mysqli_stmt_init($conn);
				
								if(!mysqli_stmt_prepare($stmt, $sql))
									{
										exit();
									}
			
								else
									{
								
					
										
										mysqli_stmt_bind_param($stmt, "i", $theId);
										
										
										
										mysqli_stmt_execute($stmt);
										mysqli_stmt_store_result($stmt);
										$count = mysqli_stmt_num_rows($stmt);
										
										
												echo '
														<div class="aboutColumn">
															<div class="column1">
																Meal deleted succesfully!
															</div>
														</div>	
												
														';
													header('Location:delete.php');	
										
										
										/*else
										{
												echo '
												<div class="aboutColumn">
													<div class="column1">
														No such meal found in the database. Try printing out the meals again and check the ID again.
													</div>
												</div>	
													
											 ';
											 
											 
											 
											
										}*/
										
										
										
									
										
										
								//	}	
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

