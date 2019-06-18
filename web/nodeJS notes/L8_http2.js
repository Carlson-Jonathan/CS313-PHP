/*****************************************************************************
* This is the same as L7 but it gathers all the data content of the response
* organizes it into a single string, and displays it back.
*****************************************************************************/

// NodeJS module required:
var http = require('http');
var url = process.argv[2].toString();
var content = "";

// First parameter is the URL address. Second is the callback:
http.get(url, function callback(response) {
	response.setEncoding('utf8'); 
  
  	response.on('data', function datacallback(data) {
  		content = content + data;
	})

	response.on('end', function endcallback() {
  		console.log(content.length);
  		console.log(content);
	})
});

