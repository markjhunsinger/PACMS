/*$(document).ready(function() {
    $('button[id^="btnEditPlayer_"]').on('click', function(e) {
        e.preventDefault();
        var playerID = $(this).id().split('_').pop();
        alert(playerID);

        $.get('@{{ URL::to('/') }}/player/' + playerID, function() {

        });
    });
});*/
