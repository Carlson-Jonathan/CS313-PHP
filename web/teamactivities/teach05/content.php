<?php session_start(); ?>

<!DOCTYPE HTML>  
<html>

<head>
</head>

<body>

    <?php
        echo $_SESSION["content"];
        echo "<p>Reference: " . $_SESSION['book'] . " " . $_SESSION['chapter'] . ": " . $_SESSION['verse'] . "</p>";
    ?>

</body>
</html>

