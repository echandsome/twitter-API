<div id = "menu">
	<a href = "index.php">Home</a> -
	<a href = "admin.php">Administration</a>
	<?php if(isset($_SESSION['logged_in'])): ?>
	 - <a href = "passchange.php">Change Credentials</a>
	 - <a href = "logout.php?csrf_token=<?= $_SESSION['csrf_token'] ?>">Logout</a>
	<?php endif; ?>
</div>
