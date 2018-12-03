<?php
include ('dbconn.php');

	$id = $_GET['id'];
	$del = "DELETE FROM `BlogPosts` WHERE `BlogPosts`.`id` = $id";

if (isset($_GET['id']) && is_numeric($_GET['id'])){

	mysqli_query($conn,$del);
	header("location:viewblog.php");
	
}else{
	header("location:viewblog.php");
	return;

}

$conn->close();
?>