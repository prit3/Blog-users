<?php
include ('dbconn.php');

empty ($_POST["user"]) ? $user = "" : $user = $_POST["user"];
empty ($_POST["email"]) ? $email = "" : $email = $_POST["email"];

if (isset($_POST["pass2"])){ $pass = $_POST["pass2"];}

$sign_up = "INSERT INTO `users` (userid, user, email, pass) VALUES (NULL, '$user', '$email', '$pass')";

if (isset($_POST['submit'])){
    
    if ($_POST['pass1'] == $_POST['pass2']){
        if (!empty($_POST['user']) && $_POST['email'] && $_POST['pass2']){
        
        mysqli_query($conn, $sign_up);
        header("location:viewblog.php");
        }
        else {
            echo "Niet alle velden zijn ingevuld";
            echo "<br>";
            echo "<br>";
        }
    }
    else {
        echo "Password zijn niet gelijk";
        echo "<br>";
        echo "<br>";
        
    }
}