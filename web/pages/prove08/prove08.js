/******************************************************************************
* CS313 - Ponder 08 - Local Node.js Server
* Author:
*	Jonathan Carlson
* Description:
*	This assignment demonstrates how to create a basic local server using 
*   Node.js module functions. When 3 different urls are entered in the  
*   browser's address bar, "/home", "getData", or anything else, a different 
*   result will generate for each. 
******************************************************************************/

// Node.js module variables:
var http = require('http');
var fs = require('fs');
 
var port = 8888;
 
// Create the server
function createServer(callback) {
	http.createServer(function (request, response) {
		callback(request, response)
	}).listen(port, function () {
		// Confirm server is running:
		console.log('Server listening on http://localhost:%s', port)
	})
}

// Callback function to be invoked:
function onRequest(request, response) {
	// Confirm requests are being received:
	console.log("Request received!");

		// Display homepage data:
		if(request.url == "/home") {
			response.writeHead(200, {'Content-Type' : 'text/html'})
			response.write('\
				<!DOCTYPE html>\
				<html>\
					<head></head>\
					<body>\
						<h1 style="text-align: center; color: green">\
							Welcome to the home page!\
						</h1>\
					</body>\
				</html>');
		}

		// Display a json string:
		else if(request.url == "/getData") {
			response.writeHead(200, {'Content-Type' : 'text/json'})
			response.write('"name":"Jonathan Carlson", "Class":"CS313", "Skills":"Awesome"');
		} 

		// Display a 404 error:
		else {
			response.writeHead(404, {'Content-Type' : 'text/html'})
			response.write('<div style="text-align: center; color: red; font-size: 48;">\
				<h1>404 ERROR!</h1><h1>PAGE NOT FOUND!!!</h1><h1>The end has come!</h1></div>');
		}

	  	response.end();
}

// Execute program:
createServer(onRequest);
