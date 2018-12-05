<?php
include ('dbconn.php');

	$id = $_GET['id'];
	$delblog = "DELETE FROM `BlogPosts` WHERE `BlogPosts`.`id` = $id";
    
    $delrel = "DELETE FROM RelBlogTags WHERE Blog_id = $id";

if (isset($_GET['id']) && is_numeric($_GET['id'])){

	mysqli_query($conn,$delrel);
	mysqli_query($conn,$delblog);
	header("location:viewblog.php");
	
}else{
	header("location:viewblog.php");
	return;

}

$conn->close();
?>