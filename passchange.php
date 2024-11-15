<?php
session_start();
if(!isset($_SESSION['logged_in']))
{
	header('Location: login.php');
	exit;
}

error_reporting(E_ALL);
ini_set('display_errors', 'On');
include 'utils.php';
include 'lib/password.php';
include 'header.php';
include 'menu.php';
if(isset($_POST['user'], $_POST['pswd']))
{
	$db = include 'db.php';
	try
	{
		$pswd = password_hash($_POST['pswd'], PASSWORD_DEFAULT);
		$query = $db->prepare('UPDATE users SET username = ?, password = ? WHERE username = ?');
		$query->execute([$_POST['user'], $pswd, $_SESSION['user']]);
		$_SESSION['user'] = $_POST['user'];
		echo '<p>Credentials updated successfully !</p>';
	}
	catch(PDOException $e)
	{
		echo '<p>Failed to update credentials : ' . $e->getMessage() . '</p>';
	}
}
?>
<form method = "post" class = "basic-grey">
<label><span>Username :</span> <input type = "text" name = "user" value = "<?= get($_POST, 'user', $_SESSION['user']) ?>" /></label>
<p><label><span>Password :</span> <input type = "password" name = "pswd" value = "<?= get($_POST, 'pswd', '') ?>" /></label>
<label><span></span><input class = "button" type = "submit" value = "Save" /></label>
</form>
<?php 
include 'footer.php';
