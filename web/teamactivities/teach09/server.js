var express = require("express");
var app = express();
var port = 5000 || process.env.PORT; // Arbitrary number. Make it whatever you want.

app.set("views", "views");
app.set("view engine", "ejs");

app.listen(port, function() {
	// This message will display only in the console:
	console.log("The server is running on port: " + port);
});

app.use(express.static("public"));

app.get("/math", function(request, response) {
	var num1 = request.query["operand1"];
	var num2 = request.query["operand2"];;
	var operator = request.query["operator"];

	var solution;
	switch(operator) {
		case "+":
			solution = Number(num1) + Number(num2);
			break;
		case "-":
			solution = Number(num1) - Number(num2);
			break;
		case "*":
			solution = Number(num1) * Number(num2);
			break;
		case "/":
			solution = Number(num1) / Number(num2);
			break;
	}

	var parameters = {sol: solution};
	response.render("domath", parameters);
	response.end();
});

app.get("/math_service", function(request, response) {
	var num1 = request.query["operand1"];
	var num2 = request.query["operand2"];;
	var operator = request.query["operator"];

	var solution;
	switch(operator) {
		case "+":
			solution = Number(num1) + Number(num2);
			break;
		case "-":
			solution = Number(num1) - Number(num2);
			break;
		case "*":
			solution = Number(num1) * Number(num2);
			break;
		case "/":
			solution = Number(num1) / Number(num2);
			break;
	}

	var parameters = {sol: solution};
   	response.writeHead(200, { 'Content-Type': 'application/json' });
    response.write(JSON.stringify({solution: parameters}));

	response.render("math_service", parameters);
	response.end();
});
/*
function myAJAX() {
    
    // Set Variables
	var operator = document.getElementsById("operator").value;
	var operand1 = document.getElementsById("operand1").value;
	var operand2 = document.getElementsById("operand2").value;
    var xhttp = new XMLHttpRequest(),
        site = "http://localhost:5000/math_service?operator=" + operator + "%2F&operand1=" + operand1 + "&operand2=" + operand2;

	console.log(operator + " " + operand1 + " " + operand2);

    // Request Data
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
            // Parse Data and display
            rawData = this.responseText;
            var jsonString = JSON.parse(rawData);
            
            document.write(jsonString.articles[0].title);
            
            //display(jsonString);
        }
    };

    // Website where the data is extracted from. 
    xhttp.open('GET', site, true);
    xhttp.send();
}
*/


