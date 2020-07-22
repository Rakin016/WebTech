<?php 

	session_start();
	include "includes/db_connect.inc.php";
	$id= $_GET['id'];
	$user_id = $_SESSION['user_id'];
	$sqlDeletePost = "delete from forum where id=$id ;";
	mysqli_query($conn, $sqlDeletePost);



?>