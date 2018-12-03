<?php include ('mkblog.php'); ?>


<!DOCTYPE HTML>
<html>
    <head>


    </head>
    <body>


        <header>
            <a href="blogform.php"><button>create</button></a>
            <a href="viewblog.php"><button>view</button></a>
            <a href="mktag.php"><button>add tag</button></a>
            
            
        </header>


        <form action="blogform.php"  method="post">
             Auteurs Naam: 
            <br> 
            <?php echo $naam; ?>
            <br>
            <br>
            Title: 
            <br> 
            <input type="text" name="title" placeholder="Title" value="<?php echo $title; ?>" >
            <br>
            <br>
            Blogtext: 
            <br> 
            <textarea name="blogtext" cols="32" rows="4" placeholder="plaats hier je  blog bericht."><?php echo $text; ?></textarea>
            <br>
            Tags:
            <br>
            <br>
            <?php

                include ('dbconn.php');


                $tag = "SELECT * FROM Tags";

                $result = $conn->query($tag);

                if ($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        $tag = $row['id'];
                        echo "<input type='checkbox' name='taged[]' value='$tag'>";
                        echo $row['Tag'];
                    }
                }

                else {
                    echo "<br>Er zijn geen Tags";
                }

               $conn->close();
            ?> 
            <br>
                <input type="submit" name="submit" value="Send">
            <br>
            <br>
        </form>
    </body>
</html>



