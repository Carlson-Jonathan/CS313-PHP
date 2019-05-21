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
            <?php include 'header.php' ?>
        </header>
    
        <main>
            <h2 style="text-align: center">Your order has been submitted! </h2><h3>Please allow 6-8 months for your package to be lost and another 6-8 days for your customer service phonecall to be answered. </h3><br>
            <h2>Your order summary:</h2>
            
            <?php
                $name = htmlspecialchars($_POST["name"]);
                $street = htmlspecialchars($_POST["street"]);
                $city = htmlspecialchars($_POST["city"]);
                $state = htmlspecialchars($_POST["state"]);
                $zip = htmlspecialchars($_POST["zip"]);
                $payment = htmlspecialchars($_POST["payment"]);
                $instructions = htmlspecialchars($_POST["instructions"]);
            
                    echo "<h3 class='summary'>Name:</h3><h4>$name</h4><br>";
                    echo "<h3 class='summary'>Mailing Address:</h3><h4>$street<br>
                    $city <br> $state<br> $zip</h4><br>"; 
                    echo "<h3 class='summary'>Payment Method:</h3><h4>$payment</h4><br>";
                    echo "<h3 class='summary'>Delivery Instructions:<br></h3>
                    <h4>$instructions</h4> <br>";

                    echo "<h2>Items Purchased:</h>";
                    foreach($_SESSION as $i) {
                        echo "<h3 class='summary'>$i</h3>";
                    }
            ?>
            <div style='text-align: center'>
                <a href='store.php'><button>Buy More Junk</button></a>
            </div>            
            
        </main>
        
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/footer.php'; ?>
        </footer>
    
    </body>
    
</html>