<?php
session_start();
include ('dbconn.php');
error_reporting(0);
$userid = $_SESSION['user'];
$username = $_GET['id'];

if ($username == 1){
    
    header("location:viewblog.php");
}

$sql = "SELECT * FROM users WHERE userid = $userid";
$result = $conn->query($sql);
if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
        $name = $row['user'];
        $email = $row['email'];
        $check = $row['userid'];
        }
}else {
    echo "error";
}

if (!empty($username)){
    $sql = "SELECT * FROM users WHERE userid = $username";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
            $pn = $row['user'];
            }
    }else {
        echo "<br> this user does not exitst";
    }
}
?>
<!DOCTYPE HTML>
<html>
<head></head>
    
<body>
 <header>
    <a href="blogform.php"><button>create</button></a>
    <a href="viewblog.php"><button>view</button></a>
    <a href="showtags.php"><button>viewtags</button></a>
    <?php

        if ($_SESSION['user'] == 0 || $_SESSION['user'] == 1){
            echo "<a href='login.php'><button class='sign'>login</button></a>";
        }
        else {
            echo "<a href='logout.php'><button class='sign'>logout</button></a>";
        }
     
    ?>
     <a href='rmuser.php'><button>delete acount</button></a>
    </header> 
    
    Welcome <?php echo $name;
    


if ($userid !== $username){
    echo "<br> you are on $pn's Profile page";
}



$username = $_GET['id'];
$post = "SELECT * FROM BlogPosts WHERE Name = $username ORDER BY BlogPosts.id DESC";

$result = $conn->query($post);
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    
                    echo '<div class=blog>';
                        echo '<p class="content">';
                        echo '<a href="BPWC.php?id='.$row['id'].'">';
                        echo $row['Title'];
                        echo "</a>";
                        
                            echo "<table>";
                                echo "<tr>";
                                    echo "<td>"."Time:"."</td>";
                                    echo "<td>".$row['tijd']."</td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>"."Name: "."</td>";
                                    echo "<td>".$row['Name']."</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td>"."Tag:"."</td>";
                                    echo "<td>".$row['Tag']."</td>";
                                echo "</tr>";
                            echo "</table>";
                            echo "<br>";
                        if ($_SESSION['user'] == $row['Name']){
                            echo '<a href="editblog.php?id='.$row['id'].'">edit</a>',"&nbsp";
                            echo '<a href="rmblog.php?id='.$row['id'].'">delete</a>';
                        }
                    echo "</div>";
                        }
                    }

                    else {
                        echo "<br>No blogs entries found";
                    }



if ($userid == $username){
    
    }
?>

</body>
</html>


