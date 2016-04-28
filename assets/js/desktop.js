var wsUri = 'ws://creative.even.pw:9000';
        var output;
        player_index = 0;
        videos = {};
        response = {};

        function init() {
            output = document.getElementById("output");
            testWebSocket();
        }
        function testWebSocket() {
            websocket = new WebSocket(wsUri);
            websocket.onopen = function(evt) {
                onOpen(evt)
            };
            websocket.onclose = function(evt) {
                onClose(evt)
            };
            websocket.onmessage = function(evt) {
                onMessage(evt)
            };
            websocket.onerror = function(evt) {
                onError(evt)
            };
        }
        function onOpen(evt) {
            writeToScreen("CONNECTED");
        }
        function onClose(evt) {
            writeToScreen("DISCONNECTED");
        }
        function onMessage(evt) {
            response = JSON.parse(evt.data);
            // console.log(response);
            if (response.type === 'usermsg' && response.message === 'switchIndexVideo') {
                if(player_index+1 > ($('iframe').length-1))
                    player_index = 0;
                else
                    player_index++
                switchVideo();
            }
        }
        function onError(evt) {
            writeToScreen('ERROR: ' + evt.data);
        }
        function doSend(message) {
            writeToScreen("SENT: " + message);
            websocket.send(message);
        }
        function writeToScreen(message) {
        }
        window.addEventListener("load", init, false);