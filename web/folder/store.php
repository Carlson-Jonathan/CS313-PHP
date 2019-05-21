<!DOCTYPE html>

<?php
    session_start();
?>

<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="Prove03" content="width=device-width, initial-scale=1">
        <title>CS313 Jonathan Carlson</title>
        <meta name = "description" content="Shopping Cart Assignments for Jonathan Carlson.">
        <link rel="stylesheet" href="../../styles/normalize.css">
        <link id="styles" rel="stylesheet" href="../../styles/prove03.css">
        <link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
    </head>
    
    <body>
        
        <header>
            <?php include 'header.php'; ?>

        </header>
    
        <main>
            <iframe width='800' height='450' src='https://www.youtube.com/embed/vxRqPmvGlUY?autoplay=1' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
            <?php
            
                $inventory = array("Love Potion", "Pigmie Puff", "You know Poo",                       "Skiving Snack Boxes", "Nose Bleed Nuget",
                                  "Trick Wand", "Spell Checking Quill", "Reusable Hangman", "Day Dream Charm", "Punching Telescope", "Bruise Remover", "Muggle Magic Tricks", "Edible Dark Marks", "Shield Hat", "Instant Darkness Powder", "Decoy Detinators", "Joke Cauldrons", "Wonder Witch Potion", "10-Second Pimple Vanisher");
            
                $invPrice = array("5", "7", "8", "4", "9", "11", "4", "5", "2", "6", "2", "4", "9", "4", "2", "6", "11", "19", "647");
            
                echo "<form action='cart.php' method='post' class='sub'>";
                    
                echo "<div style='text-align: center'><input type='submit' name='submit' value='Add to Cart'></div>";
                echo "<div class='row'>
                        <div class='columnleft'>
                            <h2 class='left'>Specials:</h2>
                        ";
                
                    foreach($inventory as $i) {
                        echo "<h2 class='columnleft'><input type='checkbox' name='inventory[]' value='$i'>" . $i . "</h2><br>";
                    }
            
                echo "</form>";
            
                echo "</div>
                        <div class='columnright'>
                            <h2 class='left'>Price:</h2>";
                                foreach($invPrice as $i) {
                                    echo "<h2>$i Gallions</h2>";
                                }
                echo "  
                        </div>
                    </div>
                ";
            
            ?>
            
            <img src>
            
            
        </main>
        
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/footer.php'; ?>
        </footer>
    
    </body>
    
</html>