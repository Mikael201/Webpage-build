<?php
session_start();

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
<script src="checkLog.js"></script>

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

<?php


if(!empty($_POST["name"]))
  {  
  $var = trim($_POST["name"]); 
  }
  
  else
  {
	$var = "";  
  }

if(isset($_POST['Result']) && $var=="dokkari19")
{
	echo'<br>
	<div class="aboutColumn">
		<div class="column1">
			<strong>Sivuston ominaisuudet: </strong><br>
			0. Sivuston idea: Käyttäjä voi luoda tunnuksen, kirjautua omalle sivulle ja listata lemmikkien syötyjä aterioita <br>
			1.Käytetty: HTML (Rakenne), CSS (Layout), JavaScript (Sisäänkirjauteena inputFieldien validointi), PHP (BackEnd & FormValidation)<br>
			2. Käyttäjätunnuksen luonti<br>
			3. Käyttäjätunnustenteko "spämmäyksen" estäminen kysymällä käyttäjätunnuksen luonnin yhteydessä, että mitä kirjaimia näet kuvassa <br>
			4. Kirjautuminen (session_start()) <br>
			5. Lisäys, poisto ja tulostus tietokannasta<br>
			6. Käyttäjätunnuksen poisto<br>
			7. Taulun luonti käyttäjätunnuksen tehneelle<br>
			8. Sivujen suojaus (jotka pitäisi näkyä vain kirjautuneille käyttäjille) globaaleilla muuttujilla ja isset(nappula) komennoilla<br>
			9. Jokaisen InputFieldin suojaus prepared statementeilla, Server puolen PHP Form validointi kun ei olla kirjautuneena sekä lisäksi JavaScriptin form validointi käytetty inputFieldeille kun ollaan kirjautuneena<br>
			10. Salasanan tallennus tietokantaan suojatusti "password_hash($password, PASSWORD_DEFAULT)" avulla: esim: $2y$10$PxOhXNm9GYZbNt0NxVo...<br>
			11. Responsiivisuutta sivulle esimerkkikomennolla "@media only screen and (max-width:800px)" jne<br>
			
			<strong>Aikaa mennyt:</strong><br>
			n. 100h (HTML 20%, CSS 30%, JS 10%, PHP 40%)<br>
			
			<strong>Hankalin vastaantullut asia:</strong><br>
			Miten saada käyttäjälle luotua oma taulu, johon tallentaa henkilökohtaisia tietoja. Miten jatkossa kirjautua tälle kyseiselle taululle. Miten suojata kirjautumiseen vaadittavia sivuja niin ettei niille pääse osoitepalkin avulla<br>
			
			<strong>Ratkaisu:</strong><br>
			Session_start(), globaalit muuttujat, SQL lauseissa käytetään käyttäjän omaa käyttäjänimeä jonka mukaan taulu on tehty (prepared statementtien jälkeen), isset komento<br>
			
			
			
		</div>
	</div>	
	';
}

elseif (!(isset($_POST['name'])))
{
	echo '<br>
		<div class="aboutColumn">
			<div class="column1">
				No access here without knowing the password
			</div>
	</div>	
	';
}


else
{
			echo '<br>
		<div class="aboutColumn">
			<div class="column1">
				Wrong password
			</div>
	</div>	
	';
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


