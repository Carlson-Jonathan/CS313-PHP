/*****************************************************************************
* This is the same as L7 but it gathers all the data content of the response
* organizes it into a single string, and displays it back.
*****************************************************************************/

var net = require('net')
 
function zeroFill(i) {
  return (i < 10 ? '0' : '') + i
}
 
function now () {
  var d = new Date()
  return d.getFullYear() + '-'
    + zeroFill(d.getMonth() + 1) + '-'
    + zeroFill(d.getDate()) + ' '
    + zeroFill(d.getHours()) + ':'
    + zeroFill(d.getMinutes())
}
 
var server = net.createServer(function (socket) {
  socket.end(now() + '\n')
})
 
server.listen(Number(process.argv[2]))