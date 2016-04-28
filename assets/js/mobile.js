var wsUri = 'ws://creative.even.pw:9000';
function init() {
    testWebSocket();
}
function testWebSocket() {
    websocket = new WebSocket(wsUri);
    websocket.onopen = function(evt) {
        onOpen(evt)
    };
}
function onOpen(evt) {
    doSend("WebSocket rocks");
    $('iframe').attr('src', videos[0]);
}

function doSend(message) {
    websocket.send(message);
}

window.addEventListener("load", init, false);
$(window).on("orientationchange",function(){
   socket_data['message'] = 'switchIndexVideo';
   doSend(JSON.stringify(socket_data));
});