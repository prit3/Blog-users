<?php
include ('dbconn.php');

	$id = $_GET['id'];
	$delblog = "DELETE FROM `BlogPosts` WHERE `BlogPosts`.`id` = $id";
    
    $delcom = "DELETE FROM comments WHERE id = $id";

if (isset($_GET['id']) && is_numeric($_GET['id'])){

	mysqli_query($conn,$delcom);
	header("Location: {$_SERVER["HTTP_REFERER"]}");
	
}else{
	header("location:viewblog.php");
	return;

}

$conn->close();
?>