$(document).ready(function () {
    $('.start-dialog').click(function () {
        var socketUrl = 'ukrainianrealbrides.int:8000/';
        var socket = new WebSocket ('ws://' + socketUrl + 'web_socket_server');

        $('.send-message-button').click(function () {
            var selector = '.message-field';
            var message = $(selector).val();
            socket.send(message);
            $(selector).val('');
        });



        socket.onopen = function() {
            alert('Соединение установлено.');
        };
        socket.onerror = function () {
            alert ('Error');
        };
        socket.onmessage = function (data) {
            console.log(data.data);
        };
        socket.onclose = function () {
            alert ('Close');
        };
    });
});