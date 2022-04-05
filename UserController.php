<?php


if(isset($_POST['func'])){
    if($_POST['func']=="Register"){
        register();
    }
    if($_POST['func']=="Login"){
        login();
    }
    if($_POST['func']=="Articles"){
        createArticles();
    }else{
        header("Location: index.php");
    }
}

function login(){
    require_once "Connection.php";
	$username = $_POST['username'];
	$password = md5($_POST['password']);
    if(!empty($username)&&!empty($password)){
        $query = "select Username, Role from user where Username='$username' and Password='$password'";
        $result = $mysqli->query($query);
        if($result -> num_rows>0){
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['username'] = $row['Username'];
            $_SESSION['role'] = $row['Role'];
            header("Location: index.php");
        }else{
            header("Location: Login.html");
        }
    }else{
        header("Location: Login.html");
    }
}

function register(){
    require_once "Connection.php";
	$username = $_POST['username'];
	$password = md5($_POST['password']);
    if(!empty($username)&&!empty($password)){
        $query = "select Username from user where Username='$username'";
        $result = $mysqli->query($query);
        if($result -> num_rows>0){
            header("Location: Register.html");
        }
        else{
            $queryregister = "INSERT INTO `user`(`ID`, `Username`, `Password`, `Role`) VALUES (null, '$username', '$password', 2)";
            $result = $mysqli->query($queryregister);
            if($result){
                header("Location: index.html");
            }
            else{
                header("Location: Register.html");
            }
        }
    }
    else{
        header("Location: Register.html");
    }
}

function createArticles(){
    require_once "Connection.php";
    $username = $_POST['username'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    if(!empty($username)&&!empty($title)&&!empty($content)){
        $query = "INSERT INTO `articles`(`ID`, `Title`, `Content`, `CreatorUsername`) VALUES (null,'$title','$content','$username')";
        $result = $mysqli->query($query);
        if($result){
            header("Location: myarticles.php");
        }
        else{
            header("Location: myarticles.php");
        }
    }
    else{
        header("Location: myarticles.php");
    }
}
?>