<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include 'utils.php';
include 'lib/password.php';
include 'header.php';
include 'menu.php';
if(isset($_POST['user'], $_POST['pswd']))
{
	$db = include 'db.php';
	$query = $db->prepare('SELECT password FROM users WHERE username = ?');
	$query->execute([$_POST['user']]);
	if($query->rowCount() == 0)
		echo '<p>Invalid username/password combo.</p>';
	else
	{
		$row = $query->fetchObject();
		if(password_verify($_POST['pswd'], $row->password))
		{
			$_SESSION['user'] = $_POST['user'];
			$_SESSION['logged_in'] = true;
			$_SESSION['csrf_token'] = md5(uniqid());
			header('Location: admin.php');
		}
		else
			echo '<p>Invalid username/password combo.</p>';
	}
}
?>
<form method = "post" class = "basic-grey">
<label><span>Username :</span> <input type = "text" name = "user" value = "<?= get($_POST, 'user', '') ?>" /></label>
<p><label><span>Password :</span> <input type = "password" name = "pswd" value = "<?= get($_POST, 'pswd', '') ?>" /></label>
<label><span></span><input class = "button" type = "submit" value = "Login" /></label>
</form>
<?php 
include 'footer.php';
