<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$db = include 'db.php';
include 'vendor/autoload.php';
if(!isset($_SESSION['logged_in']))
{
	header('Location: login.php');
	exit;
}
if(isset($_GET['delete'], $_GET['csrf_token']) && $_GET['csrf_token'] == $_SESSION['csrf_token'])
{
	try
	{
		$query = $db->prepare('DELETE FROM twitter_users WHERE id = ?');
		$query->execute([$_GET['delete']]);
		if(!isset($_GET['ajax']))
		{
			header('Location: admin.php');
			exit;
		}
		else
		{
			echo '<p>OK</p>';
			exit;
		}
	}
	catch(PDOException $e)
	{
		echo '<p>Error : Failed to delete the entry : ' . $e->getMessage() . '</p>';
	}
}
if(isset($_POST['username'], $_POST['description']))
{
	try
	{
		//get profile picture from twitter
		$url = 'https://api.twitter.com/1.1/users/show.json';
		$getField = '?screen_name=' . $_POST['username'];
		$twitter = new TwitterAPIExchange(include 'config.php');
		$json = json_decode($twitter->setGetField($getField)->buildOAuth($url, 'GET')->performRequest());
		$imgLink = str_replace('_normal', '', $json->profile_image_url);

		$query = $db->prepare('INSERT INTO twitter_users (username, description , img_link) VALUES (?, ?, ?)');
		$query->execute([$_POST['username'], $_POST['description'], $imgLink]);
		header('Location: admin.php');
	}
	catch(Exception $e)
	{
		echo '<p>Failed to store the Twitter information : ' . $e->getMessage() . '</p>';
	}
}

include 'utils.php';
include 'header.php';
include 'menu.php';
?>
<h3>New entry</h3>
<form method = "post" class = "basic-grey">
<label>
	<span for = "username">Twitter username : </span>
	<input id = "username" type = "text" name = "username" value = "<?= get($_POST, 'username', '') ?>" />
</label>
<label>
	<span>Description : </span>
	<textarea id = "description" name = "description"><?= get($_POST, 'description', '') ?></textarea>
</label>

<label>
	<span></span>
	<input class = "button" type = "submit" value = "Save" />
</label>
</form>

<table id = "datatable">
<tr>
	<th>Username</th>
	<th>Description</th>
	<th>Remove</th>
</tr>
<?php foreach($db->query('SELECT * FROM twitter_users') as $row): ?>
<tr>
	<td><?= $row->username ?></td>
	<td><p><?= $row->description ?></p></td>
	<td><a class = "delete_link" href = "admin.php?delete=<?= $row->id ?>&csrf_token=<?= $_SESSION['csrf_token'] ?>">Remove</a> <span class = "status"></span></td>
</tr>
<?php endforeach; ?>
</table>

<?php
include 'footer.php';
