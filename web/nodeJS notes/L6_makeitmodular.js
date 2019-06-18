/*****************************************************************************
* This program demonstrates how to display all files of a specific extention
* type back in the terminal in a modular way.
*****************************************************************************/

// Required node.js module variables:
var path = require('path');
var mymodule = require('./L6_module.js'); // The other file

// Arguement variables:
var dir = process.argv[2];
var ext = process.argv[3];

if (dir = 'this')
	dir = __dirname;

// Set the variable to be called back
var callback = function (error, files) {
    if (error) return console.log("Your thingy broke!", error);
    files.forEach(function display (file) {
        console.log(file);
    })
}

// The variable that requires "./module" is used to execute the program:
mymodule(dir, ext, callback);