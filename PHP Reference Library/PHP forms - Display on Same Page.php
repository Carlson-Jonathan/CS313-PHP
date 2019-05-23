<!DOCTYPE HTML>  
<html>

<head>
</head>

<body>  
       
    <?php
    /*********************************************************************************
    * This is a simple demonstration of how to use a PHP form where the user makes an
    * input that is returned on the same page. Most of the security features have 
    * been stripped to simplify this example. Always remember to use security 
    * functions to prevent XSS attacks.
    *********************************************************************************/

        // Define variables and set to empty values, then set the variables to the
        // post values in each form input when the submit button is clicked.
        $book = $chapter = $verse = $content = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $book =    $_POST["book"];
          $chapter = $_POST["chapter"];
          $verse =   $_POST["verse"];
          $content = $_POST["content"];
        }
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">  
        Book: <input type="text" name="book"><br><br>
        Chapter: <input type="text" name="chapter"><br><br>
        Verse: <input type="text" name="verse"><br><br>
        Content: <textarea name="content" rows="5" cols="40"></textarea><br><br>
        <input type="submit" name="submit" value="Submit"> 
    </form>

    <?php
        echo "<h2>Your Input:</h2>";
        echo $book . "<br>";
        echo $chapter . "<br>";
        echo $verse . "<br>";
        echo $content;
    ?>

</body>
</html>
