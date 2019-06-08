<?php
session_start();



if(isset($_POST['Result']))
{	

  $username=trim($_POST["name"]);
  $password = trim($_POST["password1"]);

  if($username =="") 
  {
    $errorMsg=  "Enter username.";
	$code = "1";

  }
	
  elseif(!preg_match("/^[a-zA-Z0-9]+$/", $username))
  {
	$errorMsg= 'Special characters are prohobited in Username';
	$code = "1";
  }
  
   else if($password =="") 
  {
    $errorMsg=  "Enter password.";
	$code = "2";

  }
  


  else{
	  
		require('connection.php');
	
	$username = $_POST["name"];
	$password = $_POST["password1"];
	
	
	
	$sql = "SELECT * FROM USERS where name=?";
	$stmt = mysqli_stmt_init($conn);

	
	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		exit();
	}
	
	else
	{
		mysqli_stmt_bind_param($stmt, "s", $username); 
		
		mysqli_stmt_execute($stmt);
		
		$result = mysqli_stmt_get_result($stmt);
		
			if($row = mysqli_fetch_assoc($result))
			{
				$checkingPassword = password_verify($password, $row['password']); 
				
				if($checkingPassword == false)
				{
					session_start();
					$_SESSION['userId'] = $_POST['Result'];
					header('Location:logFail.php');
					exit();
				}
				
				else if($checkingPassword == true)
				{
					session_start();
					$_SESSION['userId'] = $row['idUsers'];
					$_SESSION['userUid'] = $row['idUsers'];
					$_SESSION['globalName'] = $row['name'];
					
					header("Location:loggedPage.php");	 					
					
					exit();
											
				}
				
				else
				{
					echo "Unknown error...";
					exit();
				}
			}
			
			else
			{
				
				header('Location:logFail.php');
				exit();
			}
	}
}
}

?>
		
		
<!DOCTYPE HTML>
<html>
<head>


<title>Log in</title>

<meta charset="utf-8" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="styling.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


</head>

<body>



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
			if (isset($errorMsg))
				{ 
					echo'
						<div class="aboutColumn">
						<div class="column1">
						<div class="message"><strong>'
							. $errorMsg .'</strong>
						</div>
						</div>
						</div>
						<br>
				';} 
		?>
		
		<div class="aboutColumn">
		<div class="column1">
	
<form name= "formi" method= "post" action="">

Username:<br>
	<input name= "name" type= "text" id="inputText" value="<?php if(isset($username)) {echo $username;} ?>" placeholder="Hemuli94" <?php if(isset($code) && $code == 1){echo "class=errorMsg" ;} ?> >
	<br>
<br>
Password:<br>
<input name= "password1" type= "password" id="inputText" value="" <?php if(isset($code) && $code == 3){echo "class=errorMsg" ;} ?> <?php if(isset($code) && $code == 2){echo "class=errorMsg" ;} ?> >
<br><br>

<input type= "submit" name= "Result" class="nappi" id="nappulat" value= "Log in">

</form>
		
		</div>
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