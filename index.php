<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location:Login.html");
	}
?>
<html>
<textarea> Halo </textarea>
</html>