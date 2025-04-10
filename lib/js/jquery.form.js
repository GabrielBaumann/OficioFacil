// Antigo
$(function () {
    //ajax form
    $("form:not('.ajax_off')").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var load = $(".ajax_load");
        var flashClass = "ajax_response";
        var flash = $("." + flashClass);

        form.ajaxSubmit({
            url: form.attr("action"),
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                load.fadeIn(200).css("display", "flex");
            },
            success: function (response) {
                //redirect
                if (response.redirect) {
                    window.location.href = response.redirect;
                }

                //message
                if (response.message) {
                    if (flash.length) {
                        flash.html(response.message).fadeIn(100).effect("bounce", 300);
                            // Remove após 5 segundos
                            setTimeout(function () {
                                flash.fadeOut(3000, function () {
                                    $(this).remove();
                                });
                            }, 3000);
                    } else {
                        form.prepend("<div class='" + flashClass + "'>" + response.message + "</div>");
                        var newFlash = form.find("." + flashClass);
                        newFlash.effect("bounce", 300);

                        // Remove após 5 segundos
                        setTimeout(function () {
                            newFlash.fadeOut(3000, function () {
                                $(this).remove();
                            });
                        }, 3000);
                    }
                } else {
                    flash.fadeOut(100);
                }
            },
            complete: function () {
                load.fadeOut(200);

                if (form.data("reset") === true) {
                    form.trigger("reset");
                }
            }
        });

    })
});