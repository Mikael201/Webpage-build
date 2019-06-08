<?php

session_start();

if(isset($_SESSION['globalName']) && (isset($_POST['Result'])))
{
		$username = $_SESSION['globalName'];
	
		$servername = "localhost";
		$username1 = "root";
		$password ="";
		$dbname = "loginsystem";


		$conn = mysqli_connect($servername, $username1, $password, $dbname);
										
										
		$sql = "DELETE FROM users WHERE name=?";
		
		$sql = $conn->prepare("DELETE FROM users WHERE name=?");

		$sql -> bind_param("s", $username);
		
		$sql->execute();
		
		
				$result =$conn->query("DROP TABLE " . $username);
		
				
		
				
		
		
		header('Location:logOut.php');
}		
		
		
else
{
	header("Location:start.php");
}

?>
