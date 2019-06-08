<?php
session_start();




if (isset($_POST['Result']))
{
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

else
{
	header('Location:start.php');
}

?>