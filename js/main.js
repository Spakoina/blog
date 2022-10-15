document.addEventListener("DOMContentLoaded", function () {

    function onSubmit(token) {
        $('#comment-submit').attr('disabled', 'disabled');
        var form_el = $("#commentArticleForm");
        var target = form_el.attr("action");
        console.log("hmmm");
        $.ajax({
            type: "POST",
            url: target,
            data: form_el.serialize(), // serializes the form's elements.
            success: function (data)
            {
                location.reload();
            }
        });
    }
    window.onSubmit = onSubmit;

    var alertPlaceholder = document.getElementById('liveAlertPlaceholder');
    var alertTriggers = document.getElementsByClassName('start-download');

    function alertPopup(message, type) {
        var wrapper = document.createElement('div');
        wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        alertPlaceholder.append(wrapper);
        setTimeout(closeAlert, 5000, wrapper);
    }

    function closeAlert(wrapper) {
        wrapper.remove();
    }

    if (alertTriggers && alertTriggers.length > 0) {
        [...alertTriggers].forEach(
                (alertTrigger, index, array) => {
            alertTrigger.addEventListener('click', function () {
                alertPopup('Grazie mille per aver scaricato il documento! Il download dovrebbe partire a breve.', 'primary');
            });
        });
    }

    // Event captor for audio play
    var audioPlayers = document.getElementsByClassName('audio-player');
    [...audioPlayers].forEach(
            (audioPlayer, index, array) => {
        audioPlayer.addEventListener('play', function (element) {
            try {
                gtag('event', 'audio_play', {
                    'audio': element.srcElement.dataset.audio
                });
            } catch (e) {
                console.log("Error while registring event to google analytics");
            }
        });
    });

});