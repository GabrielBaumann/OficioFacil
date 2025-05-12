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
                                // window.open('gerar/' + response.id , '_blank');
                                atualizarVisual("render", "#historicoDados", "historicoUnidade");
                                form[0].reset();
                            }

                        flash.html(response.message).fadeIn(100).effect("bounce", 300);

                            setTimeout(function () {
                                flash.fadeOut(vTempo, function () {
                                    $(this).remove();
                                });
                            }, vTempo);


                      } else {
                        form.after("<div class='" + flashClass + "'>" + response.message + "</div>");
                        var newFlash = form.next("." + flashClass);
                        newFlash.effect("bounce", 300);


                            if (response.id) {
                                // window.open('gerar/' + response.id , '_blank');
                                atualizarVisual("render", "#historicoDados", "historicoUnidade");
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
           
        }
    })
}

document.addEventListener("click", (e) => {
    const vButton = e.target.closest("button");

    if(vButton) {
        if (vButton.id === "addUserBtn") {
            const vUrl = vButton.dataset.url;

            fetch(vUrl)
            .then(response => response.text())
            .then(data => {
                const vModal = document.getElementById("modal");
                vModal.innerHTML = data;


                window.onclick = function (e) {
                    if (e.target.id === "fundoModal") {
                        const vModal = document.getElementById("modal");
                        vModal.innerHTML = "";
                    }
                }
            })
            .catch(error => console.log("error", error))
        }
    }
});

document.addEventListener("click", (e) => {

    const vButton = e.target.closest("button");

    if(vButton) {
        if(vButton.id === "btnCancel") {
            const vModal = document.getElementById("modal");
            vModal.innerHTML = "";
        }
    }
});

document.addEventListener("submit", (e)=> {
    e.preventDefault();
    
    if (e.target.id === "form") {
        const form = e.target;
        const formData = new FormData(form);
        const actionForm = e.target.action;

        fetch(actionForm, {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {

            if (data.redirected) {
                window.location.href = data.redirected
            } else {
                const vDiv = document.createElement("div");
                vDiv.id = "response";
                vDiv.innerHTML = data.message;

                const lastReponse = document.getElementById("response");
                if (lastReponse) lastReponse.remove();

                document.body.appendChild(vDiv);

                setTimeout(() => {
                    removeElement(vDiv, 3000)
                }, 3000)
            }
        })
        .catch(error => console.log("error: ", error))
    }
})

function removeElement(element, duration = 1000) {
    if(!element) return;
        element.style.transition = "opacity 0.5s ease";
        element.style.opacity = "0";
    setTimeout(()=> element.remove(), duration);
}

// Clique na linha para abrir janela de edição

document.addEventListener("click", (e) => {
    const vTr = e.target.closest("tr");

    if(vTr) {
        
        const vIdUser = vTr.dataset.url;

        fetch(vIdUser)
        .then(response => response.text())
        .then(data => {
            const vModal = document.getElementById("modal");
            vModal.innerHTML = data;

            window.onclick = function (e) {
                if (e.target.id === "fundoModal") {
                    const vModal = document.getElementById("modal");
                    vModal.innerHTML = "";
                }
            }
        })
    } 
})