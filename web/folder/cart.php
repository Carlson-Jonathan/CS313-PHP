<!DOCTYPE html>
<?php
    session_start();
    session_unset();
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
            <?php include 'header.php' ?>
        </header>
    
        <main>
            <?php

                echo "<div style='text-align: center'><a href='store.php'><button>Back to Shopping</button></a>
                      <a href='checkout.php'><button>Checkout</button></a></div>
                     
                      <h2 style='color: black; text-align: center'>Your Shopping Cart Items:</h2>";

                foreach($_POST['inventory'] as $selected) {
                    unset($_SESSION[$selected]);
                }
                
                if(!empty($_POST['inventory'])){
                    foreach($_POST['inventory'] as $selected){
                        $_SESSION[$selected] = htmlspecialchars($selected);
                    }
                }
                else {
                    unset($_SESSION[$_POST['inventory']]);
                }
            
                echo "<div class='row'>
                        <div class='columnleft'>";
                    
                foreach($_SESSION as $i) {
                    echo "<h2>$i</h2>";
                }
            
                echo "</div>";
            
                echo "<div class='columnright'>
                    
                    <h2>Prices comming maybe!</h2>
            
                </div></div>";
            
            ?>   
            
        </main>
        
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/footer.php'; ?>
        </footer>
    
    </body>
    
</html>
    
    
    
    
    
    