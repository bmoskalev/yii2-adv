let WSPort = 8080;
if (typeof wsPort !== 'undefined') {
    WSPort = wsPort;
}
//let connAddress = 'ws://localhost:' + WSPort;

let conn = new WebSocket('ws://localhost:' + WSPort);
conn.onopen = function (e) {
    console.log("Connection established!");
};

$('#sendForm').on('submit', (e) => {
    e.preventDefault();
    let text = $('#sendFormWindow').val();
    let message = {
        username: username,
        text: text,
        avatar: avatar
    };
    let history = $('#chatWindow').val();
    if (history == "") {
        $('#chatWindow').val(`${message.username}: ${message.text}`);
    } else {
        $('#chatWindow').val(`${history}\n${message.username}: ${message.text}`);
    }
    conn.send(JSON.stringify(message));
    $('#sendFormWindow').val('');
});

conn.onmessage = function (e) {
    let message = JSON.parse(e.data);
    let history = $('#chatWindow').val();
    if (history == "") {
        $('#chatWindow').val(`${message.username}: ${message.text}`);
    } else {
        $('#chatWindow').val(`${history}\n${message.username}: ${message.text}`);
    }
    if (message.username != username) {
        let elem = $(`<li><a href="#"><div class="pull-left"><img src="${message.avatar}" class="img-circle" alt="user image"/></div> <h4>${message.username}</h4> <p>${message.text}</p></a> </li>`);
        elem.appendTo('li.messages-menu ul.menu');
        let count = $('li.messages-menu ul.menu').children().length;
        $('li.messages-menu span.label-success').text(count);
        $('li.messages-menu li.header').text('You have ' + count + ' messages');
    }
};

$('#chatWindow').on('input', (e) => {
    let string = $(e.target).val();
    $(e.target).val(string.substring(0, string.length - 1));
});