<?php

session_start();

include('config.php');

//Reset the logout
unset($_GET['logout']);

//Fetches username and password variables and generates the encrypted hashes
@$username = $_POST['uname'];
@$password = $_POST['pass'];
//@$password = sha1($password);
//@$password = md5($password);

//Checks and validates password and accepts or displays errors
if($adname == $username && $adpass == $password){
		$_SESSION['loggedin'] = True;
		$_SESSION['username'] = $adname;
		header('Location: index.php');
		echo('Auth successfull.');
	}
else 
{
	$_SESSION['loggedin'] = "";
	echo('<center>There was an error. Probably wrong username/password combination.Please try again!</center>');
	include("login.php");
		
}

?>
