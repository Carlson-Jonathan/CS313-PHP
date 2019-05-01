<?php

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $major = htmlspecialchars($_POST["major"]);
    $comments = htmlspecialchars($_POST["comments"]);
 
    echo "Your name is " . $name . "<br>";
    echo "mailto: " . $email . "<br>"; 
    echo "You are studying " . $major . "<br>";
    echo "Your additional comments below:<br>" . "'" . $comments . "'<br>";
    echo "Continents you have visited:<br>";

    if(!empty($_POST['Continent'])){
        foreach($_POST['Continent'] as $selected){
            echo $selected."</br>";
        }
    }

?>