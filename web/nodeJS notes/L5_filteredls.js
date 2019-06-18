/*****************************************************************************
* This program demonstrates how to display all files of a specific extention
* type back in the terminal. 
*****************************************************************************/

// Set up required files from module
var fs = require('fs');
var path = require('path');
 
// Arguement variables: 
var folder = process.argv[2];
var ext = '.' + process.argv[3];

// Retrieves the current working directory:
if (folder = 'this')
	folder = __dirname; 

// Call the module function invoking an anonymous function 
fs.readdir(folder, function (error, files) {
  if (error) return console.log("Your thingy broke!", error, "<--Now fix it!!!");
  
  files.forEach(function(file) {
     if (ext == '.all')
         console.log(file);
     else	
     	if (path.extname(file) === ext) 
        	 console.log(file);
  })
})
