<?php
session_start();
include ('dbconn.php');
 $id = $_GET["id"];
$post = "SELECT * FROM BlogPosts where id = $id";

      $result = $conn->query($post);
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    
//                    $tagid = $row['Tag_id'];
                    echo '<div class=blog>';
                        echo '<p class="content">';
                        echo $row['Title'];
                        echo "<table>";
                            echo "<tr>";
                                echo "<td>"."Tijd:"."</td>";
                                echo "<td>".$row['tijd']."</td>";
                            echo "</tr>";

                            echo "<tr>";
                                echo "<td>"."Name: "."</td>";
                                echo "<td>".$row['Name']."</td>";
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