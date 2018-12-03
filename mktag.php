
<form action="mktag.php" method="post">
    <input type="text" name="tag" placeholder="Tag">
    <input type="submit" name="submit" value="Send">
</form>

<?php
include ('dbconn.php');


if (isset($_POST['submit'])){ 
    $tag = $_POST["tag"];
    trim ($tag,"");
    $mktag = "INSERT INTO `Tags` (`id`, `Tag`) VALUES (NULL, '$tag')";
    
    if (!empty($_POST['tag'])){
        mysqli_query($conn, $mktag);
        header("location:viewblog.php");
    }
    else {
        echo "Error input field is empty";
    }
}

       
?>

