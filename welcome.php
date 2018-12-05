<?php
session_start();
include ('dbconn.php');
$user = $_SESSION['user'];

$sql = "SELECT * FROM users WHERE userid = $user";
$result = $conn->query($sql);
if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
        $name = $row['user'];
        }
}else {
    echo "error";
}

?>



Welcome <?php echo $name; ?>



            <a href="blogform.php"><button>create</button></a>
            <a href="viewblog.php"><button>view</button></a>