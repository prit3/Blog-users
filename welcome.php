<?php
session_start();

$name = $_SESSION['user'];

?>



Welcome <?php echo $name; ?>

            <a href="blogform.php"><button>create</button></a>
            <a href="viewblog.php"><button>view</button></a>