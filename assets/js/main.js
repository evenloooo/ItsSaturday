player = {};
player[0] = $('#player1');
player[1] = $('#player2');
var playerOrigin = '*';
$status = $('#status');
current_play_time = 0;
socket_data = {};
if (window.addEventListener) {
    window.addEventListener('message', onMessageReceived, false);
} else {
    window.attachEvent('onmessage', onMessageReceived, false);
}

function onMessageReceived(event) {
    if (!(/^https?:\/\/player.vimeo.com/).test(event.origin)) {
        return false;
    }
    if (playerOrigin === '*') {
        playerOrigin = event.origin;
    }
    var data = JSON.parse(event.data);
    switch (data.event) {
        case 'ready':
            onReady();
            break;

        case 'playProgress':
            onPlayProgress(data.data);
            break;

        case 'pause':
            onPause();
            break;

        case 'finish':
            onFinish();
            break;
    }
}

function post(player_index, action, value) {
    var data = {
        method: action
    };

    if (value) {
        data.value = value;
    }
    var message = JSON.stringify(data);
    player[player_index][0].contentWindow.postMessage(message, playerOrigin);
}

function onReady() {
    $status.text('ready');
    for (var i = 0; i <= $('iframe').length - 1; i++) {
        post(i, 'addEventListener', 'pause');
        post(i, 'addEventListener', 'finish');
        post(i, 'addEventListener', 'playProgress');
    }

}

function onPause() {
    $status.text('paused');
}

function onFinish() {
    $status.text('finished');
}

function onPlayProgress(data) {
    $status.text(data.seconds + 's played');
    current_play_time = data.seconds;
}
// });
$('#changeBtn').click(function(e) {
    e.preventDefault();
    socket_data['message'] = 'switchIndexVideo';
    doSend(JSON.stringify(socket_data));
});

function switchVideo() {
    post(player_index, 'seekTo', current_play_time);
    post(player_index, 'play', true);

    ori_player_index = player_index - 1;
    if (ori_player_index < 0) ori_player_index = $('iframe').length - 1;
    post(ori_player_index, 'pause', true);

    player[ori_player_index].css('display', 'none');
    player[player_index].css('display', 'block');
}