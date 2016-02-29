$(document).ready(function () {
    var socketUrl = 'ukrainianrealbrides.int:80/';
    var socket = new WebSocket ('ws://' + socketUrl + 'echows');
    socket.onopen = function() {
        alert("Соединение установлено.");
    };
    console.log(socket);
    /*var data = 'hi';
    var res = socket.send(data);
    console.log(res);*/
});