<!--BLOG-POST-WITH-COMMENTS-->
<?php
session_start();
include ('dbconn.php');
error_reporting(0);
$id = $_GET["id"];
$name = $_SESSION['user'];
$choice = $_POST['now'];
empty ($_POST["comment"]) ? $comment = "" : $comment = $_POST["comment"];


switch ($choice){
    case "youseeme":
        $hidden = $name;
        break;
    case "youdont":
        $hidden = 1;
        break;
    default:
        $hidden = $name;
}


if (isset($_POST['submit'])){
	if (!empty($_POST['comment'])){
        $pc = "INSERT INTO `comments` (`id`, `blogid`, `userid`, `hiddenid`, `comment`, `time`) VALUES (NULL, '$id', '$hidden', '$name','$comment', CURRENT_TIME())";
        
        mysqli_query($conn, $pc);
    }   
}
//pc = post comment    


?>



<!DOCTYPE HTML>

<html>
<head>
<style>
        <style>
            header {
                position: sticky;
                top:0;
                background-color:gray;
                max-width:100vw;
                height:100px;
                padding:10px;
            }
            body {
                margin:0;
            }
            
            .blogtxt {
                    border: 1px solid black;
                    border-style: dashed dashed ridge dashed;
                    width: 250px;
                    padding: 5px;
                    overflow: hidden;
                    max-height: 40px;
                    white-space: pre-line;
                    word-break: break-all;
                    text-overflow: ellipsis;
            }
            
            .blogtxt:hover {
                overflow: visible;
                max-height: none;}
            .sign {
                margin-right: 20px;
                float: right;
            }
            .left{float: left;}
            
            .divbody {
                padding-top:10px; 
                padding-left:10px;
            }
         
</style>
    
</head>
<body>
 <header>
    <a href="blogform.php"><button>create</button></a>
    <a href="viewblog.php"><button>view</button></a>
    <a href="showtags.php"><button>viewtags</button></a>
    <a href="profile.php"><button>profile</button></a>
    <?php

        if ($_SESSION['user'] == 0 || $_SESSION['user'] == 1){
            echo "<a href='login.php'><button class='sign'>login</button></a>";
        }
        else {
            echo "<a href='logout.php'><button class='sign'>logout</button></a>";
        }

    ?>
    </header> 
<?php 
 
$post = "SELECT * FROM BlogPosts where id = $id";

  $result = $conn->query($post);
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                //bon= blog owner name    
                $bon = $row['Name'];
//                $tagid = $row['Tag_id'];
                echo '<div class=blog>';
                    echo '<p class="content">';
                    echo $row['Title'];
                    echo "<table>";
                        echo "<tr>";
                            echo "<td>"."Time:"."</td>";
                            echo "<td>".$row['tijd']."</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>"."Name: "."</td>";
                            echo "<td>".$bon."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>"."Tag:"."</td>";

                        echo "</tr>";
                    echo "</table>";
                    echo "<br>";

                    echo "</p>";
                    echo "<p class='blogtxt'>";
                        echo $row['Blogtext'];
                    echo "</p>";
                    if ($_SESSION['user'] == $row['Name']){
                        echo '<a href="editblog.php?id='.$row['id'].'">edit</a>',"&nbsp";
                        echo '<a href="rmblog.php?id='.$row['id'].'">delete</a>';
                    }
            }
        }

?>
<br>
<br>
<br>
<form method="post">
    <textarea  cols='40' rows='6' name="comment" placeholder="comment section"></textarea>
    <br>
    <select name="now">
    <option value="youseeme">use my username</option>
    <option value="youdont">make me anonymous</option>
    </select>
    <input type="submit" name="submit" value="place comment">
</form>
    
    
<?php 
 
$comm = "SELECT * FROM comments where blogid = $id";

  $result = $conn->query($comm);
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){

//                
                echo '<div class=comment>';
                    echo '<p class="content">';
                    echo $row['userid'];
                    echo "<br>";
                    
                    
                    echo "Time: ";
                    echo $row['time'];

                    echo "<p class='blogtxt'>";
                        echo $row['comment'];
                    echo "</p>";
                
                    if($name == $row['hiddenid'] || $name == $bon){
                        
                        echo '<a href="rmcomment.php?id='.$row['id'].'">delete</a>';
                    }
                    
                   
            
            }
        }
?>




</body>
</html>