$(document).ready(function () {
    $('.start-dialog').click(function () {
        var socketUrl = 'ukrainianrealbrides.int:8000/';
        var socket = new WebSocket ('ws://' + socketUrl + 'echows');
        console.log(socket);
        $('.send-message-button').click(function () { socket.send('First message'); });
        socket.onopen = function() {
            alert('Соединение установлено.');
        };
        socket.onerror = function () {
            alert ('Error');
        };
        socket.onmessage = function () {
            alert ('Send');
        };
        socket.onclose = function () {
            alert ('Close');
        };
    });
});