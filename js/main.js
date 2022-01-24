document.addEventListener("DOMContentLoaded", function () {

    function onSubmit(token) {

        var form_el = $("#commentArticleForm");
        var target = form_el.attr("action");
        console.log("hmmm");
        $.ajax({
            type: "POST",
            url: target,
            data: form_el.serialize(), // serializes the form's elements.
            success: function (data)
            {
                console.log("Ciao");
            }
        });
    }
    window.onSubmit = onSubmit;

});