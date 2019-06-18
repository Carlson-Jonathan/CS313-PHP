/*****************************************************************************
* This program reads a text file, counts the number of lines, and returns it.

* Buffer note:
* If you were to output the buffer for the following text text:
* "0123456790    ABCDEFG" the output would be: 
* <Buffer 30 31 32 33 34 35 36 37 38 39 20 20 20 20 41 42 43 44 45 46 47 0a>
* This is basically the hexidecimal ASCII values of each character. The "0a"
* value represents a line break. This is how it counts lines. The function
* ".toString()" converts it from the ASCII into characters.
*****************************************************************************/

// Set fs module:
var fs = require('fs');

// Read file and set it to a buffer variable:
var buf = fs.readFileSync(process.argv[2]); 

// Convert buffer to string. This converts the ASCII into characters.
var str = buf.toString();

// Count number of lines (there are several ways to do this):
var lines = str.split(/\r\n|\r|\n/).length - 1;

// Display file content and number of lines:
//console.log(str);
console.log(lines);
//console.log(buf);
