<!DOCTYPE html>
    
    session_start();

<html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta name="About Me" content="width=device-width, initial-scale=1">
        <title>About Me</title>
        <meta name = "description" content="About Jonathan Carlson">
        <link rel="stylesheet" href="styles/normalize.css">
        <link id="styles" rel="stylesheet" href="/styles/main.css">
    </head>
    
    <body>
        
        <style>
            p {
                color: darkblue;
                font-size: 1.5em;
                text-align: center;
            }
        
        </style>
        
        <p>Hello everyone! I am making a webpage!</p>
        
        <?php
            class Class1 {
                
                public 
                    $variable1,
                    $variable2,
                    $variable3;
                
                // It is possible to overload your methods the same way as C++
                // PHP auto-manages types as if you are using a class template.
                function __construct($a, $b = 0, $c = 0) {
                    $this->variable1 = $a;
                    $this->variable2 = $b;
                    $this->variable3 = $c;
                }
            }
        
            // Notice that the missing parameters will be auto-filled. 
            $myObject1 = new Class1("argument1 ", "argument2 ", "argument3");
            $myObject2 = new Class1("argument", 4);
            $myObject3 = new Class1("argument");
        
            $myObject2->variable3++;
        
            // Call and print your objects:
            echo "<p>$myObject1->variable1 $myObject1->variable2 $myObject1->variable3</p>";
        
            // You can create an array of objects and print them as follow:
            $myArray = array($myObject1, $myObject2, $myObject3);
            
            // Arrays can be easily copied. May be useful for sessions.
            $myArray2 = $myArray;
            $_SESSION = $myArray2;
                
            foreach($_SESSION as $i){
                echo $i->variable1 . " ";
                echo $i->variable2 . " ";
                echo "$i->variable3<br>";
            }
        ?>
        
        
        
    </body>
    
    
    
    
</html>
