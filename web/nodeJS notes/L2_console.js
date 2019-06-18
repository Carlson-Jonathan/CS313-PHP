/*****************************************************************************
* This program accepts one or more arguement inputs from the console when the
* program is executed, and saves them into an array, which then adds them 
* together and outputs the sum.  
*
* process.argv is an array of arguements input from the console. Remembering
* this will make it much easier to use. It is important to know that the
* the first two elements in the array are reserved- the first is for the 
* directory path of the node.js program file. The 2nd is the directory
* path of the file you are executing using node.js. The 3rd, 4th, etc... 
* arguements are what you input after all of these things. 
*
* In this particular example, your console input command to run this program
* would look somethign like this:
* 	node filename.js 3 5 8 2 6 
* If you are testing it with learnyounode:
*	learnyounode verify filename
*****************************************************************************/

var result = 0

for (var i = 2; i < process.argv.length; i++)
  result += Number(process.argv[i])

console.log(result);

// Below shows you all of the elements of process.argv:
for (var i = 0; i < process.argv.length; i++)
	console.log("...argv[" + i + "] = " + process.argv[i])