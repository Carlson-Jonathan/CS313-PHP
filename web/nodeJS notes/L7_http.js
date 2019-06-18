/*****************************************************************************
* This program demonstrates how to create an http 'get' request and receive
* a response from a URL address. In the callback, a listener awaits a respose
* which, when received, is in the form of an object. Outputting the response
* will display a lot of nonsensical information from the object. Therefore,
* the on response, or "response.on" function is used to detect relevant data
* is received. The 2nd parameter of this function tells it to be immedietly
* displayed to the console. 
*
* The "data" being received is actually in ASCII HEX format, which needs to 
* be translated into chars. This is what the "setEncoding" funciton is for.
*****************************************************************************/

// NodeJS module required:
var http = require('http');

// First parameter is the URL address. Second is the callback:
http.get(process.argv[2], function (response) {
  response.setEncoding('utf8'); 
  response.on('data', console.log);
  response.on('error', console.error);
});
