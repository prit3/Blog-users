<?php
include ('dbconn.php');
session_start();
    


if (isset($_POST['login'])){
    $Buser = $_POST['user'];
    $pass = $_POST['pass'];
    $login = "SELECT userid FROM users WHERE user = '$Buser' AND pass = '$pass'";
  
    
    $result = $conn->query($login);
    
    //fetch user
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            // Als rows gelijk is aan 1 voer dan de functie uit.
            $count = mysqli_num_rows($result);
            
            if($count == 1) {
                $userid = $row['userid'];
                $_SESSION['user'] = $userid;
                header("location:welcome.php");
            }
            else {
             $error = "Your Login Name or Password is invalid";
            }
        }
    }
}
$conn->close();
?>


<form method="post" action="login.php">

Username:
<br>
<input type="text" name="user" placeholder="Username">
<br>
<br>
Password:
<br>
<input type="password" name="pass" placeholder="Password">
<br>
<br>
<input type="submit" name="login" value="login"> <a href="sign-up.php">Not a Member yet Sign-up Here</a>
</form>