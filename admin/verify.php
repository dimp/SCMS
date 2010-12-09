<?php

session_start();
include('config.php');

if(!@$_SESSION['loggedin'] == True){
	//header('Location: index.php');
	include("login.php");
	exit;
}

if(isset($_GET['logout'])){
	$_SESSION['loggedin']="";
	unset($_GET['logout']);
	session_destroy();
	header('Location: login.php');
}

?>
