<?php
session_start();
unset($_SESSION['userId']);
unset($_SESSION['userUid']);
unset($_SESSION['globalName']);

header('Location: start.php');
?>