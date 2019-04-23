/******************************************************************************
* Author:
*   Jonathan Carlson
* Description:
*   This is the first JavaScript of Teach02. These are some very simple 
*   functions that will probably just be used to refresh students on J.S. who
*   probably havent touched it since CS213.
******************************************************************************/

"use strict"

/******************************************************************************
* clicked()
*   This function generates a text alert when a button on the page is clicked.
******************************************************************************/
function clicked() {
    alert("Clicked!");
}

/******************************************************************************
* changeColor()
*   This function changes the background color of "Div #1" to the color the
*   user specifies in the first input field.
******************************************************************************/
function changeDiv1() {
    var color = document.getElementById("userinputone").value;
    document.getElementById("first").style.backgroundColor = color;
}

/******************************************************************************
* Change Div2 Background color
*   This function changes the background color of "Div #2" to the color the
*   user specifies in the second input field using jQuery.
******************************************************************************/
$(document).ready(function() {
    $("#aButton").click(function() {
        $("#second").css('background-color', $("#userinputtwo").val());
    });
});

/******************************************************************************
* changeOpacity()
*   This function activates a CSS animation which makes the 3rd div fade in 
*   and out in opacity.
******************************************************************************/
function changeOpacity() {
    
    var elem = document.getElementById("third");
    var opacity = 1, increment = -.01;
    var id = setInterval(frame, 25);
    
    function frame() {
    
        if(opacity > 1) 
            increment = -0.01;
        
        if(opacity < 0) 
            increment = 0.01;
                
        opacity += increment;
        elem.style.opacity = opacity;
        document.getElementById("opac").innerHTML = opacity;
    }
}