
$( document ).ready(function() {
    $mail = $.getJSON("/data/beyond-mail.json", function (data) {
        console.log(data);
    });
});