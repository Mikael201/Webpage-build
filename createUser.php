<?php
session_start();



if(isset($_POST['Result'])){

  $username=trim($_POST["name"]);
  
  $email=trim($_POST["email"]);
  $password1=trim($_POST["password1"]);
  $password2=trim($_POST["password2"]);

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
  
    elseif($email =="") 
  {
    $errorMsg=  "Enter email.";
	$code = "2";
  }
  
  
  elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
  {
	$errorMsg= "Enter a valid email.";
	$code = "2";
  }
  
  
    elseif($password1 =="") 
  {
    $errorMsg=  "Enter password.";
	$code = "3";
  }
   
    elseif($password2 =="") 
  {
    $errorMsg=  "Enter password again.";
	$code = "3";
  }
  
  elseif($password1 != $password2)
  {
	  $errorMsg = "Passwords need to match.";
	  $code = "3";
  }
  
  


else{
  
  
      
	 
	  
	  include_once $_SERVER['DOCUMENT_ROOT'] . '/WebTeknHarjoitustyo/securimage/securimage.php';

	  $securimage = new Securimage();

	  
		if ($securimage->check($_POST['captcha_code']) == false) 
		{
			
			
			
			$Scode = "The security code was incorrect";
			
		}
  
  
		else
		{
			
		require("connection.php");


	
		$username = $_POST["name"];
		
		$email = $_POST["email"];
		$password = $_POST["password1"];
		
		
		$doubleUsernames = ("SELECT name from users where name=?");
		$stmt = mysqli_stmt_init($conn);
		
		if(!mysqli_stmt_prepare($stmt, $doubleUsernames))
		{
			echo "Error with SQL";
			exit();
		}
		
		else
		{

		
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			
			mysqli_stmt_store_result($stmt);
			$otherUsernames = mysqli_stmt_num_rows($stmt);
			
					if($otherUsernames>0)
						{
				
							echo "<div class='aboutColumn'> <div class='column1'> Username taken!</div></div>";
						}
			
					else
						{
							$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
							$stmt = mysqli_stmt_init($conn);
				
								if(!mysqli_stmt_prepare($stmt, $sql))
									{
										exit();
									}
				
								else
									{
										$hashingPassword = password_hash($password, PASSWORD_DEFAULT);
					
										mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashingPassword);
										mysqli_stmt_execute($stmt);
										
										

										
										
															
										
										
										$servername = "localhost";
										$username1 = "root";
										$password ="";
										$dbname = "loginsystem";


										$conn = mysqli_connect($servername, $username1, $password, $dbname);
										
									
										mysqli_query($conn, "CREATE TABLE $username (
															id int(11) AUTO_INCREMENT PRIMARY KEY,
															name varchar(255),
															meal varchar(255),
															day DATE,
															time DECIMAL(10,2)
																					)");
										echo mysqli_error($conn);
									}
						}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
		
		
			

  
		session_start();
		$_SESSION['helpVariable'] = "aaa";
		
		
		header('Location:catchCreateuser.php');
  
  
		}
  
  
}

}
?>
		
		
<!DOCTYPE HTML>
<html>
<head>


<title>Create user</title>

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
				
				
				elseif(isset($Scode))
				{
				echo'
						<div class="aboutColumn">
						<div class="column1">
						<div class="message"><strong>'
							. $Scode .'</strong>
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
	
	  
<br><br>
Email:<br>
<input name= "email" type= "text" id="inputText" value=" <?php if(isset($email)) {echo $email;} ?>" placeholder="firstname.lastname@student.uva.fi"  <?php if(isset($code) && $code == 2){echo "class=errorMsg" ;} ?> >
<br><br>

Password:<br>
<input name= "password1" type= "password" id="inputText" value="" <?php if(isset($code) && $code == 3){echo "class=errorMsg" ;} ?> >
<br><br>

Password again:<br>
<input name= "password2" type= "password" id="inputText" value="" <?php if(isset($code) && $code == 3){echo "class=errorMsg" ;} ?> >
<br><br>



<img id="captcha" src="/WebTeknHarjoitustyo/securimage/securimage_show.php" alt="CAPTCHA Image" /> <br><br>

Type the text you see above:<br>
<input type="text" name="captcha_code" size="10" maxlength="6" />



<br><br>


<input type= "submit" name= "Result" class="nappi" id="nappulat" value= "Create">

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