$('push').click(function () {
    if (confirm('削除してよろしいですか？')) {
        $('span').text('アカウントを削除致しました。');
    } else {
        return false
    }
});
