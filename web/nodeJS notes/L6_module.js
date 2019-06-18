/*****************************************************************************
* The module files associated with "L6_makeitmodular.js"
*****************************************************************************/

// Required node.js module variables:
var fs = require('fs');
var path = require('path');

// Invoked by the "mymodule()" function from the previous file.
// Tells the module what function is to be returned.
module.exports = function (folder, ext, callback) {
    
    fs.readdir(folder, function (error, files) {
        if (error) return callback("Fix your code! -->", error);
        
        // It 'true' is returned, the file gets displayed
        files = files.filter(function (file) {
            
            if(ext == 'all') // returns true for everything
            	return true;
            
            if(path.extname(file) === '.' + ext) 
            	return true;
        })
        
        return callback(null, files);
    })
}