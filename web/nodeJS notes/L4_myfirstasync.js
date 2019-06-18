/*****************************************************************************
* This is an example of how to use Node.js with asyncronous code. This is 
* essentiall the same program as "myfirstio.js" but using asyncronous code.
* 	See: https://github.com/maxogden/art-of-node#callbacks
* 	for more information on asyncronous code.
*
* Hilights:
*	-Asyncronous code does not read top to bottom like normal code.
*	-
*
* fs.readFile line:
*	The 2nd parameter must be a function (yea, I know, it is weird). This 
* 	does not have to be a defined function, but you can define it inside the
* 	parameter (yea, even weirder). Since you are doing this, the function
*	technically does not need to be named (weirdest). Leaving the name off 
* 	makes it an "anonymous function", which is fine, but it is generally good
* 	to name it anyway for readability. If there is an error later, it will
*	show the name of the function instead of just "anonymous". 	
*
* error parameter:
*	The error is returned if there is a problem reading your arguement input
*	or the file. In the below example, "error" is basically the variable that
* 	the error string message will be saved to. You can have multiple 
* 	parameters in your console.error() function.
*****************************************************************************/

// Set fs module:
var fs = require('fs');

// Create a callback function:
function readthis(callback) {
	
	// Set your function using the fs module. First parameter should be "error".
	fs.readFile(process.argv[2], function read(error, filecontents) {

		// Set your error message if something goes wrong:
		if (error) return console.error("Something broke:", error, 
			"<-- Go fix this!");
		
		// Set your normal code
		text = filecontents.toString();
		lines = text.split(/\r\n|\r|\n/).length - 1;

		// Invoke your callback:
		callback();
	})
}

// Set your base function. Remember, the order does not matter.
function display() {
    //console.log(text);
    console.log(lines);
}

// Invoke the readthis() function with the 'display' function as the callback:
readthis(display);
