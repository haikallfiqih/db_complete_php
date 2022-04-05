<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location:Login.html");
	}
?>
<html>
<form method="post" action="UserController.php">
	<input type="text" placeholder="Title" name="title"></input>
	<br>
	<input type="text" placeholder="Content" name="content"></input>
	<br>
	<input type="submit" value="submit"></input>
	<input type="hidden" value="Articles" name="func"></input>
	<input type="hidden" value="<?php echo $_SESSION['username']?>" name="username"></input>
</html>