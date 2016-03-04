$(document).ready(function () {
    $('.start-dialog').click(function () {
        /*var socketUrl = 'ukrainianrealbrides.int:8000/';
        var socket = new WebSocket ('ws://' + socketUrl);
console.log(socket);
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
        };*/

        var connection = new autobahn.Connection({
            url: 'ws://127.0.0.1:8000/',
            realm: 'realm1'
        });
        
        connection.onopen = function (session) {
            alert('Connection done');
            // 1) subscribe to a topic
            function onevent(args) {
                console.log("Event:", args[0]);
            }
            session.subscribe('com.myapp.hello', onevent);

            // 2) publish an event
            session.publish('com.myapp.hello', ['Hello, world!']);

            // 3) register a procedure for remoting
            function add2(args) {
                return args[0] + args[1];
            }
            session.register('com.myapp.add2', add2);

            // 4) call a remote procedure
            session.call('com.myapp.add2', [2, 3]).then(
                function (res) {
                    console.log("Result:", res);
                }
            );
        };

        connection.open();
        $('.stop-dialog').click(function () { connection.close(); });
        $('.send-message-button').click(function () { connection.call('Hello'); });
    });
});