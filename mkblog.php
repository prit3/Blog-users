<?php
include ('dbconn.php');
session_start();
error_reporting(0);

$name = $_SESSION['user'];
empty ($_POST["title"]) ? $title = "" : $title = $_POST["title"];
empty ($_POST["blogtext"]) ? $text = "" : $text = $_POST["blogtext"];

$taged = $_POST['taged'];
$mkblog = "INSERT INTO `BlogPosts` (id, Name, Title, Blogtext, tijd) VALUES (NULL, '$name', '$title', '$text', CURRENT_TIMESTAMP)";



if (isset($_POST['submit'])){
	if (!empty($_POST['title']) && $_POST['blogtext'] && $_POST['taged']){
	mysqli_query($conn, $mkblog);
    $last_id = $conn->insert_id;
            
    foreach ($taged as $value) {
    mysqli_query($conn, "INSERT INTO `RelBlogTags` (`id`, `Blog_id`, `Tag_id`) VALUES (NULL, '$last_id', '$value')");
	
    header("location:viewblog.php");
     }
	}
    else{
        echo "Niet alle velden zijn ingevoerd";

        
        echo "<br>";
        echo "<br>";
    }
}
$conn->close();
?>