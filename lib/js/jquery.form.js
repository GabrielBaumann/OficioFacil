$(function () {
    //ajax form
    $("form:not('.ajax_off')").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var load = $(".ajax_load");
        var flashClass = "ajax_response";
        var flash = $("." + flashClass);
        var vTempo = 3000;

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

                        if (response.id) {
                            window.open('gerar/' + response.id , '_blank');
                            atualizarVisual("render", "#intervaloDados", "intervalo");
                            atualizarVisual("render", "#historicoDados", "historico");
                            form[0].reset();
                        }
                            
                        flash.html(response.message).fadeIn(100).effect("bounce", 300);

                            setTimeout(function () {
                                flash.fadeOut(vTempo, function () {
                                    $(this).remove();
                                });
                            }, vTempo);


                      } else {
                        form.prepend("<div class='" + flashClass + "'>" + response.message + "</div>");
                        var newFlash = form.find("." + flashClass);
                        newFlash.effect("bounce", 300);

                        if (response.id) {
                            window.open('gerar/' + response.id , '_blank');
                            atualizarVisual("render", "#intervaloDados", "intervalo");
                            atualizarVisual("render", "#historicoDados", "historico");
                            form[0].reset();
                        }

                        // Remove após 5 segundos
                        setTimeout(function () {
                            newFlash.fadeOut(vTempo, function () {
                                $(this).remove();
                            });
                        }, vTempo);

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

function atualizarVisual(vUrl, vSeletor, template) {
    $.ajax({
        url: vUrl + "/" + template,
        method: "GET",
        success: function (data) {
            $(vSeletor).html(data);
        },
        error: function () {
            // alert('Erro ao carregar!');
        }
    })
}

$(function () {
    function atualizarOficio() {

        atualizarVisual("render", "#intervaloDados", "intervalo");
        atualizarVisual("render", "#historicoDados", "historico");
    }

    atualizarOficio();

    setInterval(atualizarOficio, 2000);

});