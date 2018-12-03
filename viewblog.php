<html>
    <head>
        <style>
            .blogtxt{
                    border:1px solid black;
                    border-style: dashed dashed ridge dashed;
                    width:250px;
                    padding:5px;
                    overflow:hidden;
                    max-height: 40px;
                    white-space: pre-line;
                    word-break: break-all;
                    text-overflow:ellipsis;}
            .blogtxt:hover{
                overflow: visible;
                max-height: none;}
        
        </style>
    </head>
    <body style="margin:0;">
        <header style="position: fixed; background-color:gray; width:100%; padding:10px;">
            <a href="blogform.php"><button>create</button></a>
            <a href="viewblog.php"><button>view</button></a>
            <a href="showtags.php"><button>viewtags</button></a>
            <form action="viewblog.php" method="get">
                <select name="sorteer">
                    <option>Sorteer op</option>

                    <option value="postDESC">Posts van Nieuw naar oud</option>
                    <option value="postASC">Posts van oud naar nieuw</option>

                    <option value="tijdDESC">Tijd van Nieuw naar oud</option>
                    <option value="tijdASC">Tijd van oud naar nieuw</option>

                    <option value="titleASC">Title van A naar Z</option>
                    <option value="titleDESC">Title van Z naar A</option>

                    <option value="naamASC">Naam van A naar Z</option>
                    <option value="naamDESC">Naam van Z naar A</option>
                    <option value="tuin">filter op tuin</option>
                </select>
                <input type="submit" name="update" value="Update">
            </form>
        </header>
        <div style="padding-top:110px; padding-left:10px;">
            <?php

            include ('dbconn.php');

            error_reporting(0);


            $sort = $_GET["sorteer"];
            
            switch ($sort){
                case "postDESC":
                    $post = "SELECT * FROM BlogPosts ORDER BY BlogPosts.id DESC";
                     echo "Blog is gesorteert op nieuwste post";
                    break;
                case "postASC":
                    $post = "SELECT * FROM BlogPosts ORDER BY BlogPosts.id ASC";
                     echo "Blog is gesorteert op oudste post";
                    break;

                case "tijdDESC":
                    $post = "SELECT * FROM BlogPosts ORDER BY tijd DESC";
                     echo "Blog is gesorteert op nieuwste tijd";
                    break;

                case "tijdASC":
                    $post = "SELECT * FROM BlogPosts ORDER BY tijd ASC";
                     echo "Blog is gesorteert op oudste tijd";
                    break;

                case "titleDESC":
                    $post = "SELECT * FROM BlogPosts ORDER BY Title DESC";
                     echo "Blog is gesorteert op title van Z naar A";
                    break;

                case "titleASC":
                    $post = "SELECT * FROM BlogPosts ORDER BY Title ASC";
                    echo "Blog is gesorteert op title van A naar Z";
                    break;

                case "naamDESC":
                    $post = "SELECT * FROM BlogPosts ORDER BY Name DESC";
                    echo "Blog is gesorteert op Naam van Z naar A";
                    break;

                case "naamASC":
                    $post = "SELECT * FROM BlogPosts ORDER BY Name ASC";
                    echo "Blog is gesorteert op Naam van A naar Z";
                    break;

                case "tuin";
                    $post = "SELECT * FROM RelBlogTags Where Tag_id = 13";
                    echo "Blog is gefilterd op tuin";
                    break;


                default:
                    $post = "SELECT * FROM BlogPosts";
                    echo "Blog is gesorteert op nieuwste post";
            }
            
//            $post = "SELECT * FROM BlogPosts INNER JOIN Tags on BlogPosts.Tag_id = Tags.id";
                    
            $result = $conn->query($post);
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    
                    $tagid = $row['Tag_id'];
                    echo '<div class=blog>';
                        echo '<p class="content">';
                            echo "<table>";
                                echo "<tr>";
                                    echo "<td>"."Tijd:"."</td>";
                                    echo "<td>".$row['tijd']."</td>"."<br>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>"."Name: "."</td>";
                                    echo "<td>".$row['Name']."</td>"."<br>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>"."Title:"."</td>";
                                    echo "<td>".$row['Title']."</td>"."<br>";
                                echo "</tr>";
                    
                                echo "<tr>";
                                    echo "<td>"."Tag:"."</td>";
                                    echo "<td>".$row['Tag']."</td>"."<br>";
                                echo "</tr>";
                            echo "</table>";
                            echo "<br>";
                            
                        echo "</p>";
                        echo "<p class='blogtxt'>";
                            echo $row['Blogtext'];
                        echo "</p>";
                        
                        echo '<a href="editblog.php?id='.$row['id'].'">edit</a>',"&nbsp";
                        echo '<a href="rmblog.php?id='.$row['id'].'">delete</a>';
                    echo "</div>";
                        }
                    }

                    else {
                        echo "<br>Er zijn geen comments";
                    }

            
            



            $conn->close();
            ?>
        </div>
    </body>
</html>



