<?php
session_start();
if(isset($_GET['csrf_token']) && $_GET['csrf_token'] == $_SESSION['csrf_token'])
{
	$_SESSION = [];
	session_destroy();
}
header('Location: index.php');
