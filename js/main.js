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

});