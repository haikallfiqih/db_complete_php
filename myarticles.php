<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location:Login.html");
	}


    require_once "Connection.php";
    
    $query = "select * from articles where CreatorUsername = '".$_SESSION['username']."'";
    $result = $mysqli->query($query);
    while($row= $result->fetch_assoc()){
    	echo('<ul>');
    	echo('<li>');
    	echo($row["Title"]);
    	echo('</li>');
    	echo('<li>');
    	echo($row["Content"]);
    	echo('</li>');
    	echo('</ul>');
    }

?>

<html>
<a href="CreateArticles.php"><button>Create Article</button></a>
</html>