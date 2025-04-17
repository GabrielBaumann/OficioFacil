// Atualização em realtime do intervalo e do último número mais um
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

        // atualizarVisual("render", "#intervaloDados", "intervalo");
        atualizarVisual("render", "#intervaloMais", "intervaloMais");
    }

    atualizarOficio();

    setInterval(atualizarOficio, 2000);
});


// Função apra atualizar tempo do histórico
function tempoDecorridoJS(dataHora) {
    const data = new Date(dataHora);
    const agora = new Date();
    const diffMs = agora - data;

    const minutos = Math.floor(diffMs / 60000) % 60;
    const horas = Math.floor(diffMs / 3600000) % 24;
    const dias = Math.floor(diffMs / 86400000);

    const partes = [];

    if (dias > 0) partes.push(dias === 1 ? "1 dia" : `${dias} dias`);
    if (horas > 0) partes.push(horas === 1 ? "1 hora" : `${horas} horas`);
    if (minutos > 0) partes.push(minutos === 1 ? "1 minuto" : `${minutos} minutos`);

    if (partes.length === 0) return "agora mesmo";

    return "há " + (partes.length > 1
        ? partes.slice(0, -1).join(", ") + " e " + partes.slice(-1)
        : partes[0]);
}

function atualizarTempos() {
    console.log("atualizar tempo...")
    $(".tempo-decorrido").each(function () {
        const data = $(this).data("dt");
        const texto = tempoDecorridoJS(data);
        $(this).text(texto);
    });
}

$(function () {
    atualizarTempos(); // Primeira atualização
    setInterval(atualizarTempos, 60000); // A cada minuto
});