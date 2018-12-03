<html>
    <head>
    </head>
    <body>
        <header>
            <a href="blogform.php"><button>create</button></a>
            <a href="viewblog.php"><button>view</button></a>
        </header>
        
        
        <?php

    include ('dbconn.php');

    
$tag = "SELECT * FROM Tags";

    $result = $conn->query($tag);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            
            
            echo $row['Tag'];
            echo "<br>";
            
            
            
            
        }
    }

    else {
        echo "<br>Er zijn geen comments";
    }

   $conn->close();
?>
    </body>
</html>

