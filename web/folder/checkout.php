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
            <div style='text-align: center'>
                <a href='store.php'><button>Keep Shopping</button></a>
                      <a href='cart.php'><button>Back to Cart</button></a>
            </div>
            
            <h2 style="text-align: center">Enter your personally identifying information that you probably dont want us to have here:</h2>
            <div class="checkout">
                
            <form action="summary.php" method="post"> 
            
            <p>Name:</p>    
            <input type="text" name="name"><br> 
            
            <p>Street Address:</p>  
            <input type="text" name="street"><br> 
            
            <p>City:</p>  
            <input type="text" name="city"><br> 
                
            <p>State:</p>  
            <input type="text" name="state"><br> 
                
            <p>Zip:</p>  
            <input type="text" name="zip"><br> 
            
            <?php 
                echo "<p>Select your method of payment:</p>";
                
                $payment = array("Wampum", "IOUs", "Peanuts", "AOL Stock Certificates", "Something Else Worthless");
                
                foreach($payment as $i)                     
                    echo "<input type='radio' name='payment' value='$i'> $i <br>"; 
            
                echo "<p>Special Delivery Instructions:</p><textarea name='instructions'></textarea><br><br>";
                
                echo "<input type='submit' name='submit' value='Complete Purchase'>";
            ?>
 
        
        </form>  
            </div>
            
        </main>
        
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/modules/footer.php'; ?>
        </footer>
    
    </body>
    
</html>